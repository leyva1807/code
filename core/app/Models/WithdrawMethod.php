<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $form_id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $min_limit
 * @property string $max_limit
 * @property string|null $fixed_charge
 * @property string|null $rate
 * @property string|null $percent_charge
 * @property string|null $currency
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Form|null $form
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod active()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereFixedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereMaxLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereMinLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod wherePercentCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WithdrawMethod whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WithdrawMethod extends Model
{
    use GlobalStatus;

    protected $casts = [
        'user_data' => 'object',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
