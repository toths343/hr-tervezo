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
 * @property Carbon $par_created
 * @property string $par_creater
 * @property Carbon $par_lastupd
 * @property string $par_modifier
 * @property int $par_del
 * 
 * @property Collection|Kapcsolattarto[] $kapcsolattartos
 * @property Collection|Projekt[] $projekts
 *
 * @package App\Models\Base
 */
class Partner extends Model
{
	const PAR_UID = 'par_uid';
	const PAR_ID = 'par_id';
	const PAR_AZONOSITO = 'par_azonosito';
	const PAR_NEV = 'par_nev';
	const PAR_ADOSZAM = 'par_adoszam';
	const PAR_NYILV_SZAM = 'par_nyilv_szam';
	const PAR_CIM = 'par_cim';
	const PAR_HATKEZD = 'par_hatkezd';
	const PAR_HATVEGE = 'par_hatvege';
	const PAR_CREATED = 'par_created';
	const PAR_CREATER = 'par_creater';
	const PAR_LASTUPD = 'par_lastupd';
	const PAR_MODIFIER = 'par_modifier';
	const PAR_DEL = 'par_del';
	protected $table = 'partner';
	protected $primaryKey = 'par_uid';
	public $timestamps = false;

	protected $casts = [
		self::PAR_UID => 'int',
		self::PAR_ID => 'int',
		self::PAR_HATKEZD => 'datetime',
		self::PAR_HATVEGE => 'datetime',
		self::PAR_CREATED => 'datetime',
		self::PAR_LASTUPD => 'datetime',
		self::PAR_DEL => 'int'
	];

	public function kapcsolattartos()
	{
		return $this->hasMany(Kapcsolattarto::class, Kapcsolattarto::KAPCS_PAR_ID, Kapcsolattarto::PAR_ID);
	}

	public function projekts()
	{
		return $this->belongsToMany(Projekt::class, 'projekt_partner', Projekt::PRJP_PAR_ID, Projekt::PRJP_PRJ_ID)
					->withPivot(ProjektPartner::PRJP_UID, ProjektPartner::PRJP_JELLEG, ProjektPartner::PRJP_DEL);
	}
}
