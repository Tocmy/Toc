<?php

namespace App\Models\Tool;

use App\Models\Tool\Relationship\BarcodeRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory, BarcodeRelationship;

    /**hybridoiit
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'barcodes';

    /**
     * The attributes that are mass assignable.
     *
     * @var  array
     */
    protected $fillable = [
        'description', 'width', 'height', 'paper_width', 'paper_height', 'top_margin',
        'left_margin', 'row_distance', 'col_distance', 'stickers_in_one_row', 'is_default', 'is_continuous',
        'stickers_in_one_sheet', 'store_id',
    ];

    /**
    * The model's attributes.
    *
    * @var  array
    */
    protected $attributes = [
        'description' => NULL,
        'width' => NULL,
        'height' => NULL,
        'paper_width' => NULL,
        'paper_height' => NULL,
        'top_margin' => NULL,
        'left_margin' => NULL,
        'row_distance' => NULL,
        'col_distance' => NULL,
        'stickers_in_one_row' => NULL,
        'is_default' => false,
        'is_continuous' => false,
        'stickers_in_one_sheet' => NULL,
        'store_id' => 0,
    ];

    /**
    * The attributes that should be cast to native types.
    *
    * @var  array
    */
    protected $casts = [
        'is_default' => 'boolean',
        'is_continuous' => 'boolean',
    ];

    public function barcode_types()
    {
        $types = [ 'C128' => 'Code 128 (C128)', 'C39' => 'Code 39 (C39)', 'EAN13' => 'EAN-13', 'EAN8' => 'EAN-8', 'UPCA' => 'UPC-A', 'UPCE' => 'UPC-E'];

        return $types;
    }

    /**
     * Returns the default barcode.
     *
     * @return string
     */
    public function barcode_default()
    {
        return 'C128';
    }

}
