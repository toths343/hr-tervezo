<?php

namespace App\Models;

use App\Models\Base\ProjektPartner as BaseProjektPartner;

class ProjektPartner extends BaseProjektPartner
{
	protected $fillable = [
		'prjp_jelleg',
		'prjp_par_id',
		'prjp_prj_id'
	];
}
