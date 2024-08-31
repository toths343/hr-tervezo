<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Kapcsolattarto;
use App\Models\Projekt;
use App\Models\ProjektPartner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Partner
 *
 * @property int $par_uid
 * @property int $par_id
 * @property string $par_azonosito
 * @property string $par_nev
 * @property string $par_adoszam
 * @property string $par_nyilv_szam
 * @property string $par_cim
 * @property Carbon $par_hatkezd
 * @property Carbon $par_hatvege
 * @property Carbon $created_at
 * @property string $creater
 * @property Carbon $updated_at
 * @property string $modifier
 * @property string|null $del
 *
 * @property Collection|Kapcsolattarto[] $kapcsolattartos
 * @property Collection|Projekt[] $projekts
 *
 * @package App\Models\Base
 */
class Partner extends Model
{
	use SoftDeletes;
	const DELETED_AT = 'del';
	const PAR_UID = 'par_uid';
	const PAR_ID = 'par_id';
	const PAR_AZONOSITO = 'par_azonosito';
	const PAR_NEV = 'par_nev';
	const PAR_ADOSZAM = 'par_adoszam';
	const PAR_NYILV_SZAM = 'par_nyilv_szam';
	const PAR_CIM = 'par_cim';
	const PAR_HATKEZD = 'par_hatkezd';
	const PAR_HATVEGE = 'par_hatvege';
	const CREATED_AT = 'created_at';
	const CREATER = 'creater';
	const UPDATED_AT = 'updated_at';
	const MODIFIER = 'modifier';
	protected $table = 'partner';
	protected $primaryKey = 'par_uid';
	public $timestamps = false;

	protected $casts = [
		self::PAR_UID => 'int',
		self::PAR_ID => 'int',
		self::PAR_HATKEZD => 'datetime',
		self::PAR_HATVEGE => 'datetime',
		self::CREATED_AT => 'datetime',
		self::UPDATED_AT => 'datetime'
	];

	protected $fillable = [
		self::PAR_ID,
		self::PAR_AZONOSITO,
		self::PAR_NEV,
		self::PAR_ADOSZAM,
		self::PAR_NYILV_SZAM,
		self::PAR_CIM,
		self::PAR_HATKEZD,
		self::PAR_HATVEGE,
		self::CREATED_AT,
		self::CREATER,
		self::UPDATED_AT,
		self::MODIFIER
	];

	public function kapcsolattartos(): HasMany
	{
		return $this->hasMany(Kapcsolattarto::class, Kapcsolattarto::KAPCS_PAR_ID, Kapcsolattarto::PAR_ID);
	}

	public function projekts(): BelongsToMany
	{
		return $this->belongsToMany(Projekt::class, 'projekt_partner', Projekt::PRJP_PAR_ID, Projekt::PRJP_PRJ_ID)
					->withPivot(ProjektPartner::PRJP_UID, ProjektPartner::PRJP_JELLEG, ProjektPartner::PRJP_DEL);
	}
}
