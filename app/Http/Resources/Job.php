<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helper\Helper;

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
            'salary' => Helper::currencyFormat($this->salary),
            'contract' => $this->contract_type,
            'agency' => new Agency($this->agency),
            'postedDate' => $this->postedDate->diffForHumans(),
        ];
    }
}
