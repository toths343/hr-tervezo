<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Pozicio;
use App\Models\Projekt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PozicioOrabonta
 * 
 * @property int $pozb_uid
 * @property int $pozb_poz_uid
 * @property int $pozb_prj_uid
 * @property int $pozb_ev
 * @property int $pozb_honap
 * @property float $pozb_ora
 * @property Carbon $pozb_kezd
 * @property Carbon $pozb_vege
 * @property Carbon $pozb_created
 * @property string $pozb_creater
 * @property Carbon $pozb_lastupd
 * @property string $pozb_modifier
 * @property int $pozb_del
 * 
 * @property Pozicio $pozicio
 * @property Projekt $projekt
 *
 * @package App\Models\Base
 */
class PozicioOrabonta extends Model
{
	const POZB_UID = 'pozb_uid';
	const POZB_POZ_UID = 'pozb_poz_uid';
	const POZB_PRJ_UID = 'pozb_prj_uid';
	const POZB_EV = 'pozb_ev';
	const POZB_HONAP = 'pozb_honap';
	const POZB_ORA = 'pozb_ora';
	const POZB_KEZD = 'pozb_kezd';
	const POZB_VEGE = 'pozb_vege';
	const POZB_CREATED = 'pozb_created';
	const POZB_CREATER = 'pozb_creater';
	const POZB_LASTUPD = 'pozb_lastupd';
	const POZB_MODIFIER = 'pozb_modifier';
	const POZB_DEL = 'pozb_del';
	protected $table = 'pozicio_orabontas';
	protected $primaryKey = 'pozb_uid';
	public $timestamps = false;

	protected $casts = [
		self::POZB_UID => 'int',
		self::POZB_POZ_UID => 'int',
		self::POZB_PRJ_UID => 'int',
		self::POZB_EV => 'int',
		self::POZB_HONAP => 'int',
		self::POZB_ORA => 'float',
		self::POZB_KEZD => 'datetime',
		self::POZB_VEGE => 'datetime',
		self::POZB_CREATED => 'datetime',
		self::POZB_LASTUPD => 'datetime',
		self::POZB_DEL => 'int'
	];

	public function pozicio()
	{
		return $this->belongsTo(Pozicio::class, \App\Models\PozicioOrabonta::POZB_POZ_UID);
	}

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, \App\Models\PozicioOrabonta::POZB_PRJ_UID);
	}
}
