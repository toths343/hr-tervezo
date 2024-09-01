<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Szotar
 * 
 * @property int $szo_uid
 * @property string $szo_tipus
 * @property string $szo_rnev
 * @property string $szo_hnev
 * @property Carbon $created_at
 * @property string $creater
 * @property Carbon $updated_at
 * @property string $modifier
 * @property string|null $del
 *
 * @package App\Models\Base
 */
class Szotar extends Model
{
	use SoftDeletes;
	const DELETED_AT = 'del';
	const SZO_UID = 'szo_uid';
	const SZO_TIPUS = 'szo_tipus';
	const SZO_RNEV = 'szo_rnev';
	const SZO_HNEV = 'szo_hnev';
	const CREATED_AT = 'created_at';
	const CREATER = 'creater';
	const UPDATED_AT = 'updated_at';
	const MODIFIER = 'modifier';
	protected $table = 'szotar';
	protected $primaryKey = 'szo_uid';

	protected $casts = [
		self::SZO_UID => 'int',
		self::CREATED_AT => 'datetime',
		self::UPDATED_AT => 'datetime'
	];

	protected $fillable = [
		self::SZO_TIPUS,
		self::SZO_RNEV,
		self::SZO_HNEV,
		self::CREATER,
		self::MODIFIER
	];
}
