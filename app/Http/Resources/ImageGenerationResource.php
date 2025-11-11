<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageGenerationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image_path' => $this->image_path,
            'image_url' => $this->image_path ? asset('/storage/' . $this->image_path) : null,
            'generated_prompt' => $this->generated_prompt,
            'original_filename' => $this->original_filename,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
