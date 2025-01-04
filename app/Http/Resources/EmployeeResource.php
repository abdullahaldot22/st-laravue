<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"           => $this->id,
            "name"         => $this->name,
            "email"        => $this->email,
            "joining_date" => $this->joining_date,
            "designation"  => $this->designation,
            "username"     => $this->username,
            "phone"        => $this->phone,
            "dob"          => $this->date_of_birth,
            "street"       => $this->street,
            "address"      => $this->address,
            "city"         => $this->city,
        ];
    }
}
