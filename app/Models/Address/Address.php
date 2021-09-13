<?php

namespace App\Models\Address;

use App\Models\Address\Relationship\AddressRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory, SoftDeletes,AddressRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';

    protected $fillable = [
        'country_id', 'addressable_type', 'addressable_id',  'address_type','company', 'company_id', 'state_id',
        'tax_id', 'address_1', 'address_2', 'postcode_required', 'postcode', 'telephone', 'fax', 'latitude', 'longitude',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    //public function getFullPostalAddressAttribute(): string
    //{
        //$fullPostalAddress = '';
        //$fullPostalAddress .= $this->address ?: '';
        //$fullPostalAddress .= $this->zip_code ? ($fullPostalAddress ? ' ' : '') . $this->zip_code : '';
        //$fullPostalAddress .= $this->city ? ($fullPostalAddress ? ' ' : '') . $this->city : '';

        //return $fullPostalAddress;
    //}



    public function formattedFax()
    {
            $fax = preg_replace("/[^0-9]/", "", $this->fax);
            if (strlen($fax)== 10) {
                return '(' . substr($fax, 0,3). ')'. substr($fax, 3,3). '-' . substr($fax, -4);
            }else {
                return $this->fax;
            }
    }
    public function formattedTelephone()
    {
            $telephone = preg_replace("/[^0-9]/", "", $this->telephone);
            if (strlen($telephone)== 10) {
                return '(' . substr($telephone, 0,3). ')'. substr($telephone, 3,3). '-' . substr($telephone, -4);
            }else {
                return $this->telephone;
            }
    }

    public function formattedTollFree()
    {
        $temp = preg_replace("/[^0-9]/", "", $this->toll_free);
        if (strlen($temp) == 10) {
            return '1-' . substr($temp, 0, 3) . '-' . substr($temp, 3, 3) . '-' . substr($temp, -4);
        } else {
            return $this->toll_free;
        }
    }
}
