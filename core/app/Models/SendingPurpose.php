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
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose active()
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendingPurpose whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendingPurpose extends Model
{
    use GlobalStatus;

    public function scopeActive($query)
    {
        return $query->where('status', Status::ENABLE);
    }
}
