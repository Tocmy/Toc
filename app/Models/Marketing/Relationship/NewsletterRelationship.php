<?php
namespace App\Models\Marketing\Relationship;

use App\Models\Affiliate\Affiliate;
use App\Models\Company\Company;
use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 */
trait NewsletterRelationship
{
  /**
   * Get all of the comments for the NewsletterRelationship
   *
   * @return \
   */
  public function affiliates(): HasMany
  {
      return $this->hasMany(Affiliate::class, 'newsletter_id', 'id');
  }

  /**
   * Get the user that owns the NewsletterRelationship
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function product(): BelongsTo
  {
      return $this->belongsTo(Product::class, 'product_id', 'id');
  }

  public function store(): BelongsTo
  {
      return $this->belongsTo(Company::class, 'store_id', 'id');
  }
}

?>
