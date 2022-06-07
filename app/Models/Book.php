<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title', 'description', 'img'
    ];

    // book belongsToMany categories:
    public function categories()
    {
        return $this->belongsToMany('\App\Models\Category');
    }

    use HasFactory;
}
