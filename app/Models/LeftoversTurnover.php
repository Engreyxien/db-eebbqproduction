<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class LeftoversTurnover extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch',
        'date_received',
        'time_received',
        'item_number',
        'number_of_items',
        'quantity',
        'delivered_by',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
