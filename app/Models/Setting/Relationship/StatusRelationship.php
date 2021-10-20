<?php
namespace App\Models\Setting\Relationship;

use App\Models\Invoice\Invoice;
use App\Models\Order\Order;
use App\Models\Product\Product;
use App\Models\Quotation\Quotation;
use App\Models\Rma\Rma;
use App\Models\Service\Service;

/**
 *
 */
trait StatusRelationship
{
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'status_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function products()
    {
        return $this->hasMany(Product::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function quotations()
    {
        return $this->hasMany(Quotation::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function rmas()
    {
        return $this->hasMany(Rma::class, 'status_id', 'id');
    }

    /**
    * Get the multiple records associated with this model.
    */
    public function services()
    {
        return $this->hasMany(Service::class, 'status_id', 'id');
    }
}

?>
