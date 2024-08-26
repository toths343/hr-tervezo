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
	protected $table = 'auth_user';
	protected $primaryKey = 'user_uid';
	public $timestamps = false;

	protected $casts = [
		'user_group_uid' => 'int',
		'user_created' => 'datetime',
		'user_lastupd' => 'datetime',
		'user_del' => 'int'
	];

	public function auth_group()
	{
		return $this->belongsTo(AuthGroup::class, 'user_group_uid');
	}

	public function auth_user_resources()
	{
		return $this->hasMany(AuthUserResource::class, 'aures_user_uid');
	}
}
