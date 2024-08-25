<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $version
 * @property object|null $update_log
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog whereUpdateLog($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UpdateLog whereVersion($value)
 * @mixin \Eloquent
 */
class UpdateLog extends Model
{
    protected $casts = ['update_log'=>'object'];
}
