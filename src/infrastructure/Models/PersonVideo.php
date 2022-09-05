<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Modules\PersonVideo\Database\Factories\PersonVideoFactory;

class PersonVideo extends Pivot
{
    use HasFactory;
    public $timestamps = false;

    protected static function newFactory()
    {
        return PersonVideoFactory::new();
    }
}
