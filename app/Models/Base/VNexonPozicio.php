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
	const NPOZ_UID = 'npoz_uid';
	const NPOZ_NEXON_SZEMELY_ID = 'npoz_nexon_szemely_id';
	const NPOZ_NEV = 'npoz_nev';
	const NPOZ_AKTIV = 'npoz_aktiv';
	const NPOZ_SZERVEZET = 'npoz_szervezet';
	const NPOZ_HATKEZD = 'npoz_hatkezd';
	const NPOZ_HATVEGE = 'npoz_hatvege';
	protected $table = 'v_nexon_pozicio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::NPOZ_NEXON_SZEMELY_ID => 'int',
		self::NPOZ_AKTIV => 'int',
		self::NPOZ_HATKEZD => 'datetime',
		self::NPOZ_HATVEGE => 'datetime'
	];
}
