<?php
namespace App\Traits;

use App\Models\Address\Address;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Support\Facades\DB;

/**
 *
 */
trait Addressable
{
   public function hasAddress()
   {
       return $this->addresses->count();
   }

   public function address()
   {
       return $this->addresses->first();

   }

   public function addresses()
   {
       return $this->morphMany(Address::class, 'addressable');
   }

   public function primaryAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Primary');
   }

   public function billingAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Billing');
   }
   public function shippingAddress()
   {
       return $this->morpOne(Address::class, 'addressable')
                   ->where('address_type', 'Shipping');
   }

   public function removeAddresses()
   {
       return $this->addresses()->delete();
   }

   public function formattedAddress($line = '\n')
   {
       if ($line == ',') {
           $line = ',';
       }

       $address = $this->address_1;
       $address2 = $this->address_2;
       if (!empty($address2)) {
           $address = $address . (!empty($address)? $line : '') . $address2;
       }

       $middle = $this->city->name;
       if (!empty($this->state_id)) {
          $middle = $middle . (!empty($middle) ? ',' : '') .$this->state->name;
       }


       if (!empty($this->postcode)) {
          $middle = $middle . (!empty($middle) ? ',' : '') .$this->postcode;
       }

       if (!empty($middle)) {
        $address = $address .(!empty($address)? $line : '') . $middle;
       }

       if (!empty($country_id)) {
        $address = $address .(!empty($address)? $line : '') . $this->country->name;
       }
       return $address;

   }

   public function fetchGeocode()
   {
       if (empty($address)) {
           $address = $this->formattedAddress(',');
       }
       if (empty($address)) {
           return [];
       }
       try{
           $geocode = Geocoder::geocode($address);
       }catch (\Exception $e){
           echo $e->getMessage();
           return [];
       }
   }

   public function fetchCoordinates($address = null)
   {
       $geocode = self::lockupGeoCode($address);
       if (empty($geocode)) {
           return [];
       }elseif(!isset($geocode['latitude'])|| !isset($geocode['longitude'])){
           return[];
       }else {
           return [$geocode['latitude'], $geocode['longitude']];
       }
   }

   public static function lookupGeocode($address)
    {
        if (empty($address)) {
            return [];
        }

        try {
            $geocode = Geocoder::geocode($address);
            // The GoogleMapsProvider will return a result
            return $geocode;
        } catch (\Exception $e) {
            // No exception will be thrown here
            echo $e->getMessage();
            return [];
        }
    }

    /**
     * Makes a call to to Google maps to get the [latitude, longitude] array for the specified address.
     *
     * @param $address
     * @return array
     */
    public static function lookupCoordinates($address)
    {
        $geocode = self::lookupGeocode($address);

        if (empty($geocode)) {
            return [];
        } elseif (!isset($geocode['latitude']) || !isset($geocode['longitude'])) {
            return [];
        } else {
            return [$geocode['latitude'], $geocode['longitude']];
        }
    }

    /**
     * Updates the location field in the database for the current record.
     *
     * @return bool
     */
    public function updateGeocode()
    {
        if ($coordinates = $this->fetchCoordinates()) {
            $this->lat = $coordinates[0];
            $this->lon = $coordinates[1];
            $this->setLocationAttribute("{$this->lat}, {$this->lon}");

            $this->update();

            return true;
        }

        return false;
    }

    /**
     * Sets the location attribute where the coordinate is specified by a string formatted as "latitude,longitude"
     *
     * @param $value
     */
    public function setLocationAttribute($value) {
        $this->attributes['location'] = DB::raw("POINT({$value})");
    }

    /**
     * Gets the location attribute for the current record specified by a string formatted as "latitude,longitude"
     *
     * @param $value
     * @return string
     */
    public function getLocationAttribute($value){

        $loc =  substr($value, 6);
        $loc = preg_replace('/[ ,]+/', ',', $loc, 1);

        return substr($loc,0,-1);
    }


    public function newQuery($excludeDeleted = true)
    {
        $raw='';
        foreach($this->geofields as $column){
            $raw .= " ASTEXT({$column}) AS {$column} ";
        }

        return parent::newQuery($excludeDeleted)->addSelect('*', DB::raw($raw));
    }


    public function scopeDistance($query, $dist, $location)
    {
        return $query->whereRaw("ST_DISTANCE(location, POINT({$location})) < {$dist}");

    }


    public function distance($lat2, $lon2, $unit = "M") {

        if (!empty(!$this->location)) {
            $point = explode(',' , $this->location);
            if (count($point) != 2) {
                return null;
            }
            $lat1 = $point[0];
            $lon1 = $point[1];
        } else {
            if (!empty($this->lat) && !empty($this->lon)) {
                $lat1 = $this->lat;
                $lon1 = $this->lon;
            } else {
                return null;
            }
        }

        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
            return ($miles * 1.609344);
        } else if ($unit == "N") {
            return ($miles * 0.8684);
        } else {
            return $miles;
        }
    }


}

?>
