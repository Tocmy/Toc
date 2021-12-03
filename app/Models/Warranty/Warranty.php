<?php

namespace App\Models\Warranty;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BaseModel;
use App\Models\Warranty\Relationship\WarrantyRelationship;
use Carbon\Carbon;

class Warranty extends BaseModel
{
    use HasFactory, softDeletes, WarrantyRelationship;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'warranties';
    /**
     * The attributes that are mass assignable.
     *sitemap supersoft
     * @var array
     */
    protected $fillable = [
        'name', 'duration', 'cover', 'exclude', 'condition', 'type_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'name' => '',
        'duration' => 0,
        'cover' => '',
        'exclude' => '',
        'condition' => '',
        'type_id' => 0,
    ];


    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public static function warrantyList($store_id)
    {
        $warranties = Warranty::where('store_id', $store_id)->get();
        $duration_type =$warranties->type()->name;
        $warrantylist = [];
        foreach ($warranties as $warranty ) {
            $warrantylist[$warranty->id] = $warranty->name . '(' .$warranty->duration.'' .__($duration_type) . ')';
        }
        return $warrantylist;
    }

    public function getDisplayNameAttribute()
    {
        $duration_type= $this->type()->name;
        $name = $this->name .'(' . $this->duration . '' .__($duration_type) .')';
        return $name;
    }

    public function getExpireDate($date)
    {
        $date =Carbon::parse($date);

        if ($this->type()->name == 'day') {
            $date->addDays($this->duration);
        }elseif ($this->type()->name = 'months'){
            $date->addMonths($this->duration);
        }elseif($this->type()->name == 'years'){
            $date->addYears($this->duration);
        }
        return $date->toDayDateTimeString();
    }

}
