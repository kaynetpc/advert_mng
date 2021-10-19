<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
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
            'addId' => $this->addId,
            'name' => $this->name,
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
            'totalBudget' => $this->totalBudget,
            'dailyBudget' => $this->dailyBudget,
            'description' => $this->description,
            'bannerImage' => $this->bannerImage
        ];
    }
}
