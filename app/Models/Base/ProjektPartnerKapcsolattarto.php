<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Kapcsolattarto;
use App\Models\ProjektPartner;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProjektPartnerKapcsolattarto
 * 
 * @property int $prjpk_uid
 * @property string $prjpk_jelleg
 * @property int $prjpk_kapcs_id
 * @property int $prjpk_prjp_uid
 * @property int $prjpk_del
 * 
 * @property Kapcsolattarto $kapcsolattarto
 * @property ProjektPartner $projekt_partner
 *
 * @package App\Models\Base
 */
class ProjektPartnerKapcsolattarto extends Model
{
	const PRJPK_UID = 'prjpk_uid';
	const PRJPK_JELLEG = 'prjpk_jelleg';
	const PRJPK_KAPCS_ID = 'prjpk_kapcs_id';
	const PRJPK_PRJP_UID = 'prjpk_prjp_uid';
	const PRJPK_DEL = 'prjpk_del';
	protected $table = 'projekt_partner_kapcsolattarto';
	protected $primaryKey = 'prjpk_uid';
	public $timestamps = false;

	protected $casts = [
		self::PRJPK_UID => 'int',
		self::PRJPK_KAPCS_ID => 'int',
		self::PRJPK_PRJP_UID => 'int',
		self::PRJPK_DEL => 'int'
	];

	public function kapcsolattarto()
	{
		return $this->belongsTo(Kapcsolattarto::class, \App\Models\ProjektPartnerKapcsolattarto::PRJPK_KAPCS_ID, Kapcsolattarto::KAPCS_ID);
	}

	public function projekt_partner()
	{
		return $this->belongsTo(ProjektPartner::class, \App\Models\ProjektPartnerKapcsolattarto::PRJPK_PRJP_UID);
	}
}
