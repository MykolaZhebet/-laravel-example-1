<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'salary' => $this->salary,
            'created_at' => $this->created_at->format('Y-m-d H:i'),
            'employer' => new UserResource($this->whenLoaded('empoyer'))
        ];
    }
}
