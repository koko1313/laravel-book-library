<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';
    protected $fillable = ['file_title', 'file_name','language','cover'];

    public function book() {
        return $this->hasOne(Book::class, 'book_id', 'id');
    }
}
