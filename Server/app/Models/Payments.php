<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $fillable = ['amount_to_pay', 'amount_left'];
    use HasFactory;


    public function payment()
    {
        return $this->hasMany(Loan::class);

    }
}
