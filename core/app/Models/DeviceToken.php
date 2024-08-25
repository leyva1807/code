<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $agent_id
 * @property int $is_app
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereIsApp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DeviceToken whereUserId($value)
 * @mixin \Eloquent
 */
class DeviceToken extends Model
{

}
