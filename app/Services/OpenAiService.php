<?php

namespace App\Services;

use OpenAI\Factory;
use Illuminate\Http\UploadedFile;


class OpenAiService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function generatePromptFromImage(UploadedFile $image)
    {
        $imageData = base64_encode(file_get_contents($image->getPathname()));
        $mimeType = $image->getMimeType();
        $client = (new Factory())->withApiKey(config('services.openai.key'))->make();

        $response = $client->chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                'role' => 'user',
                'content' => [
                    [
                        'type' => 'text',
                        'text' => 'Analyze this image and generate a detailed prompt to recreate a similar image with AI image generation tools'
                    ],
                    [
                        'type' => 'image_url',
                        'image_url' => [
                            'url' => 'data:' . $mimeType . ';base64,' . $imageData
                        ]
                    ]
                ]
            ]
        ]);

        return $response->choices[0]->message->content;;
    }
}
