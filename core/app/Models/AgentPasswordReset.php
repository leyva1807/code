<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $token
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AgentPasswordReset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AgentPasswordReset extends Model
{
}
