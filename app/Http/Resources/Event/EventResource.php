<?php

namespace App\Http\Resources\Event;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
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
            'open_date' => Carbon::create($this->open_date)->format('d-m-Y'),
            'first_closure_date' => Carbon::create($this->first_closure_date)->format('d-m-Y'),
            'final_closure_date' => Carbon::create($this->final_closure_date)->format('d-m-Y'),
            'created_at' => Carbon::create($this->created_at)->toDateTimeString()
        ];
    }
}
