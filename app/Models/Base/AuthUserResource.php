<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuthUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
	protected $table = 'auth_user_resource';
	protected $primaryKey = 'aures_uid';
	public $timestamps = false;

	protected $casts = [
		'aures_user_uid' => 'int',
		'aures_res_id' => 'int',
		'aures_created' => 'datetime',
		'aures_lastupd' => 'datetime',
		'aures_del' => 'int'
	];

	public function auth_user()
	{
		return $this->belongsTo(AuthUser::class, 'aures_user_uid');
	}
}
