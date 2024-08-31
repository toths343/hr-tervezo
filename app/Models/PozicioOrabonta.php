<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @package App\Models
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

	protected $fillable = [
		self::POZB_POZ_UID,
		self::POZB_PRJ_UID,
		self::POZB_EV,
		self::POZB_HONAP,
		self::POZB_ORA,
		self::POZB_KEZD,
		self::POZB_VEGE,
		self::POZB_CREATED,
		self::POZB_CREATER,
		self::POZB_LASTUPD,
		self::POZB_MODIFIER,
		self::POZB_DEL
	];

	public function pozicio(): BelongsTo
	{
		return $this->belongsTo(Pozicio::class, PozicioOrabonta::POZB_POZ_UID);
	}

	public function projekt(): BelongsTo
	{
		return $this->belongsTo(Projekt::class, PozicioOrabonta::POZB_PRJ_UID);
	}
}
