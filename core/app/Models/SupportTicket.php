<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $agent_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $ticket
 * @property string|null $subject
 * @property int $status 0: Open, 1: Answered, 2: Replied, 3: Closed
 * @property int $priority 1 = Low, 2 = medium, 3 = heigh
 * @property string|null $last_reply
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read mixed $fullname
 * @property-read mixed $status_badge
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\SupportMessage> $supportMessage
 * @property-read int|null $support_message_count
 * @property-read \App\Models\User|null $user
 * @property-read mixed $username
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket answered()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket closed()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket pending()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereLastReply($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereTicket($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportTicket whereUserId($value)
 * @mixin \Eloquent
 */
class SupportTicket extends Model
{
    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->name,
        );
    }

    public function username(): Attribute
    {
        return new Attribute(
            get: fn () => $this->email,
        );
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::TICKET_OPEN) {
                $html = '<span class="badge badge--success">' . trans("Open") . '</span>';
            } elseif ($this->status == Status::TICKET_ANSWER) {
                $html = '<span class="badge badge--primary">' . trans("Answered") . '</span>';
            } elseif ($this->status == Status::TICKET_REPLY) {
                $html = '<span class="badge badge--warning">' . trans("Customer Reply") . '</span>';
            } elseif ($this->status == Status::TICKET_CLOSE) {
                $html = '<span class="badge badge--dark">' . trans("Closed") . '</span>';
            }
            return $html;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function supportMessage()
    {
        return $this->hasMany(SupportMessage::class);
    }

    public function scopePending($query)
    {
        return $query->whereIn('status', [Status::TICKET_OPEN, Status::TICKET_REPLY]);
    }

    public function scopeClosed($query)
    {
        return $query->where('status', Status::TICKET_CLOSE);
    }

    public function scopeAnswered($query)
    {
        return $query->where('status', Status::TICKET_ANSWER);
    }
}
