<?php

namespace Modules\VideoService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

}