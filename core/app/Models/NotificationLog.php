<?php

namespace App\Models;

use App\Traits\ApiQuery;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $agent_id
 * @property string|null $sender
 * @property string|null $sent_from
 * @property string|null $sent_to
 * @property string|null $subject
 * @property string|null $message
 * @property string|null $notification_type
 * @property string|null $image
 * @property int $user_read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog apiQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereNotificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereSentFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereSentTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NotificationLog whereUserRead($value)
 * @mixin \Eloquent
 */
class NotificationLog extends Model
{
    use ApiQuery;

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
