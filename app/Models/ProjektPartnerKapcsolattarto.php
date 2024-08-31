<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
 * @package App\Models
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

	protected $fillable = [
		self::PRJPK_JELLEG,
		self::PRJPK_KAPCS_ID,
		self::PRJPK_PRJP_UID,
		self::PRJPK_DEL
	];

	public function kapcsolattarto(): BelongsTo
	{
		return $this->belongsTo(Kapcsolattarto::class, ProjektPartnerKapcsolattarto::PRJPK_KAPCS_ID, Kapcsolattarto::KAPCS_ID);
	}

	public function projekt_partner(): BelongsTo
	{
		return $this->belongsTo(ProjektPartner::class, ProjektPartnerKapcsolattarto::PRJPK_PRJP_UID);
	}
}
