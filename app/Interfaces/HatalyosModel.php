<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface HatalyosModel
{
    function getUid(): int;

    function getUniqueName(): string;

    function getHatkezd(): Carbon;

    function getHatvege(): Carbon;

    function getHatInterval(): string;

    function isActive(): bool;
}
