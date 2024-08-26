<?php

namespace App\Models;

use App\Models\Base\AuthUser as BaseAuthUser;
use Illuminate\Contracts\Auth\Authenticatable;

class AuthUser extends BaseAuthUser implements Authenticatable
{
	protected $hidden = [
		'user_password'
	];

	protected $fillable = [
		'user_group_uid',
		'user_login',
		'user_password',
		'user_name',
		'user_creater',
		'user_modifier'
	];

    public function getAuthIdentifierName()
    {
        return $this->user_name;
    }

    public function getAuthIdentifier()
    {
        return $this->user_uid;
    }

    public function getAuthPassword()
    {
        return $this->user_password;
    }

    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }


}
