<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Szotar
 * 
 * @property int $szo_uid
 * @property string $szo_tipus
 * @property string $szo_rnev
 * @property string $szo_hnev
 * @property Carbon $szo_created
 * @property string $szo_creater
 * @property Carbon $szo_lastupd
 * @property string $szo_modifier
 * @property int $szo_del
 *
 * @package App\Models\Base
 */
class Szotar extends Model
{
	const SZO_UID = 'szo_uid';
	const SZO_TIPUS = 'szo_tipus';
	const SZO_RNEV = 'szo_rnev';
	const SZO_HNEV = 'szo_hnev';
	const SZO_CREATED = 'szo_created';
	const SZO_CREATER = 'szo_creater';
	const SZO_LASTUPD = 'szo_lastupd';
	const SZO_MODIFIER = 'szo_modifier';
	const SZO_DEL = 'szo_del';
	protected $table = 'szotar';
	protected $primaryKey = 'szo_uid';
	public $timestamps = false;

	protected $casts = [
		self::SZO_UID => 'int',
		self::SZO_CREATED => 'datetime',
		self::SZO_LASTUPD => 'datetime',
		self::SZO_DEL => 'int'
	];

	protected $fillable = [
		self::SZO_TIPUS,
		self::SZO_RNEV,
		self::SZO_HNEV,
		self::SZO_CREATED,
		self::SZO_CREATER,
		self::SZO_LASTUPD,
		self::SZO_MODIFIER,
		self::SZO_DEL
	];
}
