<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property int $interval
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule active()
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule query()
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CronSchedule whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CronSchedule extends Model
{
    use GlobalStatus;

    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
}
