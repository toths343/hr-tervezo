<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VSysHonapok
 * 
 * @property int|null $honap_ev
 * @property int|null $honap_honap
 * @property Carbon|null $honap_kezd
 * @property Carbon|null $honap_vege
 *
 * @package App\Models\Base
 */
class VSysHonapok extends Model
{
	const HONAP_EV = 'honap_ev';
	const HONAP_HONAP = 'honap_honap';
	const HONAP_KEZD = 'honap_kezd';
	const HONAP_VEGE = 'honap_vege';
	protected $table = 'v_sys_honapok';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::HONAP_EV => 'int',
		self::HONAP_HONAP => 'int',
		self::HONAP_KEZD => 'datetime',
		self::HONAP_VEGE => 'datetime'
	];
}
