<?php

namespace Modules\VideoService\Models\Interfaces;

use Spatie\MediaLibrary\HasMedia;

interface ModelMediaInterface extends HasMedia
{
    public function getNameMediaCollection(): string;
}
