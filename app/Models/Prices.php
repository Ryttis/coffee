<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Prices extends Model
{
    use HasFactory;
    public $fillable = ['title', 'price', 'image', 'path'];


    public function scopeHighest($query)
    {
        return $query->orderBy('price', 'desc')->get();
    }
}
