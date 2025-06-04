@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">📈 Marktübersicht</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-100 rounded shadow text-sm">
            <thead class="bg-gray-300 text-black">
                <tr>
                    <th class="py-2 px-4 text-left">#</th>
                    <th class="py-2 px-4 text-left">Name</th>
                    <th class="py-2 px-4 text-right">Preis</th>
                    <th class="py-2 px-4 text-right">1h %</th>
                    <th class="py-2 px-4 text-right">24h %</th>
                    <th class="py-2 px-4 text-right">7d %</th>
                    <th class="py-2 px-4 text-right">Marktkap.</th>
                    <th class="py-2 px-4 text-right">Volumen (24h)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coins as $index => $coin)
                    <tr class="border-t text-black">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-black dark:bg-gray-200 text-right">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 flex items-center space-x-2">
                            <img src="{{ $coin['image'] }}" alt="{{ $coin['symbol'] }}" class="w-6 h-6">
                            <span>{{ $coin['name'] }} ({{ strtoupper($coin['symbol']) }})</span>
                        </td>
                        <td class ="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-black dark:bg-gray-200 text-right">€{{ number_format($coin['current_price'], 2, ',', '.') }}</td>
                        <td class="py-2 px-4 text-right {{ $coin['price_change_percentage_1h_in_currency'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($coin['price_change_percentage_1h_in_currency'], 2) }}%
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-black dark:bg-gray-200 text-right {{ $coin['price_change_percentage_24h_in_currency'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($coin['price_change_percentage_24h_in_currency'], 2) }}%
                        </td>
                        <td class="py-2 px-4 text-right {{ $coin['price_change_percentage_7d_in_currency'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($coin['price_change_percentage_7d_in_currency'], 2) }}%
                        </td>
                        <td class="py-2 px-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-black dark:bg-gray-200 text-right">€{{ number_format($coin['market_cap'], 0, ',', '.') }}</td>
                        <td class="py-2 px-4 text-right">€{{ number_format($coin['total_volume'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
