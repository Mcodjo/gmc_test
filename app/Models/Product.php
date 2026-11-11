<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'slug', 'link', 'image_link', 'additional_image_link',
        'price', 'currency', 'availability', 'brand', 'gtin', 'mpn', 'condition',
        'google_product_category', 'product_type', 'shipping_country', 'shipping_service',
        'shipping_price', 'identifier_exists', 'category_id', 'is_digital', 'short_description', 'stock',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'shipping_price' => 'decimal:2',
        'is_digital' => 'boolean',
        'stock' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' ' . $this->currency;
    }

    public function getSchemaAvailabilityAttribute(): string
    {
        return $this->availability === 'in_stock'
            ? 'https://schema.org/InStock'
            : 'https://schema.org/OutOfStock';
    }

    public function getGmcPriceAttribute(): string
    {
        return $this->price . ' ' . $this->currency;
    }

    public function getFullLinkAttribute(): string
    {
        return url('/produit/' . $this->slug);
    }
}
