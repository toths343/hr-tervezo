<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroupRole;
use App\Models\AuthUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
 * @package App\Models\Base
 */
class AuthGroup extends Model
{
	protected $table = 'auth_group';
	protected $primaryKey = 'group_uid';
	public $timestamps = false;

	protected $casts = [
		'group_created' => 'datetime',
		'group_lastupd' => 'datetime',
		'group_del' => 'int'
	];

	public function auth_group_roles()
	{
		return $this->hasMany(AuthGroupRole::class, 'grole_group_uid');
	}

	public function auth_users()
	{
		return $this->hasMany(AuthUser::class, 'user_group_uid');
	}
}
