<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CatImageController extends Controller
{
    public function getRandomCatImage()
    {
        $googleApiKey = config('services.google.api_key');
        $googleCx = config('services.google.cx');

        $query = 'cute cat';
        $url = "https://www.googleapis.com/customsearch/v1";

        $client = new Client();
        try {
            $response = $client->get($url, [
                'query' => [
                    'key' => $googleApiKey,
                    'cx' => $googleCx,
                    'q' => $query,
                    'searchType' => 'image',
                    'num' => 10, 
                    'start' => rand(1, 90)
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            if (isset($data['items']) && count($data['items']) > 0) {
                $randomImage = $data['items'][array_rand($data['items'])]['link'];
                return response()->json(['image' => $randomImage], 200);
            } else {
                return response()->json(['error' => 'No images found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch images'], 500);
        }
    }
}
