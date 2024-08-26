<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysLog
 * 
 * @property int $log_id
 * @property string $log_sql_user
 * @property string|null $log_user
 * @property string $log_type
 * @property string $log_table
 * @property int $log_table_rec_uid
 * @property string $log_data
 * @property Carbon $log_timestamp
 *
 * @package App\Models\Base
 */
class SysLog extends Model
{
	protected $table = 'sys_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		'log_table_rec_uid' => 'int',
		'log_timestamp' => 'datetime'
	];
}
