<?php

namespace Infrastructure\Models\Interfaces;

use Spatie\MediaLibrary\HasMedia;

interface ModelMediaInterface extends HasMedia
{
    public function getNameMediaCollection(): string;
}
