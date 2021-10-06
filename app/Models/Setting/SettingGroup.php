<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;
Use App\Models\Setting\Relationship\SettingGroupRelationship;

class SettingGroup extends Model
{
    use HasFactory, SoftDeletes, SettingGroupRelationship,Sortable;

    /**
    * The table associated with the model.
    *
    * @var  string
    */
    protected $table = 'setting_groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'title', 'description', 'position', 'visible',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'title' => NULL,
        'description' => NULL,
        'position' => 0,
        'visible' => NULL,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'visible' => 'boolean',
    ];

    public $softable =['position'];

    public function scopeVisible($query)
    {
        return $query->where('visible', 1);
    }

    public function setVisibleAttribute($value)
    {
        $this->attribute['visible'] = (bool) $value;
    }

}
