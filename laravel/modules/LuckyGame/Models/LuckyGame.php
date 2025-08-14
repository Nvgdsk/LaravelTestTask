<?php
declare(strict_types=1);

namespace Modules\LuckyGame\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;

/**
 * Class LuckyGame
 *
 * @property int $id
 * @property int $user_id
 * @property int $generated_value
 *
 * @method static int generateValue()
 */
class LuckyGame extends Model
{
    protected $table = 'lucky_games';
    protected $fillable = [
        'user_id',
        'generated_value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function generateValue(): int
    {
       return random_int(1, 1000);
    }
}