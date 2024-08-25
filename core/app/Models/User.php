<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\UserNotify;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * 
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $username
 * @property string|null $company_name
 * @property string|null $owner_name
 * @property string $email
 * @property string|null $dial_code
 * @property string|null $country_code
 * @property string|null $country_name
 * @property string|null $state
 * @property string|null $city
 * @property string|null $zip
 * @property string|null $mobile
 * @property int $ref_by
 * @property int|null $total_bonus_given
 * @property string $balance
 * @property string $password
 * @property string|null $image
 * @property string|null $address contains full address
 * @property int $status 0: banned, 1: active
 * @property int|null $type
 * @property object|null $business_profile_data
 * @property object|null $kyc_data
 * @property string|null $kyc_rejection_reason
 * @property int $kv 0: KYC Unverified, 2: KYC pending, 1: KYC verified
 * @property int $ev 0: email unverified, 1: email verified
 * @property int $sv 0: mobile unverified, 1: mobile verified
 * @property int $profile_complete
 * @property string|null $ver_code stores verification code
 * @property \Illuminate\Support\Carbon|null $ver_code_send_at verification send time
 * @property int $ts 0: 2fa off, 1: 2fa on
 * @property int $tv 0: 2fa unverified, 1: 2fa verified
 * @property string|null $tsc
 * @property string|null $ban_reason
 * @property string|null $remember_token
 * @property string|null $per_send_money_limit
 * @property string|null $daily_send_money_limit
 * @property string|null $monthly_send_money_limit
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deposit> $deposits
 * @property-read int|null $deposits_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceToken> $deviceTokens
 * @property-read int|null $device_tokens_count
 * @property-read mixed $fullname
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserLogin> $loginLogs
 * @property-read int|null $login_logs_count
 * @property-read mixed $mobile_number
 * @property-read User|null $referrer
 * @property-read mixed $status_badge
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SupportTicket> $tickets
 * @property-read int|null $tickets_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * @property-read int|null $transactions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Withdrawal> $withdrawals
 * @property-read int|null $withdrawals_count
 * @method static \Illuminate\Database\Eloquent\Builder|User active()
 * @method static \Illuminate\Database\Eloquent\Builder|User allUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User answerTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|User banned()
 * @method static \Illuminate\Database\Eloquent\Builder|User businessAccount()
 * @method static \Illuminate\Database\Eloquent\Builder|User closedTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|User emailUnverified()
 * @method static \Illuminate\Database\Eloquent\Builder|User emailVerified()
 * @method static \Illuminate\Database\Eloquent\Builder|User emptyBalanceUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User hasDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User hasWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User kycPending()
 * @method static \Illuminate\Database\Eloquent\Builder|User kycUnverified()
 * @method static \Illuminate\Database\Eloquent\Builder|User kycVerified()
 * @method static \Illuminate\Database\Eloquent\Builder|User mobileUnverified()
 * @method static \Illuminate\Database\Eloquent\Builder|User mobileVerified()
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User notDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User notLoginUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User pendingDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User pendingTicketUser()
 * @method static \Illuminate\Database\Eloquent\Builder|User pendingWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User personalAccount()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User rejectedDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User rejectedWithdrawUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User selectedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User topDepositedUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User twoFaDisableUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User twoFaEnableUsers()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBanReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBusinessProfileData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDailySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDialCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKycData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereKycRejectionReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMonthlySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOwnerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePerSendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfileComplete($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRefBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTotalBonusGiven($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTsc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVerCodeSendAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withBalance()
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, UserNotify;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'ver_code', 'balance', 'kyc_data'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'kyc_data' => 'object',
        'ver_code_send_at' => 'datetime',
        'business_profile_data' => 'object',
    ];

    public function referrer()
    {
        return $this->belongsTo(self::class, 'ref_by');
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
        return $this->hasMany(Deposit::class)->where('status', '!=', Status::PAYMENT_INITIATE);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class)->where('status', '!=', Status::PAYMENT_INITIATE);
    }

    public function tickets()
    {
        return $this->hasMany(SupportTicket::class);
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
        return $query->where('status', Status::USER_ACTIVE)->where('ev', Status::VERIFIED)->where('sv', Status::VERIFIED);
    }

    public function scopeBanned($query)
    {
        return $query->where('status', Status::USER_BAN);
    }

    public function scopeEmailUnverified($query)
    {
        return $query->where('ev', Status::UNVERIFIED);
    }

    public function scopeMobileUnverified($query)
    {
        return $query->where('sv', Status::UNVERIFIED);
    }

    public function scopeKycUnverified($query)
    {
        return $query->where('kv', Status::KYC_UNVERIFIED);
    }

    public function scopeKycPending($query)
    {
        return $query->where('kv', Status::KYC_PENDING);
    }

    public function scopeEmailVerified($query)
    {
        return $query->where('ev', Status::VERIFIED);
    }

    public function scopeMobileVerified($query)
    {
        return $query->where('sv', Status::VERIFIED);
    }

    public function scopeWithBalance($query)
    {
        return $query->where('balance', '>', 0);
    }

    public function deviceTokens()
    {
        return $this->hasMany(DeviceToken::class);
    }

    public function scopePersonalAccount($query)
    {
        $query->where('status', Status::USER_ACTIVE)->where('ev', Status::VERIFIED)->where('sv', Status::VERIFIED)->where('type', 0);
    }

    public function scopeBusinessAccount($query)
    {
        $query->where('status', Status::USER_ACTIVE)->where('ev', Status::VERIFIED)->where('sv', Status::VERIFIED)->where('type', 1);
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->type == Status::PERSONAL_USER) {
                $html = '<span class="badge badge--primary">' . trans('Personal') . '</span>';
            } elseif ($this->type == Status::BUSINESS_USER) {
                $html = '<span><span class="badge badge--success">' . trans('Business') . '</span>';
            }
            return $html;
        });
    }

    public function isAuthorized($user)
    {
        return ($user->ev && $user->sv && $user->tv) ? true : false;
    }
}
