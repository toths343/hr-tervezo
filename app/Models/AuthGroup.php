<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class AuthGroup
 *
 * @property int $group_uid
 * @property string $group_name
 * @property string $group_type
 * @property Carbon $group_created
 * @property string $group_creater
 * @property Carbon $group_lastupd
 * @property string $group_modifier
 * @property int $group_del
 *
 * @property Collection|AuthGroupRole[] $auth_group_roles
 * @property Collection|AuthUser[] $auth_users
 *
 * @package App\Models
 */
class AuthGroup extends Model
{
	const GROUP_UID = 'group_uid';
	const GROUP_NAME = 'group_name';
	const GROUP_TYPE = 'group_type';
	const GROUP_CREATED = 'group_created';
	const GROUP_CREATER = 'group_creater';
	const GROUP_LASTUPD = 'group_lastupd';
	const GROUP_MODIFIER = 'group_modifier';
	const GROUP_DEL = 'group_del';
	protected $table = 'auth_group';
	protected $primaryKey = 'group_uid';
	public $timestamps = false;

	protected $casts = [
		self::GROUP_UID => 'int',
		self::GROUP_CREATED => 'datetime',
		self::GROUP_LASTUPD => 'datetime',
		self::GROUP_DEL => 'int'
	];

	protected $fillable = [
		self::GROUP_NAME,
		self::GROUP_TYPE,
		self::GROUP_CREATED,
		self::GROUP_CREATER,
		self::GROUP_LASTUPD,
		self::GROUP_MODIFIER,
		self::GROUP_DEL
	];

	public function auth_group_roles(): HasMany
	{
		return $this->hasMany(AuthGroupRole::class, AuthGroupRole::GROLE_GROUP_UID);
	}

	public function auth_users(): HasMany
	{
		return $this->hasMany(AuthUser::class, AuthUser::USER_GROUP_UID);
	}
}
