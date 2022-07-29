<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'ffmpeg_command',
    ];

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
