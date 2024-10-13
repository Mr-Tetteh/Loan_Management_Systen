<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'other_names' => $this->other_names,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'user_type' => $this->user_type,
            'date_of_birth' => $this->date_of_birth,
            'salary' => $this->salary,
            'nationality' => $this->nationality,
            'national_id' => $this->national_id,
            'created_at' =>  $this->created_at ,
            'password' => $this->password

        ];
    }
}
