<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class NewsHelper
{
    public static function getLatestNews(): array
    {
        $apiKey = config('services.newsdata.key');
        // dd(config('services.newsdata.key'));

        $response = Http::get('https://newsdata.io/api/1/news', [
            'apikey' => config('services.newsdata.key'),
            'q' => 'crypto',
            'language' => 'en',
            'category' => 'business'
        ]);



    $data = $response->json();

    // TESTAUSGABE
    // \Log::info('NewsData API Antwort:', $data);

    return $data['results'] ?? [];
    }
}
