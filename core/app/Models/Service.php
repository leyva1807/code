<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $country_delivery_method_id
 * @property int $form_id
 * @property string|null $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CountryDeliveryMethod|null $countryDeliveryMethod
 * @property-read \App\Models\Form|null $form
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|Service active()
 * @method static \Illuminate\Database\Eloquent\Builder|Service inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCountryDeliveryMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereFormId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Service extends Model
{
    use GlobalStatus;

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function countryDeliveryMethod()
    {
        return $this->belongsTo(CountryDeliveryMethod::class);
    }
}
