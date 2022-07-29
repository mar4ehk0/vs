<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_path'
    ];

    public function format()
    {
        return $this->belongsTo(Format::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

}
