<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $support_message_id
 * @property string|null $attachment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $encrypted_id
 * @property-read \App\Models\SupportMessage|null $supportMessage
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment whereAttachment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment whereSupportMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SupportAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SupportAttachment extends Model
{
    protected $appends = ['encrypted_id'];

    public function supportMessage()
    {
        return $this->belongsTo(SupportMessage::class,'support_message_id');
    }

    public function encryptedId(): Attribute
    {
        return new Attribute(
            get: fn () => encrypt($this->attributes['id']),
        );
    }
}
