<?php

namespace Modules\VideoService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\VideoService\Models\Interfaces\ModelMediaInterface;
use Spatie\MediaLibrary\InteractsWithMedia;

class Person extends Model implements ModelMediaInterface
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'persons';

    protected $fillable = [
        'name', 'last_name', 'birthday', 'about'
    ];

    public function getNameMediaCollection(): string
    {
        return 'photo';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection($this->getNameMediaCollection())
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