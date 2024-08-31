<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroup;
use App\Models\AuthRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AuthGroupRole
 * 
 * @property int $grole_uid
 * @property int $grole_group_uid
 * @property int $grole_role_uid
 * @property Carbon $grole_created
 * @property string $grole_creater
 * @property Carbon $grole_lastupd
 * @property string $grole_modifier
 * @property int $grole_del
 * 
 * @property AuthGroup $auth_group
 * @property AuthRole $auth_role
 *
 * @package App\Models\Base
 */
class AuthGroupRole extends Model
{
	const GROLE_UID = 'grole_uid';
	const GROLE_GROUP_UID = 'grole_group_uid';
	const GROLE_ROLE_UID = 'grole_role_uid';
	const GROLE_CREATED = 'grole_created';
	const GROLE_CREATER = 'grole_creater';
	const GROLE_LASTUPD = 'grole_lastupd';
	const GROLE_MODIFIER = 'grole_modifier';
	const GROLE_DEL = 'grole_del';
	protected $table = 'auth_group_role';
	protected $primaryKey = 'grole_uid';
	public $timestamps = false;

	protected $casts = [
		self::GROLE_UID => 'int',
		self::GROLE_GROUP_UID => 'int',
		self::GROLE_ROLE_UID => 'int',
		self::GROLE_CREATED => 'datetime',
		self::GROLE_LASTUPD => 'datetime',
		self::GROLE_DEL => 'int'
	];

	protected $fillable = [
		self::GROLE_GROUP_UID,
		self::GROLE_ROLE_UID,
		self::GROLE_CREATED,
		self::GROLE_CREATER,
		self::GROLE_LASTUPD,
		self::GROLE_MODIFIER,
		self::GROLE_DEL
	];

	public function auth_group(): BelongsTo
	{
		return $this->belongsTo(AuthGroup::class, \App\Models\AuthGroupRole::GROLE_GROUP_UID);
	}

	public function auth_role(): BelongsTo
	{
		return $this->belongsTo(AuthRole::class, \App\Models\AuthGroupRole::GROLE_ROLE_UID);
	}
}
