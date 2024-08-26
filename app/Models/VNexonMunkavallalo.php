<?php

namespace App\Models;

use App\Models\Base\VNexonMunkavallalo as BaseVNexonMunkavallalo;

class VNexonMunkavallalo extends BaseVNexonMunkavallalo
{
	protected $fillable = [
		'nmkv_uid',
		'nmkv_nexon_szemely_id',
		'nmkv_nexon_jogv_id',
		'nmkv_nev',
		'nmkv_hatkezd',
		'nmkv_hatvege'
	];
}
