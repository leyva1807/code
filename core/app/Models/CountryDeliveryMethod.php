<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $country_id
 * @property int $delivery_method_id
 * @property-read \App\Models\DeliveryCharge|null $charge
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\DeliveryMethod|null $deliveryMethod
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod query()
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod whereDeliveryMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CountryDeliveryMethod whereId($value)
 * @mixin \Eloquent
 */
class CountryDeliveryMethod extends Model
{
    protected $table = 'country_delivery_method';
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function deliveryMethod()
    {
        return $this->belongsTo(DeliveryMethod::class);
    }

    public function charge()
    {
        return $this->hasOne(DeliveryCharge::class);
    }
}
