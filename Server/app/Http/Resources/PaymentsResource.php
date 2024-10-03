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
            "loan_id" => $this->loan->id,
            "amount_to_pay" => $this->amount_to_pay,
            "date" => $this->date,
            "created_at" => $this->created_at,
        ];
    }
}
