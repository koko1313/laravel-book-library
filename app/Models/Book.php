<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['id','title', 'year', 'author_id', 'description'];

    public function author() {
        return $this->hasOne(Author::class, 'id', 'author_id');
    }
}
