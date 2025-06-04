<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class CryptoHelper
{
    public static function getCurrentPrice(string $symbol): ?float
    {
        $idMap = [
            'BTC' => 'bitcoin',
            'ETH' => 'ethereum',
            'ADA' => 'cardano',
            'SOL' => 'solana',
            'SUI' => 'sui',
            'LINK' => 'chainlink',
            'INJ' => 'injective',
            'PI' => 'pi-network',
        ];

        $symbol = strtoupper(trim($symbol)); // ← trim entfernt Leerzeichen
        $coinId = $idMap[$symbol] ?? null;

        if (!$coinId) {
            Log::debug('❌ Kein Mapping vorhanden für: ' . $symbol);
            return null;
        }

        // Cache für 1 Minute gültig
        return Cache::remember("price_{$coinId}", 60, function () use ($coinId) {
            $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
                'ids' => $coinId,
                'vs_currencies' => 'eur',
            ]);

        $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
            'ids' => $coinId,
            'vs_currencies' => 'eur',
        ]);

        if (!$response->successful()) {
            Log::debug('❌ API-Fehler für: ' . $coinId);
            return null;
        }

        $data = $response->json();

        if (!isset($data[$coinId]['eur'])) {
            Log::debug('❌ Kein EUR-Wert gefunden für: ' . $coinId);
            return null;
        }

        return $data[$coinId]['eur'];
    });

    }
}
