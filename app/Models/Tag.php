<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
    ];

    public function transactions(): MorphToMany
    {
        return $this->morphedByMany(Transaction::class, 'taggables');
    }

    public function recurringTransactions(): MorphToMany
    {
        return $this->morphedByMany(Transaction::class, 'taggables');
    }
}
