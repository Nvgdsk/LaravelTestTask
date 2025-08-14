<?php
declare(strict_types=1);

namespace Modules\LuckyGame\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\User\Models\User;

class LuckyGameHistory extends Model
{
    protected $table = 'lucky_game_histories';
    protected $fillable = [
        'user_id',
        'lucky_game_id',
        'result',
        'win_amount'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function luckyGame(): BelongsTo
    {
        return $this->belongsTo(LuckyGame::class, 'lucky_game_id');
    }
}