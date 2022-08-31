<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Format\Database\Factories\FormatFactory;

class Format extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'ffmpeg_command',
    ];
    public $timestamps = false;

    protected static function newFactory()
    {
        return FormatFactory::new();
    }

    public function sources()
    {
        return $this->hasMany(Source::class);
    }
}
