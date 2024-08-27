<?php

namespace App\Models;

use App\Models\Base\AuthUser as BaseAuthUser;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

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

    public function getAuthIdentifierName(): string
    {
        return BaseAuthUser::USER_UID;
    }

    public function getAuthIdentifier()
    {
        return $this->attributes[$this->getAuthIdentifierName()];
    }

    public function getAuthPasswordName(): string
    {
        return BaseAuthUser::USER_PASSWORD;
    }

    public function getAuthPassword(): string
    {
        return $this->attributes[$this->getAuthPasswordName()];
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
