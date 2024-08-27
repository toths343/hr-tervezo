<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VNexonMunkaido
 * 
 * @property int $nido_nexon_szemely_id
 * @property int $nido_jogv_id
 * @property int $nido_nisz_id
 * @property Carbon $nido_datum
 * @property float $nido_ora
 * @property string $nido_nap_tipus
 *
 * @package App\Models\Base
 */
class VNexonMunkaido extends Model
{
	const NIDO_NEXON_SZEMELY_ID = 'nido_nexon_szemely_id';
	const NIDO_JOGV_ID = 'nido_jogv_id';
	const NIDO_NISZ_ID = 'nido_nisz_id';
	const NIDO_DATUM = 'nido_datum';
	const NIDO_ORA = 'nido_ora';
	const NIDO_NAP_TIPUS = 'nido_nap_tipus';
	protected $table = 'v_nexon_munkaido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::NIDO_NEXON_SZEMELY_ID => 'int',
		self::NIDO_JOGV_ID => 'int',
		self::NIDO_NISZ_ID => 'int',
		self::NIDO_DATUM => 'datetime',
		self::NIDO_ORA => 'float'
	];
}
