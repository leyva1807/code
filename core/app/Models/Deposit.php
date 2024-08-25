<?php

namespace App\Models;

use Carbon\Carbon;
use App\Constants\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $agent_id
 * @property int $send_money_id
 * @property int $method_code
 * @property string $amount
 * @property string|null $method_currency
 * @property string $charge
 * @property string $rate
 * @property string $final_amount
 * @property object|null $detail
 * @property string|null $btc_amount
 * @property string|null $btc_wallet
 * @property string|null $trx
 * @property int $payment_try
 * @property int $status 1=>success, 2=>pending, 3=>cancel
 * @property int $from_api
 * @property string|null $admin_feedback
 * @property string|null $success_url
 * @property string|null $failed_url
 * @property int|null $last_cron
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \App\Models\Gateway|null $gateway
 * @property-read \App\Models\SendMoney|null $sendMoney
 * @property-read mixed $status_badge
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit agentDeposit()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit approved()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit filterAgent()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit filterByDay($day = 7)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit filterUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit initiated()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit payment()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit pending()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit rejected()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit successful()
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAdminFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBtcAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereBtcWallet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereFailedUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereFinalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereFromApi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereLastCron($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereMethodCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereMethodCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit wherePaymentTry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereSendMoneyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereSuccessUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereTrx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deposit whereUserId($value)
 * @mixin \Eloquent
 */
class Deposit extends Model
{
    protected $casts = [
        'detail' => 'object'
    ];

    protected $hidden = ['detail'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function gateway()
    {
        return $this->belongsTo(Gateway::class, 'method_code', 'code');
    }

    public function sendMoney()
    {
        return $this->belongsTo(SendMoney::class);
    }

    public function methodName()
    {
        if ($this->method_code < 5000) {
            $methodName = @$this->gatewayCurrency()->name;
        } else {
            $methodName = 'Google Pay';
        }
        return $methodName;
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::PAYMENT_PENDING) {
                $html = '<span class="badge badge--warning">' . trans('Pending') . '</span>';
            } elseif ($this->status == Status::PAYMENT_SUCCESS && $this->method_code >= 1000 && $this->method_code <= 5000) {
                $html = '<span><span class="badge badge--success">' . trans('Approved') . '</span><br>' . diffForHumans($this->updated_at) . '</span>';
            } elseif ($this->status == Status::PAYMENT_SUCCESS && ($this->method_code < 1000 || $this->method_code >= 5000)) {
                $html = '<span class="badge badge--success">' . trans('Succeed') . '</span>';
            } elseif ($this->status == Status::PAYMENT_REJECT) {
                $html = '<span><span class="badge badge--danger">' . trans('Rejected') . '</span><br>' . diffForHumans($this->updated_at) . '</span>';
            } else {
                $html = '<span class="badge badge--dark">' . trans('Initiated') . '</span>';
            }
            return $html;
        });
    }

    // scope
    public function gatewayCurrency()
    {
        return GatewayCurrency::where('method_code', $this->method_code)->where('currency', $this->method_currency)->first();
    }

    public function baseCurrency()
    {
        return @$this->gateway->crypto == Status::ENABLE ? 'USD' : $this->method_currency;
    }

    public function scopePending($query)
    {
        return $query->where('method_code', '>=', 1000)->where('status', Status::PAYMENT_PENDING);
    }

    public function scopeRejected($query)
    {
        return $query->where('method_code', '>=', 1000)->where('status', Status::PAYMENT_REJECT);
    }

    public function scopeApproved($query)
    {
        return $query->where('method_code', '>=', 1000)->where('method_code', '<', 5000)->where('status', Status::PAYMENT_SUCCESS);
    }

    public function scopeSuccessful($query)
    {
        return $query->where('status', Status::PAYMENT_SUCCESS);
    }

    public function scopeInitiated($query)
    {
        return $query->where('status', Status::PAYMENT_INITIATE);
    }

    public function scopePayment($query)
    {
        return $query->where('user_id', '!=', 0);
    }

    public function scopeAgentDeposit($query)
    {
        return $query->where('agent_id', '!=', 0);
    }

    public function scopeFilterAgent($query)
    {
        return $query->where('agent_id', @auth()->guard('agent')->id());
    }

    public function scopeFilterUser($query)
    {
        return $query->where('user_id', @auth()->id());
    }

    public function scopeFilterByDay($query, $day = 7)
    {
        return $query->whereDate('created_at', '>=', Carbon::now()->subDays($day));
    }
}
