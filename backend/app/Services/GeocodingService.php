<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeocodingService
{
    /**
     * Recebe um endereço em texto e retorna ['lat' => ..., 'lng' => ...] ou null.
     */
    public function geocode(string $address): ?array
    {
        $apiKey = config('services.google_maps.key');

        if (!$apiKey) {
            return null;
        }

        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
            'address' => $address,
            'key'     => $apiKey,
        ]);

        if (!$response->successful()) {
            return null;
        }

        $data = $response->json();

        if (empty($data['results'][0]['geometry']['location'])) {
            return null;
        }

        $location = $data['results'][0]['geometry']['location'];

        return [
            'lat' => $location['lat'],
            'lng' => $location['lng'],
        ];
    }
}
