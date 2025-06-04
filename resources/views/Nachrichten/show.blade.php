@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto bg-whitr rounded shadow p-6">
    {{-- Bild --}}
    @if(!empty($news['image_url']))
    <img src="{{ $news['image_url'] }}"
    alt="Vorschaubild"
    class="w-full h-64 object-cover rounded mb-6">
    @endif

    {{-- Titel --}}
    <h1 class="text-3xl font-bold mb-2">
        {{  $news['title'] ?? 'Kein Titel verfügbar' }}
    </h1>

    {{-- Quelle & Datum --}}

    <div class="text-sm text-gray-500 mb-4">
        {{  isset($news['pudDate']) ? \Carbon\Carbon::parse($news['pubDate'])->format('d.m.Y H:i') : 'Datum unbekannt' }}
        | Quelle: {{ $news['source_id'] ?? 'unbekannt' }}
        </div>

         {{-- Beschreibung oder Hinweis --}}
         <p class="text-gray-700 leading-relaxed">
            {{ $news['description'] ?? 'Keine Beschreibung verfügbar.' }}
        </p>

        {{-- <p class="text-gray-700 leading-relaxed">
            {{ $news['content'] ?? 'keine Beschreibung verfügbar.' }}
        </p> --}}



        {{-- Link zum Originalartikel --}}
        <div class="mt-6">
            <a href="{{ $news['link'] ?? '#' }}"
               target="_blank"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Zum vollständigen Artikel
            </a>
        </div>
    </div>
@endsection
