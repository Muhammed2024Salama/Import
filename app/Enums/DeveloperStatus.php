<?php

namespace App\Enums;

enum DeveloperStatus
{
    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    /**
     * @return string[]\
     */
    public static function getValues()
    {
        return [
            self::ACTIVE,
            self::INACTIVE,
        ];
    }
}
