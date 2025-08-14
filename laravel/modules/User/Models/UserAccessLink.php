<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAccessLink
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string|null $expired_at
 */
class UserAccessLink extends Model
{
	protected $fillable = [
		'user_id',
		'token',
		'expired_at',
	];

    protected $primaryKey = 'token';
    public $incrementing = false;
    protected $keyType = 'string';

	/**
	 * Get the user that owns the access link.
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'user_id');
	}	
}
