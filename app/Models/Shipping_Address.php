<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping_Address extends Model
{
    use HasFactory;
    protected $table='shipping_address';
    protected $fillable=[
        "user_id",
        "street_address1",
        "street_address2",
        "location_phonenumber",
        "country",
        "state",
        "city",
        "zip"
    ];
    
}
