<?php

namespace App\Utility;

class TranscationStatus
{
    const APPROVED = "approved";
    const FAIL = "fail";
    const PENDING = "pending";

    public static function getTypes()
    {
        return [
            self::APPROVED,
            self::FAIL,
            self::PENDING,
        ];
    }
}
