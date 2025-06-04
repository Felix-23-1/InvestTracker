@extends('layouts.app')

@section('content')
    <h2 class="text-3xl font-bold mb-6">📰 Krypto-Nachrichten</h2>
    {{-- @dd($news) --}}
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @forelse ($news as $item)
            <div class="bg-white rounded shadow p-4 mb-6 hover:shadow-md transition-shadow duration-200 flex flex-col">
                {{-- Bild nur anzeigen, wenn vorhanden --}}
                @if (!empty($item['image_url']))
                    <img src="{{ $item['image_url'] }}"
                         alt="Vorschaubild"
                         class="w-full h-48 object-cover rounded mb-4">
                @endif

                {{-- Titel + Link zur Detailseite --}}
                <a href="{{ route('news.show', $loop->index) }}"
                   class="text-xl font-semibold text-blue-600 hover:underline block mb-2">
                    {{ $item['title'] ?? '🛑 Kein Titel verfügbar' }}
                </a>

                {{-- Beschreibung (oder Fallback) --}}
                <p class="text-sm text-gray-700">
                    {{ \Illuminate\Support\Str::limit(strip_tags($item['description'] ?? 'Keine Vorschau verfügbar'), 150) }}
                </p>

                {{-- Footer: Datum & Quelle --}}
                <div class="mt-auto text-xs text-gray-500 pt-4 flex justify-between">
                    <span>
                        {{ isset($item['pubDate']) ? \Carbon\Carbon::parse($item['pubDate'])->format('d.m.Y H:i') : 'Datum unbekannt' }}
                    </span>
                    <span>
                        Quelle: {{ $item['source_id'] ?? 'unbekannt' }}
                    </span>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-3">❌ Keine Nachrichten gefunden.</p>
        @endforelse
    </div>
@endsection
