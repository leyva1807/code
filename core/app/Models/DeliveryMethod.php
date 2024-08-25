<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod active()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryMethod extends Model
{
    use GlobalStatus;
}
