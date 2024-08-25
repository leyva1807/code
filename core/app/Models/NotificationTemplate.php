<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $act
 * @property string|null $name
 * @property string|null $subject
 * @property string|null $push_title
 * @property string|null $email_body
 * @property string|null $sms_body
 * @property string|null $push_body
 * @property object|null $shortcodes
 * @property int $email_status
 * @property string|null $email_sent_from_name
 * @property string|null $email_sent_from_address
 * @property int $sms_status
 * @property string|null $sms_sent_from
 * @property int $push_status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereEmailBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereEmailSentFromAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereEmailSentFromName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereEmailStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate wherePushBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate wherePushStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate wherePushTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereShortcodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereSmsBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereSmsSentFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereSmsStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationTemplate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NotificationTemplate extends Model
{
    protected $casts = [
        'shortcodes' => 'object'
    ];

}
