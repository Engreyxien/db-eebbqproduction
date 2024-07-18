<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StocksChicken;
use App\Models\PurchaseorderChicken;
use App\Models\StocksIngredients;
use App\Models\PurchaseorderIngredients;
use App\Models\StocksTransfer;
use App\Models\LeftoversProduce;
use App\Models\LeftoverIngredient;
use App\Models\LeftoversTurnover;
use App\Models\Materials;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'contact_number',
        'email_address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function StocksChicken(): HasMany
    {
        return $this->hasMany(StocksChicken::class);
    }

    public function PurchaseorderChicken(): HasMany
    {
        return $this->hasMany(PurchaseorderChicken::class);
    }

    public function PurchaseorderIngredients(): HasMany
    {
        return $this->hasMany(PurchaseorderIngredients::class);
    }

    public function LeftoversProduce(): HasMany
    {
        return $this->hasMany(LeftoversProduce::class);
    }

    public function LeftoverIngredient(): HasMany
    {
        return $this->hasMany(LeftoverIngredient::class);
    }

    public function LeftoversTurnover(): HasMany
    {
        return $this->hasMany(LeftoversTurnovers::class);
    }

    public function Materials(): HasMany 
    {
        return $this->hasMany(Materials::class);
    }

    public function StocksIngredient(): HasMany
    {
        return $this->hasMany(StocksIngredient::class);
    }

    public function StocksTransfer(): HasMany
    {
        return $this->hasMany(StocksTransfer::class);
    }
}
