<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $agent_id
 * @property string|null $user_ip
 * @property string|null $city
 * @property string|null $country
 * @property string|null $country_code
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $browser
 * @property string|null $os
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Agent|null $agent
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereBrowser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereOs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserLogin whereUserIp($value)
 * @mixin \Eloquent
 */
class UserLogin extends Model
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
