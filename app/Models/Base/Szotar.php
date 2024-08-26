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
	protected $table = 'szotar';
	protected $primaryKey = 'szo_uid';
	public $timestamps = false;

	protected $casts = [
		'szo_created' => 'datetime',
		'szo_lastupd' => 'datetime',
		'szo_del' => 'int'
	];
}
