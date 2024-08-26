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
 * @package App\Models\Base
 */
class Munkavallalo extends Model
{
	protected $table = 'munkavallalo';
	protected $primaryKey = 'mkv_uid';
	public $timestamps = false;

	protected $casts = [
		'mkv_id' => 'int',
		'mkv_nexon_szemely_id' => 'int',
		'mkv_nexon_jogv_id' => 'int',
		'mkv_hatkezd' => 'datetime',
		'mkv_hatvege' => 'datetime',
		'mkv_created' => 'datetime',
		'mkv_lastupd' => 'datetime',
		'mkv_del' => 'int'
	];

	public function pozicios()
	{
		return $this->hasMany(Pozicio::class, 'poz_mkv_id', 'mkv_id');
	}
}
