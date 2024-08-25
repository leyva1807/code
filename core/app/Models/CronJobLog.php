<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $cron_job_id
 * @property string|null $start_at
 * @property string|null $end_at
 * @property int $duration
 * @property string|null $error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereCronJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereEndAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereStartAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJobLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CronJobLog extends Model
{
}
