<?php

namespace App\Models;

use App\Models\Base\VSysHonapok as BaseVSysHonapok;

class VSysHonapok extends BaseVSysHonapok
{
	protected $fillable = [
		'honap_ev',
		'honap_honap',
		'honap_kezd',
		'honap_vege'
	];
}
