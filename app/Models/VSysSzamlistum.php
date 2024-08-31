<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VSysSzamlistum
 *
 * @property int $szam
 *
 * @package App\Models
 */
class VSysSzamlistum extends Model
{
	const SZAM = 'szam';
	protected $table = 'v_sys_szamlista';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::SZAM => 'int'
	];

	protected $fillable = [
		self::SZAM
	];
}
