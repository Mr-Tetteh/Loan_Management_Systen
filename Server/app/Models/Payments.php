<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['amount_to_pay', 'amount_left'];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);

    }
}
