<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface HatalyosModel
{
    function getId(): int;

    function getUid(): int;

    function getUniqueName(): string;

    function getHatkezd(): Carbon;

    function getHatvege(): Carbon;

    function getHatInterval(): string;

    static function getNextId(): int;

    function isActive(): bool;

}
