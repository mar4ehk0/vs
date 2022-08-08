<?php

namespace App\Models;

use App\Models\interfaces\ModelMediaInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Video extends Model implements ModelMediaInterface
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name', 'description', 'year', 'duration', 'country', 'age_limit', 'type'
    ];

    public function getNameMediaCollection(): string
    {
        return 'poster';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection($this->getNameMediaCollection())
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
