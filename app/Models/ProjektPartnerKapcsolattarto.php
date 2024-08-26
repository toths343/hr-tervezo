<?php

namespace App\Models;

use App\Models\Base\ProjektPartnerKapcsolattarto as BaseProjektPartnerKapcsolattarto;

class ProjektPartnerKapcsolattarto extends BaseProjektPartnerKapcsolattarto
{
	protected $fillable = [
		'prjpk_jelleg',
		'prjpk_kapcs_id',
		'prjpk_prjp_uid'
	];
}
