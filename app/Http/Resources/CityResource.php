<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // This structure is now standardized and can be easily cached.
        return [
            'id' => $this->ID,
            'name' => $this->Name,
            'country_code' => $this->CountryCode,
            'district' => $this->District,
            'population' => $this->Population,
            // The 'country' relationship will only be included if it was loaded.
            'country' => $this->whenLoaded('country', function () {
                return [
                    'code' => $this->country->Code,
                    'name' => $this->country->Name,
                ];
            }),
        ];
    }
}
