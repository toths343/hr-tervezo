<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PozicioKategorium;
use App\Models\PozicioOrabonta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Pozicio
 * 
 * @property int $poz_uid
 * @property int $poz_mkv_id
 * @property int|null $poz_pozk_uid
 * @property string $poz_nev
 * @property string|null $poz_szervezet
 * @property int|null $poz_aktiv
 * @property Carbon $poz_hatkezd
 * @property Carbon $poz_hatvege
 * @property Carbon $poz_created
 * @property string $poz_creater
 * @property Carbon $poz_lastupd
 * @property string $poz_modifier
 * @property int $poz_del
 * 
 * @property PozicioKategorium|null $poz
 * @property Collection|PozicioOrabonta[] $pozicio_orabontas_where_pozb
 *
 * @package App\Models\Base
 */
class Pozicio extends Model
{
	const POZ_UID = 'poz_uid';
	const POZ_MKV_ID = 'poz_mkv_id';
	const POZ_POZK_UID = 'poz_pozk_uid';
	const POZ_NEV = 'poz_nev';
	const POZ_SZERVEZET = 'poz_szervezet';
	const POZ_AKTIV = 'poz_aktiv';
	const POZ_HATKEZD = 'poz_hatkezd';
	const POZ_HATVEGE = 'poz_hatvege';
	const POZ_CREATED = 'poz_created';
	const POZ_CREATER = 'poz_creater';
	const POZ_LASTUPD = 'poz_lastupd';
	const POZ_MODIFIER = 'poz_modifier';
	const POZ_DEL = 'poz_del';
	protected $table = 'pozicio';
	protected $primaryKey = 'poz_uid';
	public $timestamps = false;

	protected $casts = [
		self::POZ_UID => 'int',
		self::POZ_MKV_ID => 'int',
		self::POZ_POZK_UID => 'int',
		self::POZ_AKTIV => 'int',
		self::POZ_HATKEZD => 'datetime',
		self::POZ_HATVEGE => 'datetime',
		self::POZ_CREATED => 'datetime',
		self::POZ_LASTUPD => 'datetime',
		self::POZ_DEL => 'int'
	];

	protected $fillable = [
		self::POZ_MKV_ID,
		self::POZ_POZK_UID,
		self::POZ_NEV,
		self::POZ_SZERVEZET,
		self::POZ_AKTIV,
		self::POZ_HATKEZD,
		self::POZ_HATVEGE,
		self::POZ_CREATED,
		self::POZ_CREATER,
		self::POZ_LASTUPD,
		self::POZ_MODIFIER,
		self::POZ_DEL
	];

	public function poz(): BelongsTo
	{
		return $this->belongsTo(PozicioKategorium::class, \App\Models\Pozicio::POZ_POZK_UID);
	}

	public function pozicio_orabontas_where_pozb(): HasMany
	{
		return $this->hasMany(PozicioOrabonta::class, PozicioOrabonta::POZB_POZ_UID);
	}
}
