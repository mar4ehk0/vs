<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Person extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'persons';

    protected $fillable = [
        'name', 'last_name', 'birthday', 'about'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('photo')
            ->singleFile();
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class)->using(PersonVideo::class);
    }

    public function videos()
    {
        return $this->belongsToMany(Video::class)->using(PersonVideo::class);
    }

}
