<?php

namespace App\Models;

use App\Enums\BillingFrequency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property int $currency_id
 * @property string $name
 * @property int $amount
 * @property \Illuminate\Support\Carbon $due_date
 * @property BillingFrequency $frequency
 * @property bool $is_paid
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BillReminderFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereIsPaid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|BillReminder whereUserId($value)
 * @mixin \Eloquent
 */
class BillReminder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'currency_id',
        'name',
        'amount',
        'due_date',
        'frequency',
        'is_paid',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'category_id' => 'integer',
        'currency_id' => 'integer',
        'due_date' => 'date',
        'is_paid' => 'boolean',
        'frequency' => BillingFrequency::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
