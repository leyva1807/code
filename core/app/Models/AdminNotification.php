<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $agent_id
 * @property string|null $title
 * @property int $is_read
 * @property string|null $click_url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereClickUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereIsRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminNotification whereUserId($value)
 * @mixin \Eloquent
 */
class AdminNotification extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
