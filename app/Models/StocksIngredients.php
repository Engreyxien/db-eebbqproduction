<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class StocksIngredients extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredients_name',
        'beginning_stocks',
        'dispatch_AM',
        'dispatch_PM',
        'ending_stocks',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
