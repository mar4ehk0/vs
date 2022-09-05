<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Genre\Database\Factories\GenreFactory;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    protected static function newFactory()
    {
        return GenreFactory::new();
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class)->using(GenreVideo::class);
    }
}
