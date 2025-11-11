<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Services\OpenAiService;
use App\Http\Requests\GeneratePromptRequest;
use App\Http\Resources\ImageGenerationResource;

class ImagePromptGenerationController extends Controller
{

    public function __construct(private OpenAiService $openAiService) {}
    public function index()
    {
        $user = request()->user();
        $imageGenerations = $user->imageGenerations()->latest()->paginate(10);
        return ImageGenerationResource::collections($imageGenerations);
    }
    public function store(GeneratePromptRequest $request)
    {
        $user = $request->user();
        $image = $request->file('image');
        $originalName = $image->getClientOriginalName();
        $sanitizedName = preg_replace('/[^a-zA-Z0-9._-]/', '_', pathinfo($originalName, PATHINFO_FILENAME));
        $extension = $image->getClientOriginalExtension();
        $safeFileName = $sanitizedName . '_' . $extension;
        $safeFileName = $sanitizedName . '_' . Str::random(32) . '.' . $extension;
        $imagePath = $image->storeAs('/uploads/images', $safeFileName, 'public');
        $generatedPrompt = $this->openAiService->generatePromptFromImage($image);

        $imageGeneration = $user->imageGenerations()->create([
            'image_path' => $imagePath,
            'generated_prompt' => $generatedPrompt,
            'original_filename' => $originalName,
            'file_size' => $image->getSize(),
            'mime_type' => $image->getMimeType()
        ]);

        return new ImageGenerationResource($imageGeneration);
        // return response()->json($imageGeneration, 201);
    }
}
