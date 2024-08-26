<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VSysSzamlistum
 * 
 * @property int $szam
 *
 * @package App\Models\Base
 */
class VSysSzamlistum extends Model
{
	protected $table = 'v_sys_szamlista';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'szam' => 'int'
	];
}
