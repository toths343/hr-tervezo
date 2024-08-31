<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class TenyBerBetolte
 *
 * @property int $tebb_uid
 * @property int $tebb_sorszam
 * @property int $tebb_jogv_id
 * @property Carbon $tebb_von_kezd
 * @property Carbon $tebb_von_vege
 * @property Carbon $tebb_szamf_kezd
 * @property Carbon $tebb_szamf_vege
 * @property string $tebb_munkavallalo
 * @property string $tebb_tartozik_fokonyv
 * @property string $tebb_tartozik_megnevezes
 * @property string $tebb_juttatas
 * @property string $tebb_kovetel_fokonyv
 * @property string $tebb_kovetel_megnevezes
 * @property float|null $tebb_osszeg
 * @property Carbon $tebb_created
 * @property string $tebb_creater
 * @property Carbon $tebb_lastupd
 * @property string $tebb_modifier
 * @property int $tebb_del
 *
 * @property Collection|TenyBerFeloszta[] $teny_ber_felosztas
 *
 * @package App\Models
 */
class TenyBerBetolte extends Model
{
	const TEBB_UID = 'tebb_uid';
	const TEBB_SORSZAM = 'tebb_sorszam';
	const TEBB_JOGV_ID = 'tebb_jogv_id';
	const TEBB_VON_KEZD = 'tebb_von_kezd';
	const TEBB_VON_VEGE = 'tebb_von_vege';
	const TEBB_SZAMF_KEZD = 'tebb_szamf_kezd';
	const TEBB_SZAMF_VEGE = 'tebb_szamf_vege';
	const TEBB_MUNKAVALLALO = 'tebb_munkavallalo';
	const TEBB_TARTOZIK_FOKONYV = 'tebb_tartozik_fokonyv';
	const TEBB_TARTOZIK_MEGNEVEZES = 'tebb_tartozik_megnevezes';
	const TEBB_JUTTATAS = 'tebb_juttatas';
	const TEBB_KOVETEL_FOKONYV = 'tebb_kovetel_fokonyv';
	const TEBB_KOVETEL_MEGNEVEZES = 'tebb_kovetel_megnevezes';
	const TEBB_OSSZEG = 'tebb_osszeg';
	const TEBB_CREATED = 'tebb_created';
	const TEBB_CREATER = 'tebb_creater';
	const TEBB_LASTUPD = 'tebb_lastupd';
	const TEBB_MODIFIER = 'tebb_modifier';
	const TEBB_DEL = 'tebb_del';
	protected $table = 'teny_ber_betoltes';
	protected $primaryKey = 'tebb_uid';
	public $timestamps = false;

	protected $casts = [
		self::TEBB_UID => 'int',
		self::TEBB_SORSZAM => 'int',
		self::TEBB_JOGV_ID => 'int',
		self::TEBB_VON_KEZD => 'datetime',
		self::TEBB_VON_VEGE => 'datetime',
		self::TEBB_SZAMF_KEZD => 'datetime',
		self::TEBB_SZAMF_VEGE => 'datetime',
		self::TEBB_OSSZEG => 'float',
		self::TEBB_CREATED => 'datetime',
		self::TEBB_LASTUPD => 'datetime',
		self::TEBB_DEL => 'int'
	];

	protected $fillable = [
		self::TEBB_SORSZAM,
		self::TEBB_JOGV_ID,
		self::TEBB_VON_KEZD,
		self::TEBB_VON_VEGE,
		self::TEBB_SZAMF_KEZD,
		self::TEBB_SZAMF_VEGE,
		self::TEBB_MUNKAVALLALO,
		self::TEBB_TARTOZIK_FOKONYV,
		self::TEBB_TARTOZIK_MEGNEVEZES,
		self::TEBB_JUTTATAS,
		self::TEBB_KOVETEL_FOKONYV,
		self::TEBB_KOVETEL_MEGNEVEZES,
		self::TEBB_OSSZEG,
		self::TEBB_CREATED,
		self::TEBB_CREATER,
		self::TEBB_LASTUPD,
		self::TEBB_MODIFIER,
		self::TEBB_DEL
	];

	public function teny_ber_felosztas(): HasMany
	{
		return $this->hasMany(TenyBerFeloszta::class, TenyBerFeloszta::TEB_TEBB_UID);
	}
}
