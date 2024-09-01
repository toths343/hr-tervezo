<?php

namespace App\Models;

use App\Models\Base\Szotar as BaseSzotar;

class Szotar extends BaseSzotar
{
    public static function getSzotar(string|array $szoTipus): array
    {
        if (!is_array($szoTipus)) {
            $szoTipus = [$szoTipus];
        }

        return
            Szotar::query()->whereIn(Szotar::SZO_TIPUS, $szoTipus)->orderBy(Szotar::SZO_HNEV)->get()->mapToGroups(
                function (Szotar $item) {
                    return [$item->szo_tipus => $item];
                }
            )->all();
    }
}
