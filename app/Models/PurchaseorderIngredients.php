<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class PurchaseorderIngredients extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchaseorder_ingredients_id',
        'company_name',
        'date_requested',
        'date_needed',
        'number_of_items',
        'quantity_unit',
        'particulars',
        'unit_price',
        'amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
