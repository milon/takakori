<?php

namespace App\Models;

use App\Enums\InvestmentType;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Investment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
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
     * @var array
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
