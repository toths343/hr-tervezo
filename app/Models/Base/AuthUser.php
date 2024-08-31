<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroup;
use App\Models\AuthUserResource;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class AuthUser
 *
 * @property int $user_uid
 * @property int $user_group_uid
 * @property string $user_login
 * @property string $user_password
 * @property string $user_name
 * @property Carbon $user_created
 * @property string $user_creater
 * @property Carbon $user_lastupd
 * @property string $user_modifier
 * @property int $user_del
 *
 * @property AuthGroup $auth_group
 * @property Collection|AuthUserResource[] $auth_user_resources
 *
 * @package App\Models\Base
 */
class AuthUser extends Model
{
	const USER_UID = 'user_uid';
	const USER_GROUP_UID = 'user_group_uid';
	const USER_LOGIN = 'user_login';
	const USER_PASSWORD = 'user_password';
	const USER_NAME = 'user_name';
	const USER_CREATED = 'user_created';
	const USER_CREATER = 'user_creater';
	const USER_LASTUPD = 'user_lastupd';
	const USER_MODIFIER = 'user_modifier';
	const USER_DEL = 'user_del';
	protected $table = 'auth_user';
	protected $primaryKey = 'user_uid';
	public $timestamps = false;

	protected $casts = [
		self::USER_UID => 'int',
		self::USER_GROUP_UID => 'int',
		self::USER_CREATED => 'datetime',
		self::USER_LASTUPD => 'datetime',
		self::USER_DEL => 'int'
	];

	protected $fillable = [
		self::USER_GROUP_UID,
		self::USER_LOGIN,
		self::USER_PASSWORD,
		self::USER_NAME,
		self::USER_CREATED,
		self::USER_CREATER,
		self::USER_LASTUPD,
		self::USER_MODIFIER,
		self::USER_DEL
	];

	public function auth_group(): BelongsTo
	{
		return $this->belongsTo(AuthGroup::class, \App\Models\AuthUser::USER_GROUP_UID);
	}

	public function auth_user_resources(): HasMany
	{
		return $this->hasMany(AuthUserResource::class, AuthUserResource::AURES_USER_UID);
	}
}
