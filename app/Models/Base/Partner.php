<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Kapcsolattarto;
use App\Models\Projekt;
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
	protected $table = 'partner';
	protected $primaryKey = 'par_uid';
	public $timestamps = false;

	protected $casts = [
		'par_id' => 'int',
		'par_hatkezd' => 'datetime',
		'par_hatvege' => 'datetime',
		'par_created' => 'datetime',
		'par_lastupd' => 'datetime',
		'par_del' => 'int'
	];

	public function kapcsolattartos()
	{
		return $this->hasMany(Kapcsolattarto::class, 'kapcs_par_id', 'par_id');
	}

	public function projekts()
	{
		return $this->belongsToMany(Projekt::class, 'projekt_partner', 'prjp_par_id', 'prjp_prj_id')
					->withPivot('prjp_uid', 'prjp_jelleg', 'prjp_del');
	}
}
