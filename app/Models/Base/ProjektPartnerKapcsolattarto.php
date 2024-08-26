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
	protected $table = 'projekt_partner_kapcsolattarto';
	protected $primaryKey = 'prjpk_uid';
	public $timestamps = false;

	protected $casts = [
		'prjpk_kapcs_id' => 'int',
		'prjpk_prjp_uid' => 'int',
		'prjpk_del' => 'int'
	];

	public function kapcsolattarto()
	{
		return $this->belongsTo(Kapcsolattarto::class, 'prjpk_kapcs_id', 'kapcs_id');
	}

	public function projekt_partner()
	{
		return $this->belongsTo(ProjektPartner::class, 'prjpk_prjp_uid');
	}
}
