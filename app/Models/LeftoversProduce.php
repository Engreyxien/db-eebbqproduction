<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class LeftoversProduce extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_fried_chicken',
        'number_of_lumpia_produce',
        'dispatched_to',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
