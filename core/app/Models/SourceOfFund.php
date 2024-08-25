<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund active()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund query()
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SourceOfFund whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SourceOfFund extends Model
{
    use GlobalStatus;

    public function scopeActive($query)
    {
        return $query->where('status', Status::ENABLE);
    }
}
