<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\UserNotify;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * 
 *
 * @property int $id
 * @property int $country_id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $username
 * @property string $email
 * @property string|null $dial_code
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $state
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $mobile
 * @property int $ref_by
 * @property string $balance
 * @property string $password
 * @property string|null $image
 * @property string|null $address contains full address
 * @property int $status 0: banned, 1: active
 * @property object|null $kyc_data
 * @property string|null $kyc_rejection_reason
 * @property int $kv 0: KYC Unverified, 2: KYC pending, 1: KYC verified
 * @property int $ts 0: 2fa off, 1: 2fa on
 * @property int $tv 0: 2fa unverified, 1: 2fa verified
 * @property string|null $tsc
 * @property string|null $ban_reason
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $deposits
 * @property-read int|null $deposits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceToken> $deviceTokens
 * @property-read int|null $device_tokens_count
 * @property-read mixed $fullname
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserLogin> $loginLogs
 * @property-read int|null $login_logs_count
 * @property-read mixed $mobile_number
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Withdrawal> $withdrawals
 * @property-read int|null $withdrawals_count
 * @method static \Illuminate\Database\Eloquent\Builder|Agent active()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent allUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent answerTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent banned()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent closedTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent emptyBalanceUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent hasDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent hasWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent kycPending()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent kycUnverified()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent kycVerified()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent notDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent notLoginUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent pendingDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent pendingTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent pendingWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent rejectedDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent rejectedWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent selectedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent topDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent twoFaDisableUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent twoFaEnableUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereBanReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereKv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereKycData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereKycRejectionReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereRefBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereTsc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereTv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent whereZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Agent withBalance()
 * @mixin \Eloquent
 */
class Agent extends Authenticatable
{
    use UserNotify;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'kyc_data' => 'object',
        'ver_code_send_at' => 'datetime'
    ];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function loginLogs()
    {
        return $this->hasMany(UserLogin::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class)->orderBy('id', 'desc');
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class)->where('status', '!=', Status::PAYMENT_SUCCESS);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class)->where('status', '!=', Status::PAYMENT_INITIATE);
    }

    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->firstname . ' ' . $this->lastname,
        );
    }

    public function mobileNumber(): Attribute
    {
        return new Attribute(
            get: fn () => $this->dial_code . $this->mobile,
        );
    }

    // SCOPES
    public function scopeActive($query)
    {
        $query->where('status', Status::ENABLE);
    }

    public function scopeBanned($query)
    {
        $query->where('status', Status::DISABLE);
    }

    public function scopeKycUnverified($query)
    {
        $query->where('kv', Status::KYC_UNVERIFIED);
    }

    public function scopeKycPending($query)
    {
        $query->where('kv', Status::KYC_PENDING);
    }

    public function scopeWithBalance($query)
    {
        $query->where('balance', '>', 0);
    }

    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }
}
