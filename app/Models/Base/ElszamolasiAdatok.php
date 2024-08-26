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
	protected $table = 'elszamolasi_adatok';
	protected $primaryKey = 'elszam_uid';
	public $timestamps = false;

	protected $casts = [
		'elszam_prj_id' => 'int',
		'elszam_benyujt_date' => 'datetime',
		'elszam_zaras_date' => 'datetime',
		'dkf_benyujt_eu_teteles_eloleg' => 'float',
		'dkf_benyujt_hazai_teteles_eloleg' => 'float',
		'dkf_benyujt_eu_atalany_eloleg' => 'float',
		'dkf_benyujt_hazai_atalany_eloleg' => 'float',
		'dkf_benyujt_eu_teteles_utofin' => 'float',
		'dkf_benyujt_hazai_teteles_utofin' => 'float',
		'dkf_benyujt_eu_atalany_utofin' => 'float',
		'dkf_benyujt_hazai_atalany_utofin' => 'float',
		'dkf_elfog_eu_teteles_eloleg' => 'float',
		'dkf_elfog_hazai_teteles_eloleg' => 'float',
		'dkf_elfog_eu_atalany_eloleg' => 'float',
		'dkf_elfog_hazai_atalany_eloleg' => 'float',
		'dkf_elfog_eu_teteles_utofin' => 'float',
		'dkf_elfog_hazai_teteles_utofin' => 'float',
		'dkf_elfog_eu_atalany_utofin' => 'float',
		'dkf_elfog_hazai_atalany_utofin' => 'float',
		'szallito_benyujt_eu_teteles_eloleg' => 'float',
		'szallito_benyujt_hazai_teteles_eloleg' => 'float',
		'szallito_benyujt_eu_atalany_eloleg' => 'float',
		'szallito_benyujt_hazai_atalany_eloleg' => 'float',
		'szallito_benyujt_eu_teteles_utofin' => 'float',
		'szallito_benyujt_hazai_teteles_utofin' => 'float',
		'szallito_benyujt_eu_atalany_utofin' => 'float',
		'szallito_benyujt_hazai_atalany_utofin' => 'float',
		'szallito_elfog_eu_teteles_eloleg' => 'float',
		'szallito_elfog_hazai_teteles_eloleg' => 'float',
		'szallito_elfog_eu_atalany_eloleg' => 'float',
		'szallito_elfog_hazai_atalany_eloleg' => 'float',
		'szallito_elfog_eu_teteles_utofin' => 'float',
		'szallito_elfog_hazai_teteles_utofin' => 'float',
		'szallito_elfog_eu_atalany_utofin' => 'float',
		'szallito_elfog_hazai_atalany_utofin' => 'float',
		'elszam_created' => 'datetime',
		'elszam_lastupd' => 'datetime',
		'elszam_del' => 'int'
	];

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, 'elszam_prj_id', 'prj_id');
	}
}
