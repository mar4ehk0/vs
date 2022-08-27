<?php

namespace Modules\VideoService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'ffmpeg_command',
    ];
    public $timestamps = false;

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
