<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prices extends Model
{
    use HasFactory;
    public $fillable = ['title', 'price', 'path'];

    public function scopeHighest($query)
    {
        return $query->orderBy('price','desc')->get(); 
    }

}
