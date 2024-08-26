<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthGroup;
use App\Models\AuthRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'auth_group_role';
	protected $primaryKey = 'grole_uid';
	public $timestamps = false;

	protected $casts = [
		'grole_group_uid' => 'int',
		'grole_role_uid' => 'int',
		'grole_created' => 'datetime',
		'grole_lastupd' => 'datetime',
		'grole_del' => 'int'
	];

	public function auth_group()
	{
		return $this->belongsTo(AuthGroup::class, 'grole_group_uid');
	}

	public function auth_role()
	{
		return $this->belongsTo(AuthRole::class, 'grole_role_uid');
	}
}
