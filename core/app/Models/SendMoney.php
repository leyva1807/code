<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $mtcn_number
 * @property string|null $trx
 * @property int $country_delivery_method_id receiver country delivery method
 * @property int $service_id receiver country service
 * @property int $user_id
 * @property int $agent_id
 * @property object|null $service_form_data receiver country service form
 * @property string $base_currency_amount
 * @property string $base_currency_charge
 * @property int $sending_country_id
 * @property string|null $sending_currency
 * @property string $sending_amount
 * @property string $sending_charge
 * @property int $recipient_country_id
 * @property string|null $recipient_currency
 * @property string $recipient_amount
 * @property string $conversion_rate
 * @property string $base_currency_rate
 * @property object|null $sender
 * @property object|null $recipient
 * @property int $source_of_fund_id
 * @property int $sending_purpose_id
 * @property string|null $verification_code
 * @property string $verification_time
 * @property int|null $payout_by
 * @property int $payment_status 0 = initiated; 1 = success; 2 = pending; 3 = rejected
 * @property int $status 0 = initiated, 1 = completed, 2 = pending, 3 = refunded
 * @property string|null $admin_feedback
 * @property \Illuminate\Support\Carbon|null $received_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \App\Models\CountryDeliveryMethod|null $countryDeliveryMethod
 * @property-read \App\Models\Deposit|null $deposit
 * @property-read mixed $sender_info
 * @property-read mixed $payment_status_badge
 * @property-read \App\Models\Agent|null $payoutBy
 * @property-read \App\Models\Country|null $recipientCountry
 * @property-read \App\Models\Country|null $sendingCountry
 * @property-read \App\Models\SendingPurpose|null $sendingPurpose
 * @property-read \App\Models\Service|null $service
 * @property-read \App\Models\SourceOfFund|null $sourceOfFund
 * @property-read mixed $status_badge
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney completed()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney filterAgent()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney filterByDay($day = 7)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney filterUser()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney initiated()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney paymentPending()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney paymentRejected()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney pending()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney refunded()
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereAdminFeedback($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereBaseCurrencyAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereBaseCurrencyCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereBaseCurrencyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereConversionRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereCountryDeliveryMethodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereMtcnNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney wherePayoutBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereReceivedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereRecipient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereRecipientAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereRecipientCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereRecipientCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSendingAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSendingCharge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSendingCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSendingCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSendingPurposeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereServiceFormData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereSourceOfFundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereTrx($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereVerificationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendMoney whereVerificationTime($value)
 * @mixin \Eloquent
 */
class SendMoney extends Model
{
    protected $casts = [
        'sender'            => 'object',
        'recipient'         => 'object',
        'service_form_data' => 'object',
        'received_at'       => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function sendingCountry()
    {
        return $this->belongsTo(Country::class, 'sending_country_id');
    }

    public function recipientCountry()
    {
        return $this->belongsTo(Country::class, 'recipient_country_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function countryDeliveryMethod()
    {
        return $this->belongsTo(CountryDeliveryMethod::class);
    }

    public function deposit()
    {
        return $this->hasOne(Deposit::class);
    }

    public function payoutBy()
    {
        return $this->hasOne(Agent::class, 'id', 'payout_by');
    }

    public function sourceOfFund()
    {
        return $this->belongsTo(SourceOfFund::class);
    }

    public function sendingPurpose()
    {
        return $this->belongsTo(SendingPurpose::class);
    }

    public function scopeInitiated($query)
    {
        return $query->where('status', Status::SEND_MONEY_INITIATED);
    }

    public function scopePending($query)
    {
        return $query->where('status', Status::SEND_MONEY_PENDING);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', Status::SEND_MONEY_COMPLETED);
    }

    public function scopeRefunded($query)
    {
        return $query->where('status', Status::SEND_MONEY_REFUNDED);
    }

    public function scopePaymentPending($query)
    {
        return $query->where('payment_status', Status::PAYMENT_PENDING);
    }

    public function scopePaymentRejected($query)
    {
        return $query->where('payment_status', Status::PAYMENT_REJECT);
    }

    public function scopeFilterAgent($query)
    {
        return $query->where('agent_id', authAgent()->id);
    }

    public function scopeFilterUser($query)
    {
        return $query->where('user_id', auth()->id());
    }

    public function scopeFilterByDay($query, $day = 7)
    {
        return $query->whereDate('created_at', '>=', now()->subDays($day));
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(
            function () {
                $className = '';

                if ($this->status == Status::SEND_MONEY_PENDING || $this->status == Status::SEND_MONEY_INITIATED) {
                    $className .= 'warning';
                    $text = 'Pending';
                } elseif ($this->status == Status::SEND_MONEY_REFUNDED) {
                    $className .= 'danger';
                    $text = 'Refunded';
                } else {
                    $className .= 'success';
                    $text = 'Completed';
                }
                return "<span class='badge badge--$className'>" . trans($text) . "</span>";
            }
        );
    }

    public function paymentStatusBadge(): Attribute
    {
        return new Attribute(
            function () {
                $className = '';
                if ($this->payment_status == Status::PAYMENT_INITIATE && $this->deposit) {
                    $className .= 'dark';
                    $text = 'Initiated';
                } elseif ($this->payment_status == Status::PAYMENT_PENDING) {
                    $className .= 'warning';
                    $text = 'Pending';
                } elseif ($this->payment_status == Status::PAYMENT_SUCCESS) {
                    $className .= 'success';
                    $text = 'Completed';
                } elseif ($this->payment_status == Status::PAYMENT_REJECT) {
                    $className .= 'danger';
                    $text = 'Reject';
                } else {
                    $className .= 'danger';
                    $text = 'Yet to Pay';
                }
                return "<span class='badge badge--$className'>" . trans($text) . "</span>";
            }
        );
    }

    public function getSenderInfoAttribute()
    {
        if ($this->user_id) {
            $user = $this->user;
            $address = $user->address;
            $sender['name']    = $user->fullname;
            $sender['mobile']  = $user->mobile;
            $sender['address'] = $address->zip . ', ' . $address->state  . ', ' .  $address->city  . ', ' .  $address->country;
            return (object) $sender;
        } else {
            return $this->sender;
        }
    }

    public function paidAmount()
    {
        $totalAmount = $this->base_currency_amount + $this->base_currency_charge;

        if ($this->deposit) {
            $totalAmount += $this->deposit->charge;
        }
        return $totalAmount;
    }
}
