<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $country_delivery_method_id
 * @property string $fixed_charge
 * @property string $percent_charge
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge whereCountryDeliveryMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge whereFixedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge wherePercentCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeliveryCharge whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DeliveryCharge extends Model
{
}
