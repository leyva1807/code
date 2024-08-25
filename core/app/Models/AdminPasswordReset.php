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
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdminPasswordReset whereToken($value)
 * @mixin \Eloquent
 */
class AdminPasswordReset extends Model
{
    protected $table = "admin_password_resets";
    protected $guarded = ['id'];
    public $timestamps = false;
}
