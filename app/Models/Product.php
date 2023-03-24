<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'type', 'components', 'first_smell'
    , 'second_smell', 'last_smell', 'price', 'images'];
}
