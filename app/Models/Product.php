<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public function category(){
        return $this->belongsTo(Category::class,'categories_id');
    }
    
    use HasFactory;
    protected $fillable = ['name','qty','price','img','categories_id'];
    
}
