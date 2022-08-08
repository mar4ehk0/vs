<?php

namespace Database\Factories\traits;

trait Unique
{
    public function unique(...$params): bool
    {
        static $buf;
        $buf = $buf ?: [];

        $row = [];
        foreach ($params as $param) {
            $row[] = $param;
        }

        if (!in_array($row, $buf)) {
            $buf[] = $row;
            return true;
        }

        return false;
    }
}
