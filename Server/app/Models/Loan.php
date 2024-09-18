<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'purpose'];


    public function user()
    {
        return $this->belongsTo(User::class);

    }
    public function payments()
    {
        return $this->hasMany(Payments::class);

    }
}
