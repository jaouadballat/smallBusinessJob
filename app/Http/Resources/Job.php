<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'location' => $this->location,
            'salary' => $this->salary,
            'contract' => $this->contract_type,
            'agency' => new Agency($this->agency),
            'postedDate' => $this->postedDate->diffForHumans(),
        ];
    }
}
