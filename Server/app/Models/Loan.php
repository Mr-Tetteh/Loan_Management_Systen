<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['amount', 'purpose'];
    use HasFactory;


    public function Loan()
    {
        return $this->hasMany(Payments::class);

    }
}
