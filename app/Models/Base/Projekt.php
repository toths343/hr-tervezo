<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\ElszamolasiAdatok;
use App\Models\Partner;
use App\Models\PozicioOrabonta;
use App\Models\TamogatasiEloleg;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'projekt';
	protected $primaryKey = 'prj_uid';
	public $timestamps = false;

	protected $casts = [
		'prj_id' => 'int',
		'prj_kapcs_id' => 'int',
		'prj_tamogatasi_datum' => 'datetime',
		'prj_kezdete' => 'datetime',
		'prj_vege' => 'datetime',
		'prj_tam_eu' => 'float',
		'prj_tam_hazai' => 'float',
		'prj_dkf_tam_eu' => 'float',
		'prj_dkf_tam_hazai' => 'float',
		'prj_hrterv_kezd' => 'datetime',
		'prj_hrterv_vege' => 'datetime',
		'prj_hatkezd' => 'datetime',
		'prj_hatvege' => 'datetime',
		'prj_created' => 'datetime',
		'prj_lastupd' => 'datetime',
		'prj_del' => 'int'
	];

	public function elszamolasi_adatoks()
	{
		return $this->hasMany(ElszamolasiAdatok::class, 'elszam_prj_id', 'prj_id');
	}

	public function pozicio_orabontas()
	{
		return $this->hasMany(PozicioOrabonta::class, 'pozb_prj_uid');
	}

	public function partners()
	{
		return $this->belongsToMany(Partner::class, 'projekt_partner', 'prjp_prj_id', 'prjp_par_id')
					->withPivot('prjp_uid', 'prjp_jelleg', 'prjp_del');
	}

	public function tamogatasi_elolegs()
	{
		return $this->hasMany(TamogatasiEloleg::class, 'tam_prj_id', 'prj_id');
	}
}
