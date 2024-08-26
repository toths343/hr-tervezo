<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroupRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'auth_role';
	protected $primaryKey = 'role_uid';
	public $timestamps = false;

	protected $casts = [
		'role_created' => 'datetime',
		'role_lastupd' => 'datetime',
		'role_del' => 'int'
	];

	public function auth_group_roles()
	{
		return $this->hasMany(AuthGroupRole::class, 'grole_role_uid');
	}
}
