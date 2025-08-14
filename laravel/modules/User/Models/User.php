<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @property int $id
 * @property string $user_name
 * @property string $phone
 * @property \Illuminate\Database\Eloquent\Collection|UserAccessLink[] $accessLinks
 */
class User extends Model
{
    protected $fillable = [
        'username',
        'phone',
    ];

    /**
     * Get the access links for the user.
     */
    public function accessLinks()
    {
        return $this->hasMany(UserAccessLink::class, 'user_id');
    }
}
