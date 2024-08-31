<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class TenyBerFeloszta
 *
 * @property int $teb_uid
 * @property int $teb_tebb_uid
 * @property int $teb_jogv_id
 * @property int|null $teb_jut_uid
 * @property int $teb_szamf_ev
 * @property int $teb_szamf_honap
 * @property Carbon $teb_von_kezd
 * @property Carbon $teb_von_vege
 * @property int $teb_m_napok
 * @property int $teb_n_napok
 * @property float $teb_m_ora
 * @property float $teb_osszeg
 * @property int $teb_nido_hiany
 * @property Carbon $teb_created
 * @property string $teb_creater
 * @property Carbon $teb_lastupd
 * @property string $teb_modifier
 * @property int $teb_del
 *
 * @property TenyBerBetolte $teny_ber_betolte
 *
 * @package App\Models
 */
class TenyBerFeloszta extends Model
{
	const TEB_UID = 'teb_uid';
	const TEB_TEBB_UID = 'teb_tebb_uid';
	const TEB_JOGV_ID = 'teb_jogv_id';
	const TEB_JUT_UID = 'teb_jut_uid';
	const TEB_SZAMF_EV = 'teb_szamf_ev';
	const TEB_SZAMF_HONAP = 'teb_szamf_honap';
	const TEB_VON_KEZD = 'teb_von_kezd';
	const TEB_VON_VEGE = 'teb_von_vege';
	const TEB_M_NAPOK = 'teb_m_napok';
	const TEB_N_NAPOK = 'teb_n_napok';
	const TEB_M_ORA = 'teb_m_ora';
	const TEB_OSSZEG = 'teb_osszeg';
	const TEB_NIDO_HIANY = 'teb_nido_hiany';
	const TEB_CREATED = 'teb_created';
	const TEB_CREATER = 'teb_creater';
	const TEB_LASTUPD = 'teb_lastupd';
	const TEB_MODIFIER = 'teb_modifier';
	const TEB_DEL = 'teb_del';
	protected $table = 'teny_ber_felosztas';
	protected $primaryKey = 'teb_uid';
	public $timestamps = false;

	protected $casts = [
		self::TEB_UID => 'int',
		self::TEB_TEBB_UID => 'int',
		self::TEB_JOGV_ID => 'int',
		self::TEB_JUT_UID => 'int',
		self::TEB_SZAMF_EV => 'int',
		self::TEB_SZAMF_HONAP => 'int',
		self::TEB_VON_KEZD => 'datetime',
		self::TEB_VON_VEGE => 'datetime',
		self::TEB_M_NAPOK => 'int',
		self::TEB_N_NAPOK => 'int',
		self::TEB_M_ORA => 'float',
		self::TEB_OSSZEG => 'float',
		self::TEB_NIDO_HIANY => 'int',
		self::TEB_CREATED => 'datetime',
		self::TEB_LASTUPD => 'datetime',
		self::TEB_DEL => 'int'
	];

	protected $fillable = [
		self::TEB_TEBB_UID,
		self::TEB_JOGV_ID,
		self::TEB_JUT_UID,
		self::TEB_SZAMF_EV,
		self::TEB_SZAMF_HONAP,
		self::TEB_VON_KEZD,
		self::TEB_VON_VEGE,
		self::TEB_M_NAPOK,
		self::TEB_N_NAPOK,
		self::TEB_M_ORA,
		self::TEB_OSSZEG,
		self::TEB_NIDO_HIANY,
		self::TEB_CREATED,
		self::TEB_CREATER,
		self::TEB_LASTUPD,
		self::TEB_MODIFIER,
		self::TEB_DEL
	];

	public function teny_ber_betolte(): BelongsTo
	{
		return $this->belongsTo(TenyBerBetolte::class, TenyBerFeloszta::TEB_TEBB_UID);
	}
}
