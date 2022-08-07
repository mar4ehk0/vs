<?php

namespace App\Models\interfaces;

use Spatie\MediaLibrary\HasMedia;

interface ModelMediaInterface extends HasMedia
{
    public function getNameMediaCollection(): string;
}
