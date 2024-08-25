<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $site_name
 * @property string|null $cur_text currency text
 * @property string|null $cur_sym currency symbol
 * @property string|null $email_from
 * @property string|null $email_from_name
 * @property string|null $email_template
 * @property string|null $sms_template
 * @property string|null $sms_from
 * @property string|null $push_title
 * @property string|null $push_template
 * @property string|null $base_color
 * @property string $agent_fixed_commission
 * @property string $agent_percent_commission
 * @property string $referral_commission
 * @property int $commission_count
 * @property string $user_send_money_limit
 * @property string $user_daily_send_money_limit
 * @property string $user_monthly_send_money_limit
 * @property string $agent_send_money_limit
 * @property string $agent_daily_send_money_limit
 * @property string $agent_monthly_send_money_limit
 * @property int $resent_code_duration
 * @property object|null $mail_config email configuration
 * @property object|null $sms_config
 * @property object|null $global_shortcodes
 * @property int $kv
 * @property int $ev email verification, 0 - dont check, 1 - check
 * @property int $en email notification, 0 - dont send, 1 - send
 * @property int $sv mobile verication, 0 - dont check, 1 - check
 * @property int $sn sms notification, 0 - dont send, 1 - send
 * @property int $pn
 * @property int $force_ssl
 * @property int $maintenance_mode
 * @property int $secure_password
 * @property int $agree
 * @property int $multi_language
 * @property int $registration 0: Off	, 1: On
 * @property string|null $active_template
 * @property int $system_customized
 * @property int $paginate_number
 * @property int $currency_format 1=>Both
 * 2=>Text Only
 * 3=>Symbol Only
 * @property string|null $last_cron
 * @property string|null $available_version
 * @property object|null $kyc_modules
 * @property int $referral_system
 * @property int $agent_module
 * @property object|null $agent_charges
 * @property object|null $firebase_config
 * @property int $push_notify
 * @property object|null $conversion_rate_api
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting siteName($pageTitle)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereActiveTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentCharges($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentDailySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentFixedCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentMonthlySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentPercentCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgentSendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAgree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereAvailableVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereBaseColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCommissionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereConversionRateApi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurSym($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereEmailFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereEmailFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereEmailTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereEv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereFirebaseConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereForceSsl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereGlobalShortcodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereKv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereKycModules($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereLastCron($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereMailConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereMaintenanceMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereMultiLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting wherePaginateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting wherePn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting wherePushNotify($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting wherePushTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting wherePushTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereReferralCommission($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereReferralSystem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereResentCodeDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSecurePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSmsConfig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSmsFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSmsTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSystemCustomized($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUserDailySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUserMonthlySendMoneyLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUserSendMoneyLimit($value)
 * @mixin \Eloquent
 */
class GeneralSetting extends Model
{
    protected $casts = [
        'mail_config' => 'object',
        'sms_config' => 'object',
        'global_shortcodes' => 'object',
        'agent_charges'       => 'object',
        'conversion_rate_api' => 'object',
        'firebase_config' => 'object',
        'kyc_modules' => 'object'
    ];

    protected $hidden = ['email_template', 'mail_config', 'sms_config', 'system_info'];

    public function scopeSiteName($query, $pageTitle)
    {
        $pageTitle = empty($pageTitle) ? '' : ' - ' . $pageTitle;
        return $this->site_name . $pageTitle;
    }

    protected static function boot()
    {
        parent::boot();
        static::saved(function () {
            \Cache::forget('GeneralSetting');
        });
    }
}
