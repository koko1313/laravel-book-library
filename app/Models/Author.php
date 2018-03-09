<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';
    protected $fillable = ['id', 'name'];

    public function book(){
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
