<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VNexonPozicio
 * 
 * @property string $npoz_uid
 * @property int $npoz_nexon_szemely_id
 * @property string $npoz_nev
 * @property int $npoz_aktiv
 * @property string|null $npoz_szervezet
 * @property Carbon $npoz_hatkezd
 * @property Carbon $npoz_hatvege
 *
 * @package App\Models\Base
 */
class VNexonPozicio extends Model
{
	protected $table = 'v_nexon_pozicio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'npoz_nexon_szemely_id' => 'int',
		'npoz_aktiv' => 'int',
		'npoz_hatkezd' => 'datetime',
		'npoz_hatvege' => 'datetime'
	];
}
