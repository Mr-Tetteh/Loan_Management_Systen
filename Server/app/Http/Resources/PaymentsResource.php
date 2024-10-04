<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);
        return [
            "id" => $this->id,
            "user_id" => $this->user->id,
            "first_name"=> $this->user->first_name,
            "last_name" => $this->user->last_name,
            "salary" => $this->user->salary,
            "status" => $this->loan->status,
            "amount" => $this->loan->amount,
            "purpose" => $this->loan->purpose,
            "monthly_payment" => $this->loan->monthly_payment,
            "loan_id" => $this->loan->id,
            "amount_to_pay" => $this->amount_to_pay,
            "date" => $this->date,
            "created_at" => $this->created_at->format('jS F, Y'),
        ];
    }
}
