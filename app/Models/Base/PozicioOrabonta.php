<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Pozicio;
use App\Models\Projekt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PozicioOrabonta
 * 
 * @property int $pozb_uid
 * @property int $pozb_poz_uid
 * @property int $pozb_prj_uid
 * @property int $pozb_ev
 * @property int $pozb_honap
 * @property float $pozb_ora
 * @property Carbon $pozb_kezd
 * @property Carbon $pozb_vege
 * @property Carbon $pozb_created
 * @property string $pozb_creater
 * @property Carbon $pozb_lastupd
 * @property string $pozb_modifier
 * @property int $pozb_del
 * 
 * @property Pozicio $pozicio
 * @property Projekt $projekt
 *
 * @package App\Models\Base
 */
class PozicioOrabonta extends Model
{
	protected $table = 'pozicio_orabontas';
	protected $primaryKey = 'pozb_uid';
	public $timestamps = false;

	protected $casts = [
		'pozb_poz_uid' => 'int',
		'pozb_prj_uid' => 'int',
		'pozb_ev' => 'int',
		'pozb_honap' => 'int',
		'pozb_ora' => 'float',
		'pozb_kezd' => 'datetime',
		'pozb_vege' => 'datetime',
		'pozb_created' => 'datetime',
		'pozb_lastupd' => 'datetime',
		'pozb_del' => 'int'
	];

	public function pozicio()
	{
		return $this->belongsTo(Pozicio::class, 'pozb_poz_uid');
	}

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, 'pozb_prj_uid');
	}
}
