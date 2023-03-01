<?php

namespace App\Http\Resources\Department;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'coordinator_name' => $this->coordinator ? $this->coordinator->last_name .' '. $this->coordinator->first_name : null,
            'coordinator_email' => $this->coordinator?->email,
            'number_of_staffs' => $this->users->where('role', 'staff')->count()
        ];
    }
}
