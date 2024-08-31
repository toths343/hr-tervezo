<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroupRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class AuthRole
 * 
 * @property int $role_uid
 * @property string $role_label
 * @property string $role_name
 * @property string $role_description
 * @property Carbon $role_created
 * @property string $role_creater
 * @property Carbon $role_lastupd
 * @property string $role_modifier
 * @property int $role_del
 * 
 * @property Collection|AuthGroupRole[] $auth_group_roles
 *
 * @package App\Models\Base
 */
class AuthRole extends Model
{
	const ROLE_UID = 'role_uid';
	const ROLE_LABEL = 'role_label';
	const ROLE_NAME = 'role_name';
	const ROLE_DESCRIPTION = 'role_description';
	const ROLE_CREATED = 'role_created';
	const ROLE_CREATER = 'role_creater';
	const ROLE_LASTUPD = 'role_lastupd';
	const ROLE_MODIFIER = 'role_modifier';
	const ROLE_DEL = 'role_del';
	protected $table = 'auth_role';
	protected $primaryKey = 'role_uid';
	public $timestamps = false;

	protected $casts = [
		self::ROLE_UID => 'int',
		self::ROLE_CREATED => 'datetime',
		self::ROLE_LASTUPD => 'datetime',
		self::ROLE_DEL => 'int'
	];

	protected $fillable = [
		self::ROLE_LABEL,
		self::ROLE_NAME,
		self::ROLE_DESCRIPTION,
		self::ROLE_CREATED,
		self::ROLE_CREATER,
		self::ROLE_LASTUPD,
		self::ROLE_MODIFIER,
		self::ROLE_DEL
	];

	public function auth_group_roles(): HasMany
	{
		return $this->hasMany(AuthGroupRole::class, AuthGroupRole::GROLE_ROLE_UID);
	}
}
