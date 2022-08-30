<?php

namespace Modules;

interface Migration
{
    public static function getMigrations(): array;
}
