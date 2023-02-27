<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $gen = '';
        switch ($this->gender) {
            case 0:
                $gen = 'Others';
                break;
            case 1:
                $gen = 'Male';
                break;
            case 2:
                $gen = 'Female';
                break;
            default:
                break;
        }
        return [
            'id' => $this->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'role' => $this->role->level,
            'department' => $this->department->name,
            'gender' => $gen,
            'dob' => $this->dob
        ];
    }
}
