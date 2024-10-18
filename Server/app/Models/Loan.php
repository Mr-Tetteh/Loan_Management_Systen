<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','amount', 'purpose', 'status', 'monthly_payment'];
    protected $appends = ['amount_remaining'];


    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function payments()
    {
        return $this->hasMany(Payments::class);

    }
    public function getAmountRemainingAttribute()
    {
        $amountPaid = $this->attributes['amount_paid'] ?? 0;

        return number_format($this->attributes['amount'] - $amountPaid, 2, '.', '');
    }
}
