<?php

namespace Modules\VideoService\Models;

enum Type: string
{
    case Movie = 'movie';
    case Series = 'series';
    case Cartoon = 'cartoon';

    public function label(): string
    {
        return match($this) {
            Type::Movie => 'Кино',
            Type::Series => 'Сериал',
            Type::Cartoon => 'Мультфильм',
        };
    }
}
