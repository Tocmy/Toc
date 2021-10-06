<?php
namespace App\Models\Setting\Relationship;

/**
 *
 */
trait StatusRelationship
{
    public function orders()
    {
        return $this->hasMany(App\Models\Order\Order::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function products()
    {
        return $this->hasMany(App\Models\Product\Product::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function quotationStatus()
    {
        return $this->hasMany(App\Models\Quotation\QuotationStatus::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function rmas()
    {
        return $this->hasMany(App\Models\Stock\Rma::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function services()
    {
        return $this->hasMany(App\Models\Service\Service::class, 'status_id', 'id');
    }
}

?>
