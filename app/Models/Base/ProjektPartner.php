<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Kapcsolattarto;
use App\Models\Partner;
use App\Models\Projekt;
use App\Models\ProjektPartnerKapcsolattarto;
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
	const PRJP_UID = 'prjp_uid';
	const PRJP_JELLEG = 'prjp_jelleg';
	const PRJP_PAR_ID = 'prjp_par_id';
	const PRJP_PRJ_ID = 'prjp_prj_id';
	const PRJP_DEL = 'prjp_del';
	protected $table = 'projekt_partner';
	protected $primaryKey = 'prjp_uid';
	public $timestamps = false;

	protected $casts = [
		self::PRJP_UID => 'int',
		self::PRJP_PAR_ID => 'int',
		self::PRJP_PRJ_ID => 'int',
		self::PRJP_DEL => 'int'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class, \App\Models\ProjektPartner::PRJP_PAR_ID, Partner::PAR_ID);
	}

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, \App\Models\ProjektPartner::PRJP_PRJ_ID, Projekt::PRJ_ID);
	}

	public function kapcsolattartos()
	{
		return $this->belongsToMany(Kapcsolattarto::class, 'projekt_partner_kapcsolattarto', Kapcsolattarto::PRJPK_PRJP_UID, Kapcsolattarto::PRJPK_KAPCS_ID)
					->withPivot(ProjektPartnerKapcsolattarto::PRJPK_UID, ProjektPartnerKapcsolattarto::PRJPK_JELLEG, ProjektPartnerKapcsolattarto::PRJPK_DEL);
	}
}
