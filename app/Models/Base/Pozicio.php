<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Munkavallalo;
use App\Models\PozicioKategorium;
use App\Models\PozicioOrabonta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pozicio
 * 
 * @property int $poz_uid
 * @property int $poz_mkv_id
 * @property int|null $poz_pozk_uid
 * @property string $poz_nev
 * @property string|null $poz_szervezet
 * @property int|null $poz_aktiv
 * @property Carbon $poz_hatkezd
 * @property Carbon $poz_hatvege
 * @property Carbon $poz_created
 * @property string $poz_creater
 * @property Carbon $poz_lastupd
 * @property string $poz_modifier
 * @property int $poz_del
 * 
 * @property Munkavallalo $munkavallalo
 * @property PozicioKategorium|null $pozicio_kategorium
 * @property Collection|PozicioOrabonta[] $pozicio_orabontas
 *
 * @package App\Models\Base
 */
class Pozicio extends Model
{
	protected $table = 'pozicio';
	protected $primaryKey = 'poz_uid';
	public $timestamps = false;

	protected $casts = [
		'poz_mkv_id' => 'int',
		'poz_pozk_uid' => 'int',
		'poz_aktiv' => 'int',
		'poz_hatkezd' => 'datetime',
		'poz_hatvege' => 'datetime',
		'poz_created' => 'datetime',
		'poz_lastupd' => 'datetime',
		'poz_del' => 'int'
	];

	public function munkavallalo()
	{
		return $this->belongsTo(Munkavallalo::class, 'poz_mkv_id', 'mkv_id');
	}

	public function pozicio_kategorium()
	{
		return $this->belongsTo(PozicioKategorium::class, 'poz_pozk_uid');
	}

	public function pozicio_orabontas()
	{
		return $this->hasMany(PozicioOrabonta::class, 'pozb_poz_uid');
	}
}
