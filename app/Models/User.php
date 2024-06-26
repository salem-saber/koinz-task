<?php

namespace App\Models;


use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    use HasFactory;

    protected $fillable = ['name' , 'phone'];

    public function readingIntervals()
    {
        return $this->hasMany(ReadingInterval::class);
    }

    public static function newFactory()
    {
        return new UserFactory();
    }

}
