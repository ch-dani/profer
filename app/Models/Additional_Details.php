<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additional_Details extends Model
{
    use HasFactory;
    protected $table='additional_details';
    protected $fillable=['user_id',"best_describe_your_business",'how_did_you_here'];
}
