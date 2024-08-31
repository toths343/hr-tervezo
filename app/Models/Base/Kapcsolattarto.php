<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Partner;
use App\Models\ProjektPartner;
use App\Models\ProjektPartnerKapcsolattarto;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class Kapcsolattarto
 * 
 * @property int $kapcs_uid
 * @property int $kapcs_id
 * @property string $kapcs_azonosito
 * @property bool $kapcs_tipus
 * @property int $kapcs_par_id
 * @property string $kapcs_nev
 * @property string|null $kapcs_email
 * @property string|null $kapcs_tel
 * @property Carbon $kapcs_hatkezd
 * @property Carbon $kapcs_hatvege
 * @property Carbon $kapcs_created
 * @property string $kapcs_creater
 * @property Carbon $kapcs_lastupd
 * @property string $kapcs_modifier
 * @property int $kapcs_del
 * 
 * @property Partner $partner
 * @property Collection|ProjektPartner[] $projekt_partners
 *
 * @package App\Models\Base
 */
class Kapcsolattarto extends Model
{
	const KAPCS_UID = 'kapcs_uid';
	const KAPCS_ID = 'kapcs_id';
	const KAPCS_AZONOSITO = 'kapcs_azonosito';
	const KAPCS_TIPUS = 'kapcs_tipus';
	const KAPCS_PAR_ID = 'kapcs_par_id';
	const KAPCS_NEV = 'kapcs_nev';
	const KAPCS_EMAIL = 'kapcs_email';
	const KAPCS_TEL = 'kapcs_tel';
	const KAPCS_HATKEZD = 'kapcs_hatkezd';
	const KAPCS_HATVEGE = 'kapcs_hatvege';
	const KAPCS_CREATED = 'kapcs_created';
	const KAPCS_CREATER = 'kapcs_creater';
	const KAPCS_LASTUPD = 'kapcs_lastupd';
	const KAPCS_MODIFIER = 'kapcs_modifier';
	const KAPCS_DEL = 'kapcs_del';
	protected $table = 'kapcsolattarto';
	protected $primaryKey = 'kapcs_uid';
	public $timestamps = false;

	protected $casts = [
		self::KAPCS_UID => 'int',
		self::KAPCS_ID => 'int',
		self::KAPCS_TIPUS => 'bool',
		self::KAPCS_PAR_ID => 'int',
		self::KAPCS_HATKEZD => 'datetime',
		self::KAPCS_HATVEGE => 'datetime',
		self::KAPCS_CREATED => 'datetime',
		self::KAPCS_LASTUPD => 'datetime',
		self::KAPCS_DEL => 'int'
	];

	protected $fillable = [
		self::KAPCS_ID,
		self::KAPCS_AZONOSITO,
		self::KAPCS_TIPUS,
		self::KAPCS_PAR_ID,
		self::KAPCS_NEV,
		self::KAPCS_EMAIL,
		self::KAPCS_TEL,
		self::KAPCS_HATKEZD,
		self::KAPCS_HATVEGE,
		self::KAPCS_CREATED,
		self::KAPCS_CREATER,
		self::KAPCS_LASTUPD,
		self::KAPCS_MODIFIER,
		self::KAPCS_DEL
	];

	public function partner(): BelongsTo
	{
		return $this->belongsTo(Partner::class, \App\Models\Kapcsolattarto::KAPCS_PAR_ID, Partner::PAR_ID);
	}

	public function projekt_partners(): BelongsToMany
	{
		return $this->belongsToMany(ProjektPartner::class, 'projekt_partner_kapcsolattarto', ProjektPartner::PRJPK_KAPCS_ID, ProjektPartner::PRJPK_PRJP_UID)
					->withPivot(ProjektPartnerKapcsolattarto::PRJPK_UID, ProjektPartnerKapcsolattarto::PRJPK_JELLEG, ProjektPartnerKapcsolattarto::PRJPK_DEL);
	}
}
