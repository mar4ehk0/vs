<?php

namespace Infrastructure\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Translation\Database\Factories\TranslationFactory;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    protected static function newFactory()
    {
        return TranslationFactory::new();
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}
