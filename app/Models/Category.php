<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','category_id','description','status','is_brand','is_subbrand','is_model'];

    public function children(){
    	return $this->hasMany(Category::class,'category_id','id');
    }
    public function parnt(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function sub_category(){
        return $this->hasMany(Category::class,'category_id','id');
    }
}
