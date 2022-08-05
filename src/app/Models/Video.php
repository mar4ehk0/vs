<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'year', 'duration', 'country', 'age_limit', 'type'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('poster')
            ->singleFile();
    }

    public function translation()
    {
        return $this->belongsTo(Translation::class);
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class)->using(GenreVideo::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class)->using(PersonVideo::class);
    }

    public function persons()
    {
        return $this->belongsToMany(Person::class)->using(PersonVideo::class);
    }
}
