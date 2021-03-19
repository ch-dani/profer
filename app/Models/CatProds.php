<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatProds extends Model
{
    use HasFactory;
    protected $table='cat_prod';
    protected $fillable=['product_id','category_id','status'];

    public function prod(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function parnt(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function mainMenu(){
        return $this->parnt();
    }

    public function brand(){

    }
    public function subBrand(){
        
    }
    public function modl(){
        
    }
    public function subCats(){
        return $this->hasMany(self::class, 'category_id', 'id');
    }

}
