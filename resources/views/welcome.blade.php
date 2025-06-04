@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center text-white">
    <div class="text-center max-w-6xl px-6 py-10 rounded-lg shadow-lg bg-gray-800 bg-opacity-70">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-6">💰 Crypto-Invest-Tracker</h1>
        <p class="text-lg mb-10">Behalte deine Investitionen im Blick, verfolge Kurse und bleibe mit News auf dem Laufenden.</p>

        {{-- Navigation Buttons --}}
        {{-- <div class="flex justify-center flex-wrap gap-4 mb-10">
            <a href="{{ route('investments.index') }}" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">📊 Portfolio</a>
            <a href="{{ route('news.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">📰 News</a>
            <a href="{{ route('tracker') }}" class="bg-purple-500 hover:bg-purple-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">📈 Coin Tracker</a>
        </div> --}}

        {{-- Info Cards --}}
        <div class="grid gap-6 sm:grid-cols-6 lg:grid-cols-2 text-left">
            <div class="bg-gray-200 text-gray-900 rounded-xl overflow-hidden shadow-lg transition transform hover:scale-105 w-80 mx-auto">
                <img src="https://static.vecteezy.com/ti/gratis-vektor/p1/28571516-daten-analyse-konzept-forschung-oder-analyse-grafiken-und-diagramm-diagramme-statistisch-berichte-datum-oder-finanziell-analyse-marketing-zum-websites-optimierung-geschaftsmann-analysieren-daten-auf-monitor-bildschirm-vektor.jpg" alt="Bitcoin" class="w-full h-40 object-contain bg-gray-100">
                <div class="p-4 text-center">
                    <a href={{ route('market.index') }} class="text-lg font-bold mb-2 text.lg block">📈 Bitcoin Analyse </a>
                    <p class="text-sm text-gray-700">Verfolge die Entwicklung von BTC mit historischen Kursen und Prognosen.</p>
                </div>
            </div>
            <div class="bg-gray-200 text-gray-900 rounded-xl overflow-hidden shadow-lg transition transform hover:scale-105 w-80 mx-auto">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLnfqmMJxmTpx8W2l0O9vRHBY6EA-RlBtP4g&s" alt="NEWS" class="w-full h-40 object-contain bg-gray-100">
                <div class="p-4 text-center">
                   <a href={{ route('news.index') }} class="text-lg font-bold mb-2 text.lg block">📰 Crypto News</a>
                    <p class="text-sm text-gray-700">Bleib informiert über Entwicklungen rund um das Thema Crypto.</p>
                </div>
            </div>
            <div class="bg-gray-200 text-gray-900 rounded-xl overflow-hidden shadow-lg transition transform hover:scale-105 w-80 mx-auto">
                <img src="https://cdn.prod.website-files.com/61effee4b1bc1e9898a4c086/6358a3597bda63b2c947fe96_Diversifying%20Crypto%20Portfolio_Opt1_102522%402x.jpg" alt="Dein Portfolio" class="w-full h-40 object-contain bg-gray-100">
                <div class="p-4 text-center">
                    <a href={{ route('investments.index') }} class="text-lg font-bold mb-2 text.lg block">📊 Dein Portfolio</a>
                    <p class="text-sm text-gray-700">Alle Investitionen auf einen Blick, mit aktuellem Wert und Gewinn/Verlust-Rechnung.</p>
                </div>
            </div>
            <div class="bg-gray-200 text-gray-900 rounded-xl overflow-hidden shadow-lg transition transform hover:scale-105 w-80 mx-auto">
                <img src="https://stormgain.com/sites/default/files/2023-02/most-decentralised-crypto-list-main.jpg" alt="Marktübersicht" class="w-full h-40 object-contain bg-gray-100">
                <div class="p-4 text-center">
                    <a href={{ route('market.index') }} class="text-lg font-bold mb-2 text.lg block">₿ Coin Charts</a>
                    <p class="text-sm text-gray-700"> Bleib auf dem laufenden welche Coins die Spitze erklimmen </p>
                </div>
        </div>
    </div>
</div>
@endsection
