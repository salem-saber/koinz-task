<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function readingIntervals()
    {
        return $this->hasMany(ReadingInterval::class);
    }


    public static function newFactory()
    {
        return new BookFactory();
    }


}
