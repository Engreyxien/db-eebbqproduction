<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Materials extends Model
{
    use HasFactory;

    protected $fillable = [
        'materials_name',
        'number_of_items',
        'user_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
