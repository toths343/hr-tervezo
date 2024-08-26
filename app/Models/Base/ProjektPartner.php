<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Kapcsolattarto;
use App\Models\Partner;
use App\Models\Projekt;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjektPartner
 * 
 * @property int $prjp_uid
 * @property string $prjp_jelleg
 * @property int $prjp_par_id
 * @property int $prjp_prj_id
 * @property int $prjp_del
 * 
 * @property Partner $partner
 * @property Projekt $projekt
 * @property Collection|Kapcsolattarto[] $kapcsolattartos
 *
 * @package App\Models\Base
 */
class ProjektPartner extends Model
{
	protected $table = 'projekt_partner';
	protected $primaryKey = 'prjp_uid';
	public $timestamps = false;

	protected $casts = [
		'prjp_par_id' => 'int',
		'prjp_prj_id' => 'int',
		'prjp_del' => 'int'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class, 'prjp_par_id', 'par_id');
	}

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, 'prjp_prj_id', 'prj_id');
	}

	public function kapcsolattartos()
	{
		return $this->belongsToMany(Kapcsolattarto::class, 'projekt_partner_kapcsolattarto', 'prjpk_prjp_uid', 'prjpk_kapcs_id')
					->withPivot('prjpk_uid', 'prjpk_jelleg', 'prjpk_del');
	}
}
