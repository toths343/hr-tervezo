<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Munkavallalo
 *
 * @property int $mkv_uid
 * @property int $mkv_id
 * @property int $mkv_nexon_szemely_id
 * @property int $mkv_nexon_jogv_id
 * @property string $mkv_nev
 * @property Carbon $mkv_hatkezd
 * @property Carbon $mkv_hatvege
 * @property Carbon $mkv_created
 * @property string $mkv_creater
 * @property string $mkv_modifier
 * @property Carbon $mkv_lastupd
 * @property int $mkv_del
 *
 * @property Collection|Pozicio[] $pozicios
 *
 * @package App\Models
 */
class Munkavallalo extends Model
{
	const MKV_UID = 'mkv_uid';
	const MKV_ID = 'mkv_id';
	const MKV_NEXON_SZEMELY_ID = 'mkv_nexon_szemely_id';
	const MKV_NEXON_JOGV_ID = 'mkv_nexon_jogv_id';
	const MKV_NEV = 'mkv_nev';
	const MKV_HATKEZD = 'mkv_hatkezd';
	const MKV_HATVEGE = 'mkv_hatvege';
	const MKV_CREATED = 'mkv_created';
	const MKV_CREATER = 'mkv_creater';
	const MKV_MODIFIER = 'mkv_modifier';
	const MKV_LASTUPD = 'mkv_lastupd';
	const MKV_DEL = 'mkv_del';
	protected $table = 'munkavallalo';
	protected $primaryKey = 'mkv_uid';
	public $timestamps = false;

	protected $casts = [
		self::MKV_UID => 'int',
		self::MKV_ID => 'int',
		self::MKV_NEXON_SZEMELY_ID => 'int',
		self::MKV_NEXON_JOGV_ID => 'int',
		self::MKV_HATKEZD => 'datetime',
		self::MKV_HATVEGE => 'datetime',
		self::MKV_CREATED => 'datetime',
		self::MKV_LASTUPD => 'datetime',
		self::MKV_DEL => 'int'
	];

	protected $fillable = [
		self::MKV_ID,
		self::MKV_NEXON_SZEMELY_ID,
		self::MKV_NEXON_JOGV_ID,
		self::MKV_NEV,
		self::MKV_HATKEZD,
		self::MKV_HATVEGE,
		self::MKV_CREATED,
		self::MKV_CREATER,
		self::MKV_MODIFIER,
		self::MKV_LASTUPD,
		self::MKV_DEL
	];

	public function pozicios(): HasMany
	{
		return $this->hasMany(Pozicio::class, Pozicio::POZ_MKV_ID, Pozicio::MKV_ID);
	}
}
