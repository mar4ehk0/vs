<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Position\Database\Factories\PositionFactory;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    protected static function newFactory()
    {
        return PositionFactory::new();
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class)->using(PersonVideo::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class)->using(PersonVideo::class);
    }
}
