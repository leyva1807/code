<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $from_country
 * @property int $to_country
 * @property string $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $toCountry
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereFromCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereToCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CurrencyConversionRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CurrencyConversionRate extends Model
{
    public function toCountry()
    {
        return $this->belongsTo(Country::class, 'to_country');
    }
}
