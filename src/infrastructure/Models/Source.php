<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Source\Database\Factories\SourceFactory;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_path'
    ];

    protected static function newFactory()
    {
        return SourceFactory::new();
    }

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

}
