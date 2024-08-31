<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AuthUserResource
 *
 * @property int $aures_uid
 * @property int $aures_user_uid
 * @property int $aures_res_id
 * @property string $aures_res_type
 * @property Carbon $aures_created
 * @property string $aures_creater
 * @property Carbon $aures_lastupd
 * @property string $aures_modifier
 * @property int $aures_del
 *
 * @property AuthUser $auth_user
 *
 * @package App\Models\Base
 */
class AuthUserResource extends Model
{
	const AURES_UID = 'aures_uid';
	const AURES_USER_UID = 'aures_user_uid';
	const AURES_RES_ID = 'aures_res_id';
	const AURES_RES_TYPE = 'aures_res_type';
	const AURES_CREATED = 'aures_created';
	const AURES_CREATER = 'aures_creater';
	const AURES_LASTUPD = 'aures_lastupd';
	const AURES_MODIFIER = 'aures_modifier';
	const AURES_DEL = 'aures_del';
	protected $table = 'auth_user_resource';
	protected $primaryKey = 'aures_uid';
	public $timestamps = false;

	protected $casts = [
		self::AURES_UID => 'int',
		self::AURES_USER_UID => 'int',
		self::AURES_RES_ID => 'int',
		self::AURES_CREATED => 'datetime',
		self::AURES_LASTUPD => 'datetime',
		self::AURES_DEL => 'int'
	];

	protected $fillable = [
		self::AURES_USER_UID,
		self::AURES_RES_ID,
		self::AURES_RES_TYPE,
		self::AURES_CREATED,
		self::AURES_CREATER,
		self::AURES_LASTUPD,
		self::AURES_MODIFIER,
		self::AURES_DEL
	];

	public function auth_user(): BelongsTo
	{
		return $this->belongsTo(AuthUser::class, \App\Models\AuthUserResource::AURES_USER_UID);
	}
}
