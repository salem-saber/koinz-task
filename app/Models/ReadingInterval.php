<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingInterval extends Model
{

    protected $fillable = ['user_id', 'book_id', 'start_page', 'end_page'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
