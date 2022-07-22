<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'parent_id'=>'0',
        'name',
        'specs',
        'image'=>'no-image.jpg',
        'opening_balance', 
        'price', 
          
    ];
}
