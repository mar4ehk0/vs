<?php

namespace Modules\VideoService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GenreVideo extends Pivot
{
    use HasFactory;
    public $timestamps = false;
}
