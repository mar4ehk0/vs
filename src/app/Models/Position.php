<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function videos()
    {
        return $this->belongsToMany(Video::class)->using(PersonVideo::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class)->using(PersonVideo::class);
    }
}
