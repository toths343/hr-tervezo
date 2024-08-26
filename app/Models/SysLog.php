<?php

namespace App\Models;

use App\Models\Base\SysLog as BaseSysLog;

class SysLog extends BaseSysLog
{
	protected $fillable = [
		'log_sql_user',
		'log_user',
		'log_type',
		'log_table',
		'log_table_rec_uid',
		'log_data',
		'log_timestamp'
	];
}
