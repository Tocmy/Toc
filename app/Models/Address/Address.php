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

    public function getFullPostalAddressAttribute(): string
    {
        $fullPostalAddress = '';
        $fullPostalAddress .= $this->address ?: '';
        $fullPostalAddress .= $this->zip_code ? ($fullPostalAddress ? ' ' : '') . $this->zip_code : '';
        $fullPostalAddress .= $this->city ? ($fullPostalAddress ? ' ' : '') . $this->city : '';

        return $fullPostalAddress;
    }

    public function formattedFax()
    {

    }
}
