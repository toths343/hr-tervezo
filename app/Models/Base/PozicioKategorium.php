<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Pozicio;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PozicioKategorium
 * 
 * @property int $pozk_uid
 * @property string $pozk_kod
 * @property string $pozk_nev
 * @property string $pozk_tipus
 * @property string $pozk_besorolas
 * @property Carbon $pozk_created
 * @property string $pozk_creater
 * @property Carbon $pozk_lastupd
 * @property string $pozk_modifier
 * @property int $pozk_del
 * 
 * @property Collection|Pozicio[] $pozicios
 *
 * @package App\Models\Base
 */
class PozicioKategorium extends Model
{
	const POZK_UID = 'pozk_uid';
	const POZK_KOD = 'pozk_kod';
	const POZK_NEV = 'pozk_nev';
	const POZK_TIPUS = 'pozk_tipus';
	const POZK_BESOROLAS = 'pozk_besorolas';
	const POZK_CREATED = 'pozk_created';
	const POZK_CREATER = 'pozk_creater';
	const POZK_LASTUPD = 'pozk_lastupd';
	const POZK_MODIFIER = 'pozk_modifier';
	const POZK_DEL = 'pozk_del';
	protected $table = 'pozicio_kategoria';
	protected $primaryKey = 'pozk_uid';
	public $timestamps = false;

	protected $casts = [
		self::POZK_UID => 'int',
		self::POZK_CREATED => 'datetime',
		self::POZK_LASTUPD => 'datetime',
		self::POZK_DEL => 'int'
	];

	public function pozicios()
	{
		return $this->hasMany(Pozicio::class, Pozicio::POZ_POZK_UID);
	}
}
