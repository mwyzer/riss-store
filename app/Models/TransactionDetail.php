<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    use HasFactory;

    /**
     * Fillable attributes for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'transaction_id',
        'product_id',
        'product_image',
        'color',
        'color_image',
        'size',
        'price',
        'qty',
    ];

    /**
     * Define the relationship with Product.
     *
     * @return BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

      /**
     * productImage
     *
     * @return Attribute
     */
    protected function productImage(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/products/' . $image),
        );
    }

    /**
     * colorImage
     *
     * @return Attribute
     */
    protected function colorImage(): Attribute
    {
        return Attribute::make(
            get: fn ($image) => url('/storage/colors/' . $image),
        );
    }
}
