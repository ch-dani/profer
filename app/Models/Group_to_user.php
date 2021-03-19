<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Group;

class Group_to_user extends Model
{
    use HasFactory;
    protected $table='group_to_user';
    protected $fillable=['user_id','group_id','status'];
    public function group(){
        // dd($this->belongsTo(Group::class));
        return $this->belongsTo(Group::class,'group_id','id');
    }
}
