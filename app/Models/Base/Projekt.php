<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ElszamolasiAdatok;
use App\Models\Partner;
use App\Models\PozicioOrabonta;
use App\Models\ProjektPartner;
use App\Models\TamogatasiEloleg;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Projekt
 *
 * @property int $prj_uid
 * @property int $prj_id
 * @property string $prj_kat
 * @property string $prj_azonosito
 * @property string $prj_jelleg
 * @property string $prj_nev
 * @property string $prj_rovid_nev
 * @property string $prj_status
 * @property string $prj_feladat_modja
 * @property int|null $prj_kapcs_id
 * @property string $prj_tamogatasi_nyilv
 * @property Carbon $prj_tamogatasi_datum
 * @property Carbon $prj_kezdete
 * @property Carbon $prj_vege
 * @property float $prj_tam_eu
 * @property float $prj_tam_hazai
 * @property float $prj_dkf_tam_eu
 * @property float $prj_dkf_tam_hazai
 * @property Carbon $prj_hrterv_kezd
 * @property Carbon $prj_hrterv_vege
 * @property string $prj_forras
 * @property string $prj_munkaszam
 * @property string $prj_konzorciumban
 * @property Carbon $prj_hatkezd
 * @property Carbon $prj_hatvege
 * @property Carbon $prj_created
 * @property string $prj_creater
 * @property Carbon $prj_lastupd
 * @property string $prj_modifier
 * @property int $prj_del
 *
 * @property Collection|ElszamolasiAdatok[] $elszamolasi_adatoks
 * @property Collection|PozicioOrabonta[] $pozicio_orabontas
 * @property Collection|Partner[] $partners
 * @property Collection|TamogatasiEloleg[] $tamogatasi_elolegs
 *
 * @package App\Models\Base
 */
class Projekt extends Model
{
	const PRJ_UID = 'prj_uid';
	const PRJ_ID = 'prj_id';
	const PRJ_KAT = 'prj_kat';
	const PRJ_AZONOSITO = 'prj_azonosito';
	const PRJ_JELLEG = 'prj_jelleg';
	const PRJ_NEV = 'prj_nev';
	const PRJ_ROVID_NEV = 'prj_rovid_nev';
	const PRJ_STATUS = 'prj_status';
	const PRJ_FELADAT_MODJA = 'prj_feladat_modja';
	const PRJ_KAPCS_ID = 'prj_kapcs_id';
	const PRJ_TAMOGATASI_NYILV = 'prj_tamogatasi_nyilv';
	const PRJ_TAMOGATASI_DATUM = 'prj_tamogatasi_datum';
	const PRJ_KEZDETE = 'prj_kezdete';
	const PRJ_VEGE = 'prj_vege';
	const PRJ_TAM_EU = 'prj_tam_eu';
	const PRJ_TAM_HAZAI = 'prj_tam_hazai';
	const PRJ_DKF_TAM_EU = 'prj_dkf_tam_eu';
	const PRJ_DKF_TAM_HAZAI = 'prj_dkf_tam_hazai';
	const PRJ_HRTERV_KEZD = 'prj_hrterv_kezd';
	const PRJ_HRTERV_VEGE = 'prj_hrterv_vege';
	const PRJ_FORRAS = 'prj_forras';
	const PRJ_MUNKASZAM = 'prj_munkaszam';
	const PRJ_KONZORCIUMBAN = 'prj_konzorciumban';
	const PRJ_HATKEZD = 'prj_hatkezd';
	const PRJ_HATVEGE = 'prj_hatvege';
	const PRJ_CREATED = 'prj_created';
	const PRJ_CREATER = 'prj_creater';
	const PRJ_LASTUPD = 'prj_lastupd';
	const PRJ_MODIFIER = 'prj_modifier';
	const PRJ_DEL = 'prj_del';
	protected $table = 'projekt';
	protected $primaryKey = 'prj_uid';
	public $timestamps = false;

	protected $casts = [
		self::PRJ_UID => 'int',
		self::PRJ_ID => 'int',
		self::PRJ_KAPCS_ID => 'int',
		self::PRJ_TAMOGATASI_DATUM => 'datetime',
		self::PRJ_KEZDETE => 'datetime',
		self::PRJ_VEGE => 'datetime',
		self::PRJ_TAM_EU => 'float',
		self::PRJ_TAM_HAZAI => 'float',
		self::PRJ_DKF_TAM_EU => 'float',
		self::PRJ_DKF_TAM_HAZAI => 'float',
		self::PRJ_HRTERV_KEZD => 'datetime',
		self::PRJ_HRTERV_VEGE => 'datetime',
		self::PRJ_HATKEZD => 'datetime',
		self::PRJ_HATVEGE => 'datetime',
		self::PRJ_CREATED => 'datetime',
		self::PRJ_LASTUPD => 'datetime',
		self::PRJ_DEL => 'int'
	];

	protected $fillable = [
		self::PRJ_ID,
		self::PRJ_KAT,
		self::PRJ_AZONOSITO,
		self::PRJ_JELLEG,
		self::PRJ_NEV,
		self::PRJ_ROVID_NEV,
		self::PRJ_STATUS,
		self::PRJ_FELADAT_MODJA,
		self::PRJ_KAPCS_ID,
		self::PRJ_TAMOGATASI_NYILV,
		self::PRJ_TAMOGATASI_DATUM,
		self::PRJ_KEZDETE,
		self::PRJ_VEGE,
		self::PRJ_TAM_EU,
		self::PRJ_TAM_HAZAI,
		self::PRJ_DKF_TAM_EU,
		self::PRJ_DKF_TAM_HAZAI,
		self::PRJ_HRTERV_KEZD,
		self::PRJ_HRTERV_VEGE,
		self::PRJ_FORRAS,
		self::PRJ_MUNKASZAM,
		self::PRJ_KONZORCIUMBAN,
		self::PRJ_HATKEZD,
		self::PRJ_HATVEGE,
		self::PRJ_CREATED,
		self::PRJ_CREATER,
		self::PRJ_LASTUPD,
		self::PRJ_MODIFIER,
		self::PRJ_DEL
	];

	public function elszamolasi_adatoks(): HasMany
	{
		return $this->hasMany(ElszamolasiAdatok::class, ElszamolasiAdatok::ELSZAM_PRJ_ID, ElszamolasiAdatok::PRJ_ID);
	}

	public function pozicio_orabontas(): HasMany
	{
		return $this->hasMany(PozicioOrabonta::class, PozicioOrabonta::POZB_PRJ_UID);
	}

	public function partners(): BelongsToMany
	{
		return $this->belongsToMany(Partner::class, 'projekt_partner', Partner::PRJP_PRJ_ID, Partner::PRJP_PAR_ID)
					->withPivot(ProjektPartner::PRJP_UID, ProjektPartner::PRJP_JELLEG, ProjektPartner::PRJP_DEL);
	}

	public function tamogatasi_elolegs(): HasMany
	{
		return $this->hasMany(TamogatasiEloleg::class, TamogatasiEloleg::TAM_PRJ_ID, TamogatasiEloleg::PRJ_ID);
	}
}
