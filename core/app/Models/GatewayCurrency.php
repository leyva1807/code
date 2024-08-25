<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $currency
 * @property string|null $symbol
 * @property int|null $method_code
 * @property string|null $gateway_alias
 * @property string $min_amount
 * @property string $max_amount
 * @property string $percent_charge
 * @property string $fixed_charge
 * @property string $rate
 * @property string|null $gateway_parameter
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Gateway|null $method
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency baseCurrency()
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency baseSymbol()
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency query()
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereFixedCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereGatewayAlias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereGatewayParameter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereMaxAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereMethodCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereMinAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency wherePercentCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GatewayCurrency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GatewayCurrency extends Model
{

    protected $hidden = [
        'gateway_parameter'
    ];

    protected $casts = ['status' => 'boolean'];

    // Relation
    public function method()
    {
        return $this->belongsTo(Gateway::class, 'method_code', 'code');
    }

    public function currencyIdentifier()
    {
        return $this->name ?? $this->method->name . ' ' . $this->currency;
    }

    public function scopeBaseCurrency()
    {
        return $this->method->crypto == Status::ENABLE ? 'USD' : $this->currency;
    }

    public function scopeBaseSymbol()
    {
        return $this->method->crypto == Status::ENABLE ? '$' : $this->symbol;
    }
}
