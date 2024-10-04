<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
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
            'user_id' => $this->user?->id,
            'first_name' => $this->user?->first_name,
            'last_name' => $this->user?->last_name,
            'other_names' => $this->user?->other_names,
            'email' => $this->user?->email,
            'amount' => $this->amount,
            'status' => $this->status,
            'purpose' => $this->purpose,
            'phone' => $this->user?->phone,
            'country' => $this->user?->country,
            'amount_remaining' => $this->amount_remaining,
            'monthly_payment' => $this->monthly_payment,
            'salary' => $this->user?->salary,
            'nationality' => $this->user?->nationality,
            'national_id' => $this->user?->national_id,
            'created_at' => $this->created_at->format('jS F, Y'),
        ];
    }
}
