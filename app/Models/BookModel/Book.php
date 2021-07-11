<?php

namespace App\Models\BookModel;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price',
        'author_id'
    ];
}
