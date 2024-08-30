<?php

namespace App\Interfaces;

use Carbon\Carbon;

interface HatalyosModel
{

    function getHatkezd(): Carbon;

    function getHatvege(): Carbon;

    function getHatInterval(): string;
}
