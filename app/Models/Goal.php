<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $currency_id
 * @property string $name
 * @property int $target_amount
 * @property int $current_amount
 * @property \Illuminate\Support\Carbon $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 *
 * @method static \Database\Factories\GoalFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereCurrentAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereTargetAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Goal whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Goal extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'currency_id',
        'name',
        'target_amount',
        'current_amount',
        'deadline',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'deadline' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
