<?php

namespace App\Models;

use App\Enums\InvestmentType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property InvestmentType $type
 * @property \Illuminate\Support\Carbon $purchase_date
 * @property int $purchase_price
 * @property int $current_price
 * @property int $quantity
 * @property int $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read mixed $market_value
 * @property-read mixed $performance
 * @property-read \App\Models\User|null $user
 *
 * @method static \Database\Factories\InvestmentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereCurrentPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Investment whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Investment extends Model
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
        'purchase_date',
        'purchase_price',
        'current_price',
        'quantity',
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
        'purchase_date' => 'date',
        'type' => InvestmentType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    protected function performance(): Attribute
    {
        return Attribute::make(
            get: fn () => round((($this->current_price - $this->purchase_price) / $this->purchase_price) * 100, 2),
        );
    }

    protected function marketValue(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->current_price * $this->quantity,
        );
    }
}
