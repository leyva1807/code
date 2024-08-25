<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $alias
 * @property array|null $action
 * @property string|null $url
 * @property int $cron_schedule_id
 * @property string|null $next_run
 * @property string|null $last_run
 * @property int $is_running
 * @property int $is_default
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CronJobLog> $logs
 * @property-read int|null $logs_count
 * @property-read \App\Models\CronSchedule|null $schedule
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob active()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereCronScheduleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereIsRunning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereLastRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereNextRun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronJob whereUrl($value)
 * @mixin \Eloquent
 */
class CronJob extends Model
{
    use GlobalStatus;

    protected $casts = ['action' => 'array'];

    public function schedule()
    {
        return $this->belongsTo(CronSchedule::class, 'cron_schedule_id');
    }

    public function logs()
    {
        return $this->hasMany(CronJobLog::class, 'cron_job_id');
    }
}
