<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'date',
        'user_id',
        'customer_name',
        'total_amount',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function saleDetails()
    {
        return $this->hasMany(SaleDetail::class);
    }
}
