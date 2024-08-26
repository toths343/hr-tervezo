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
	protected $table = 'v_sys_honapok';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'honap_ev' => 'int',
		'honap_honap' => 'int',
		'honap_kezd' => 'datetime',
		'honap_vege' => 'datetime'
	];
}
