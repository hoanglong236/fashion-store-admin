<?php

namespace App\ModelConstants;

class AddressType
{
    const HOME = 'Home';
    const OFFICE = 'Office';

    private function __construct()
    {
    }

    public static function toArray()
    {
        return [
            static::HOME,
            static::OFFICE,
        ];
    }
}
