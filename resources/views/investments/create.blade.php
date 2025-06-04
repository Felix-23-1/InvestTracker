@extends('layouts.app')

@section('content')

<div class="container xm-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Neue Investition</h2>

    <form method="POST" action="{{ route ('investments.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="coin_symbol"> Coin (z.B. BTC, ETH):</label>
            <input type="text" name="coin_symbol" id="coin_symbol" class="border border-gray-300 p-2 rounded w-full" required>
        </div>

        <div>
            <label for="amount"> Menge:</label>
            <input type="number" step="0.000001" name="amount" id="amount" required class="border p-2 w-full">
        </div>

        <div>
            <label for="buy_price">Kaufpreis:</label>
            <input type="number" step="0.01" name="buy_price" id="buy_price" required class="border p-2 w-full">
        </div>

        <div>
            <label for="target_price">Zielverkaufspreis (optimal):</label>
            <input type="number" step="0,01" name="target_price" id="target_price" class="border p-2 w-full">
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
            Investition speichern
        </button>
    </form>
</div>
@endsection
