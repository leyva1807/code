<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $country_code
 * @property string|null $dial_code
 * @property string|null $currency
 * @property string $rate
 * @property string|null $image
 * @property int $is_sending
 * @property int $is_receiving
 * @property int $has_agent
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $agent_status
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CurrencyConversionRate> $conversionRates
 * @property-read int|null $conversion_rates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CountryDeliveryMethod> $countryDeliveryMethods
 * @property-read int|null $country_delivery_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $countryServices
 * @property-read int|null $country_services_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeliveryCharge> $deliveryCharges
 * @property-read int|null $delivery_charges_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeliveryMethod> $deliveryMethods
 * @property-read int|null $delivery_methods_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SendMoney> $receivingTransfers
 * @property-read int|null $receiving_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SendMoney> $sendingTransfers
 * @property-read int|null $sending_transfers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Service> $services
 * @property-read int|null $services_count
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|Country active()
 * @method static \Illuminate\Database\Eloquent\Builder|Country hasAgent()
 * @method static \Illuminate\Database\Eloquent\Builder|Country inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country receivableCountries()
 * @method static \Illuminate\Database\Eloquent\Builder|Country receiving()
 * @method static \Illuminate\Database\Eloquent\Builder|Country sending()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereHasAgent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsReceiving($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereIsSending($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
    use  GlobalStatus;

    public function countryServices()
    {
        return $this->hasMany(Service::class);
    }

    public function conversionRates()
    {
        return $this->hasMany(CurrencyConversionRate::class, 'from_country', 'id');
    }

    public function services()
    {
        return $this->hasManyThrough(Service::class, CountryDeliveryMethod::class);
    }

    public function sendingTransfers()
    {
        return $this->hasMany(SendMoney::class, 'sending_country_id');
    }

    public function receivingTransfers()
    {
        return $this->hasMany(SendMoney::class, 'recipient_country_id');
    }

    public function deliveryCharges()
    {
        return $this->hasMany(DeliveryCharge::class);
    }

    public function deliveryMethods()
    {
        return $this->belongsToMany(DeliveryMethod::class, 'country_delivery_method', 'country_id', 'delivery_method_id');
    }

    public function countryDeliveryMethods()
    {
        return $this->hasMany(CountryDeliveryMethod::class);
    }

    public function agentStatus(): Attribute
    {
        return new Attribute(
            function () {
                if ($this->has_agent) {
                    $class = 'success';
                    $text = 'Yes';
                } else {
                    $class = 'danger';
                    $text = 'No';
                }

                $html = '<span class="badge badge--' . $class . '">' . trans($text) . '</span>';

                return $html;
            }
        );
    }

    public function scopeSending($query)
    {
        $query->where('is_sending', Status::YES);
    }

    public function scopeReceiving($query)
    {
        $query->where('is_receiving', Status::YES);
    }

    public function scopeHasAgent($query)
    {
        $query->where('has_agent', Status::YES);
    }

    public function scopeReceivableCountries($query)
    {
        $query->active()->receiving()
            ->with([
                'countryDeliveryMethods.deliveryMethod' => function ($query) {
                    $query->select('id', 'name')->active();
                },
                'countryDeliveryMethods.charge:country_delivery_method_id,fixed_charge,percent_charge'
            ])
            ->where(function ($query) {
                $query->whereHas('countryDeliveryMethods.deliveryMethod', function ($deliveryMethod) {
                    $deliveryMethod->active();
                })
                    ->orWhere(function ($query) {
                        if (gs()->agent_module) {
                            $query->hasAgent();
                        }
                    });
            });
    }
}
