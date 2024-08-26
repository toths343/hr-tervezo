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
	protected $table = 'pozicio_kategoria';
	protected $primaryKey = 'pozk_uid';
	public $timestamps = false;

	protected $casts = [
		'pozk_created' => 'datetime',
		'pozk_lastupd' => 'datetime',
		'pozk_del' => 'int'
	];

	public function pozicios()
	{
		return $this->hasMany(Pozicio::class, 'poz_pozk_uid');
	}
}
