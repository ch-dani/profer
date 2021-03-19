<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        "name",
        "price",
        "quantity",
        "cost",
        "weight",
        "sku",
        "description",
        "price_before_discount",
        "product_availability",
        "shipping_charge",
        "feature",
        "latest",
        "image1",
        "image2",
        "image3"
    ];
}
