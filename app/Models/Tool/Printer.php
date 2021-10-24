<?php

namespace App\Models\Tool;

use App\Models\Tool\Relationship\PrinterRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    use HasFactory, PrinterRelationship;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'printers';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'name', 'connection_type', 'capability_profile', 'char_per_line', 'ip_address', 'port', 'path', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'connection_type' => '',
        'capability_profile' => 'default',
        'char_per_line' => NULL,
        'ip_address' => NULL,
        'port' => NULL,
        'path' => NULL,
        'store_id' => 0,
    ];


    public static function capabilityProfiles()
    {
         $profiles = [
             'default' => 'Default',
             'simple'  => 'Simple',
             'Sp2000'  => 'Star Branded',
             'TEP-200M'=> 'Epson Tep',
             'P822D'   => 'P822D'
         ];
         return $profiles;
    }

    public static function capabilityprofileSrt($profile)
    {
        $profiles = Printer::capability_profiles();

        return isset($profiles[$profile]) ? $profiles[$profile] : '';
    }

    public static function connectionTypes()
    {
        $types = [
            'network' => 'Network',
            'windows' => 'Windows',
            'linux' => 'Linux'
        ];

        return $types;
    }

    public static function connectiontypeStr($type)
    {
        $types = Printer::connection_types();

        return isset($types[$type]) ? $types[$type] : '';
    }

    public static function printerList($store_id, $show_select = true)
    {
        $query = Printer::where('store_id', $store_id);
        $printers = $query->pluck('name', 'id');

        if ($show_select) {
            $printers->prepend(__('Please Select'), '');
        }

        return $printers;

    }


}
