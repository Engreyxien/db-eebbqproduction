<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class StocksTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_number',
        'transfer_from',
        'transfer_to',
        'requested_by',
        'date_requested',
        'date_needed',
        'number_of_items',
        'quantity_unit',
        'description',
        'unit_price',
        'amount',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
