<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Date;

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
            "user_id" => $this->user?->id,
            "first_name"=> $this->user?->first_name,
            "last_name" => $this->user?->last_name,
            "email" => $this->user?->email,
            "phone" => $this->user?->phone,
            "salary" => $this->user?->salary,
            "status" => $this->loan?->status,
            "amount" => $this->loan?->amount,
            "purpose" => $this->loan?->purpose,
            "amount_remaining" => $this->amount_remaining,
            "salary_for_the_month" => $this->salary_for_the_month,
            "monthly_payment" => $this->loan?->monthly_payment,
            "loan_id" => $this->loan?->id,
            "amount_to_pay" => $this->amount_to_pay,
            "date" => Date::createFromDate($this->date)->format('jS F, Y'),
            "created_at" => Date::createFromDate($this->created_at)->format('jS F, Y') ,
        ];
    }
}
