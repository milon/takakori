<?php

namespace App\Models;

use App\Enums\DebtType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property DebtType $type
 * @property float $interest_rate
 * @property int $initial_amount
 * @property int $current_balance
 * @property int $min_payment
 * @property \Illuminate\Support\Carbon $due_date
 * @property int $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 *
 * @method static \Database\Factories\DebtFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereCurrentBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereInitialAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereInterestRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereMinPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Debt whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Debt extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'interest_rate',
        'initial_amount',
        'current_balance',
        'min_payment',
        'due_date',
        'currency_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'interest_rate' => 'float',
        'due_date' => 'date',
        'currency_id' => 'integer',
        'type' => DebtType::class,
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
