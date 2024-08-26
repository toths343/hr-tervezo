<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Projekt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ElszamolasiAdatok
 * 
 * @property int $elszam_uid
 * @property int $elszam_prj_id
 * @property string $elszam_azonosito
 * @property string $elszam_status
 * @property Carbon $elszam_benyujt_date
 * @property Carbon|null $elszam_zaras_date
 * @property float|null $dkf_benyujt_eu_teteles_eloleg
 * @property float|null $dkf_benyujt_hazai_teteles_eloleg
 * @property float|null $dkf_benyujt_eu_atalany_eloleg
 * @property float|null $dkf_benyujt_hazai_atalany_eloleg
 * @property float|null $dkf_benyujt_eu_teteles_utofin
 * @property float|null $dkf_benyujt_hazai_teteles_utofin
 * @property float|null $dkf_benyujt_eu_atalany_utofin
 * @property float|null $dkf_benyujt_hazai_atalany_utofin
 * @property float|null $dkf_elfog_eu_teteles_eloleg
 * @property float|null $dkf_elfog_hazai_teteles_eloleg
 * @property float|null $dkf_elfog_eu_atalany_eloleg
 * @property float|null $dkf_elfog_hazai_atalany_eloleg
 * @property float|null $dkf_elfog_eu_teteles_utofin
 * @property float|null $dkf_elfog_hazai_teteles_utofin
 * @property float|null $dkf_elfog_eu_atalany_utofin
 * @property float|null $dkf_elfog_hazai_atalany_utofin
 * @property float|null $szallito_benyujt_eu_teteles_eloleg
 * @property float|null $szallito_benyujt_hazai_teteles_eloleg
 * @property float|null $szallito_benyujt_eu_atalany_eloleg
 * @property float|null $szallito_benyujt_hazai_atalany_eloleg
 * @property float|null $szallito_benyujt_eu_teteles_utofin
 * @property float|null $szallito_benyujt_hazai_teteles_utofin
 * @property float|null $szallito_benyujt_eu_atalany_utofin
 * @property float|null $szallito_benyujt_hazai_atalany_utofin
 * @property float|null $szallito_elfog_eu_teteles_eloleg
 * @property float|null $szallito_elfog_hazai_teteles_eloleg
 * @property float|null $szallito_elfog_eu_atalany_eloleg
 * @property float|null $szallito_elfog_hazai_atalany_eloleg
 * @property float|null $szallito_elfog_eu_teteles_utofin
 * @property float|null $szallito_elfog_hazai_teteles_utofin
 * @property float|null $szallito_elfog_eu_atalany_utofin
 * @property float|null $szallito_elfog_hazai_atalany_utofin
 * @property string|null $dkf_benyujt_teteles_eloleg_megj
 * @property string|null $dkf_benyujt_atalany_eloleg_megj
 * @property string|null $dkf_benyujt_teteles_utofin_megj
 * @property string|null $dkf_benyujt_atlany_utofin_megj
 * @property string|null $dkf_elfog_teteles_eloleg_megj
 * @property string|null $dkf_elfog_atalany_eloleg_megj
 * @property string|null $dkf_elfog_teteles_utofin_megj
 * @property string|null $dkf_elfog_atlany_utofin_megj
 * @property string|null $szallito_benyujt_teteles_eloleg_megj
 * @property string|null $szallito_benyujt_atalany_eloleg_megj
 * @property string|null $szallito_benyujt_teteles_utofin_megj
 * @property string|null $szallito_benyujt_atlany_utofin_megj
 * @property string|null $szallito_elfog_teteles_eloleg_megj
 * @property string|null $szallito_elfog_atalany_eloleg_megj
 * @property string|null $szallito_elfog_teteles_utofin_megj
 * @property string|null $szallito_elfog_atlany_utofin_megj
 * @property Carbon $elszam_created
 * @property string $elszam_creater
 * @property Carbon $elszam_lastupd
 * @property string $elszam_modifier
 * @property int $elszam_del
 * 
 * @property Projekt $projekt
 *
 * @package App\Models\Base
 */
class ElszamolasiAdatok extends Model
{
	const ELSZAM_UID = 'elszam_uid';
	const ELSZAM_PRJ_ID = 'elszam_prj_id';
	const ELSZAM_AZONOSITO = 'elszam_azonosito';
	const ELSZAM_STATUS = 'elszam_status';
	const ELSZAM_BENYUJT_DATE = 'elszam_benyujt_date';
	const ELSZAM_ZARAS_DATE = 'elszam_zaras_date';
	const DKF_BENYUJT_EU_TETELES_ELOLEG = 'dkf_benyujt_eu_teteles_eloleg';
	const DKF_BENYUJT_HAZAI_TETELES_ELOLEG = 'dkf_benyujt_hazai_teteles_eloleg';
	const DKF_BENYUJT_EU_ATALANY_ELOLEG = 'dkf_benyujt_eu_atalany_eloleg';
	const DKF_BENYUJT_HAZAI_ATALANY_ELOLEG = 'dkf_benyujt_hazai_atalany_eloleg';
	const DKF_BENYUJT_EU_TETELES_UTOFIN = 'dkf_benyujt_eu_teteles_utofin';
	const DKF_BENYUJT_HAZAI_TETELES_UTOFIN = 'dkf_benyujt_hazai_teteles_utofin';
	const DKF_BENYUJT_EU_ATALANY_UTOFIN = 'dkf_benyujt_eu_atalany_utofin';
	const DKF_BENYUJT_HAZAI_ATALANY_UTOFIN = 'dkf_benyujt_hazai_atalany_utofin';
	const DKF_ELFOG_EU_TETELES_ELOLEG = 'dkf_elfog_eu_teteles_eloleg';
	const DKF_ELFOG_HAZAI_TETELES_ELOLEG = 'dkf_elfog_hazai_teteles_eloleg';
	const DKF_ELFOG_EU_ATALANY_ELOLEG = 'dkf_elfog_eu_atalany_eloleg';
	const DKF_ELFOG_HAZAI_ATALANY_ELOLEG = 'dkf_elfog_hazai_atalany_eloleg';
	const DKF_ELFOG_EU_TETELES_UTOFIN = 'dkf_elfog_eu_teteles_utofin';
	const DKF_ELFOG_HAZAI_TETELES_UTOFIN = 'dkf_elfog_hazai_teteles_utofin';
	const DKF_ELFOG_EU_ATALANY_UTOFIN = 'dkf_elfog_eu_atalany_utofin';
	const DKF_ELFOG_HAZAI_ATALANY_UTOFIN = 'dkf_elfog_hazai_atalany_utofin';
	const SZALLITO_BENYUJT_EU_TETELES_ELOLEG = 'szallito_benyujt_eu_teteles_eloleg';
	const SZALLITO_BENYUJT_HAZAI_TETELES_ELOLEG = 'szallito_benyujt_hazai_teteles_eloleg';
	const SZALLITO_BENYUJT_EU_ATALANY_ELOLEG = 'szallito_benyujt_eu_atalany_eloleg';
	const SZALLITO_BENYUJT_HAZAI_ATALANY_ELOLEG = 'szallito_benyujt_hazai_atalany_eloleg';
	const SZALLITO_BENYUJT_EU_TETELES_UTOFIN = 'szallito_benyujt_eu_teteles_utofin';
	const SZALLITO_BENYUJT_HAZAI_TETELES_UTOFIN = 'szallito_benyujt_hazai_teteles_utofin';
	const SZALLITO_BENYUJT_EU_ATALANY_UTOFIN = 'szallito_benyujt_eu_atalany_utofin';
	const SZALLITO_BENYUJT_HAZAI_ATALANY_UTOFIN = 'szallito_benyujt_hazai_atalany_utofin';
	const SZALLITO_ELFOG_EU_TETELES_ELOLEG = 'szallito_elfog_eu_teteles_eloleg';
	const SZALLITO_ELFOG_HAZAI_TETELES_ELOLEG = 'szallito_elfog_hazai_teteles_eloleg';
	const SZALLITO_ELFOG_EU_ATALANY_ELOLEG = 'szallito_elfog_eu_atalany_eloleg';
	const SZALLITO_ELFOG_HAZAI_ATALANY_ELOLEG = 'szallito_elfog_hazai_atalany_eloleg';
	const SZALLITO_ELFOG_EU_TETELES_UTOFIN = 'szallito_elfog_eu_teteles_utofin';
	const SZALLITO_ELFOG_HAZAI_TETELES_UTOFIN = 'szallito_elfog_hazai_teteles_utofin';
	const SZALLITO_ELFOG_EU_ATALANY_UTOFIN = 'szallito_elfog_eu_atalany_utofin';
	const SZALLITO_ELFOG_HAZAI_ATALANY_UTOFIN = 'szallito_elfog_hazai_atalany_utofin';
	const DKF_BENYUJT_TETELES_ELOLEG_MEGJ = 'dkf_benyujt_teteles_eloleg_megj';
	const DKF_BENYUJT_ATALANY_ELOLEG_MEGJ = 'dkf_benyujt_atalany_eloleg_megj';
	const DKF_BENYUJT_TETELES_UTOFIN_MEGJ = 'dkf_benyujt_teteles_utofin_megj';
	const DKF_BENYUJT_ATLANY_UTOFIN_MEGJ = 'dkf_benyujt_atlany_utofin_megj';
	const DKF_ELFOG_TETELES_ELOLEG_MEGJ = 'dkf_elfog_teteles_eloleg_megj';
	const DKF_ELFOG_ATALANY_ELOLEG_MEGJ = 'dkf_elfog_atalany_eloleg_megj';
	const DKF_ELFOG_TETELES_UTOFIN_MEGJ = 'dkf_elfog_teteles_utofin_megj';
	const DKF_ELFOG_ATLANY_UTOFIN_MEGJ = 'dkf_elfog_atlany_utofin_megj';
	const SZALLITO_BENYUJT_TETELES_ELOLEG_MEGJ = 'szallito_benyujt_teteles_eloleg_megj';
	const SZALLITO_BENYUJT_ATALANY_ELOLEG_MEGJ = 'szallito_benyujt_atalany_eloleg_megj';
	const SZALLITO_BENYUJT_TETELES_UTOFIN_MEGJ = 'szallito_benyujt_teteles_utofin_megj';
	const SZALLITO_BENYUJT_ATLANY_UTOFIN_MEGJ = 'szallito_benyujt_atlany_utofin_megj';
	const SZALLITO_ELFOG_TETELES_ELOLEG_MEGJ = 'szallito_elfog_teteles_eloleg_megj';
	const SZALLITO_ELFOG_ATALANY_ELOLEG_MEGJ = 'szallito_elfog_atalany_eloleg_megj';
	const SZALLITO_ELFOG_TETELES_UTOFIN_MEGJ = 'szallito_elfog_teteles_utofin_megj';
	const SZALLITO_ELFOG_ATLANY_UTOFIN_MEGJ = 'szallito_elfog_atlany_utofin_megj';
	const ELSZAM_CREATED = 'elszam_created';
	const ELSZAM_CREATER = 'elszam_creater';
	const ELSZAM_LASTUPD = 'elszam_lastupd';
	const ELSZAM_MODIFIER = 'elszam_modifier';
	const ELSZAM_DEL = 'elszam_del';
	protected $table = 'elszamolasi_adatok';
	protected $primaryKey = 'elszam_uid';
	public $timestamps = false;

	protected $casts = [
		self::ELSZAM_UID => 'int',
		self::ELSZAM_PRJ_ID => 'int',
		self::ELSZAM_BENYUJT_DATE => 'datetime',
		self::ELSZAM_ZARAS_DATE => 'datetime',
		self::DKF_BENYUJT_EU_TETELES_ELOLEG => 'float',
		self::DKF_BENYUJT_HAZAI_TETELES_ELOLEG => 'float',
		self::DKF_BENYUJT_EU_ATALANY_ELOLEG => 'float',
		self::DKF_BENYUJT_HAZAI_ATALANY_ELOLEG => 'float',
		self::DKF_BENYUJT_EU_TETELES_UTOFIN => 'float',
		self::DKF_BENYUJT_HAZAI_TETELES_UTOFIN => 'float',
		self::DKF_BENYUJT_EU_ATALANY_UTOFIN => 'float',
		self::DKF_BENYUJT_HAZAI_ATALANY_UTOFIN => 'float',
		self::DKF_ELFOG_EU_TETELES_ELOLEG => 'float',
		self::DKF_ELFOG_HAZAI_TETELES_ELOLEG => 'float',
		self::DKF_ELFOG_EU_ATALANY_ELOLEG => 'float',
		self::DKF_ELFOG_HAZAI_ATALANY_ELOLEG => 'float',
		self::DKF_ELFOG_EU_TETELES_UTOFIN => 'float',
		self::DKF_ELFOG_HAZAI_TETELES_UTOFIN => 'float',
		self::DKF_ELFOG_EU_ATALANY_UTOFIN => 'float',
		self::DKF_ELFOG_HAZAI_ATALANY_UTOFIN => 'float',
		self::SZALLITO_BENYUJT_EU_TETELES_ELOLEG => 'float',
		self::SZALLITO_BENYUJT_HAZAI_TETELES_ELOLEG => 'float',
		self::SZALLITO_BENYUJT_EU_ATALANY_ELOLEG => 'float',
		self::SZALLITO_BENYUJT_HAZAI_ATALANY_ELOLEG => 'float',
		self::SZALLITO_BENYUJT_EU_TETELES_UTOFIN => 'float',
		self::SZALLITO_BENYUJT_HAZAI_TETELES_UTOFIN => 'float',
		self::SZALLITO_BENYUJT_EU_ATALANY_UTOFIN => 'float',
		self::SZALLITO_BENYUJT_HAZAI_ATALANY_UTOFIN => 'float',
		self::SZALLITO_ELFOG_EU_TETELES_ELOLEG => 'float',
		self::SZALLITO_ELFOG_HAZAI_TETELES_ELOLEG => 'float',
		self::SZALLITO_ELFOG_EU_ATALANY_ELOLEG => 'float',
		self::SZALLITO_ELFOG_HAZAI_ATALANY_ELOLEG => 'float',
		self::SZALLITO_ELFOG_EU_TETELES_UTOFIN => 'float',
		self::SZALLITO_ELFOG_HAZAI_TETELES_UTOFIN => 'float',
		self::SZALLITO_ELFOG_EU_ATALANY_UTOFIN => 'float',
		self::SZALLITO_ELFOG_HAZAI_ATALANY_UTOFIN => 'float',
		self::ELSZAM_CREATED => 'datetime',
		self::ELSZAM_LASTUPD => 'datetime',
		self::ELSZAM_DEL => 'int'
	];

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, \App\Models\ElszamolasiAdatok::ELSZAM_PRJ_ID, Projekt::PRJ_ID);
	}
}
