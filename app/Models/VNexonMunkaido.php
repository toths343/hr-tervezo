<?php

namespace App\Models;

use App\Models\Base\VNexonMunkaido as BaseVNexonMunkaido;

class VNexonMunkaido extends BaseVNexonMunkaido
{
	protected $fillable = [
		'nido_nexon_szemely_id',
		'nido_jogv_id',
		'nido_nisz_id',
		'nido_datum',
		'nido_ora',
		'nido_nap_tipus'
	];
}
