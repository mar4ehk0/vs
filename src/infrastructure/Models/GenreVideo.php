<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
//use Modules\VideoService\Database\Factories\GenreVideoFactory;

class GenreVideo extends Pivot
{
    use HasFactory;
    public $timestamps = false;

//    protected static function newFactory()
//    {
//        return GenreVideoFactory::new();
//    }
}
