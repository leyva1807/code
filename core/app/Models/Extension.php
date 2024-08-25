<?php

namespace App\Models;

use App\Traits\GlobalStatus;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string|null $act
 * @property string|null $name
 * @property string|null $description
 * @property string|null $image
 * @property string|null $script
 * @property object|null $shortcode object
 * @property string|null $support help section
 * @property int $status 1=>enable, 2=>disable
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status_badge
 * @method static \Illuminate\Database\Eloquent\Builder|Extension active()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension generateScript()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension inactive()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension query()
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereAct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereScript($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereShortcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereSupport($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Extension whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Extension extends Model
{
    use GlobalStatus;

    protected $casts = [
        'shortcode' => 'object',
    ];

    protected $hidden = ['script', 'shortcode'];

    public function scopeGenerateScript()
    {
        $script = $this->script;
        foreach ($this->shortcode as $key => $item) {
            $script = str_replace('{{' . $key . '}}', $item->value, $script);
        }
        return $script;
    }
}
