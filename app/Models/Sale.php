<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public mixed $user_id;
    public mixed $customer_name;
    public mixed $total_amount;
    public mixed $date;

    protected $fillable = [
        'date',
        'user_id',
        'customer_name',
        'total_amount',
    ];

    public static function count(): int
    {
        return Sale::all()->count();
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function saleDetails(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
}
