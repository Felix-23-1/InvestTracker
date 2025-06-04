@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Deine Investitionen</h2>

    @if ($investments->isEmpty())
        <p>Du hast noch keine Investitionen eingetragen.</p>
        <a href="{{ route('investments.create') }}"
        class="inline-block mt-4 bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded shadow">
         ➕ Jetzt Investition hinzufügen
     </a>
    @else

        <table class=" bg-gray-950 w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-500 text-black">
                    <th class="border px-4 py-2">Coin</th>
                    <th class="border px-4 py-2">Menge</th>
                    <th class="border px-4 py-2">Kaufpreis</th>
                    <th class="border px-4 py-2">Aktueller Preis</th>
                    <th class="border px-4 py-2">Wert heute</th>
                    <th class="border px-4 py-2">Gewinn</th>
                    <th class="border px-4 py-2">Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investments as $investment)
                    <tr class="bg-gray-300 text-black">
                        <td class="border px-4 py-2">{{ $investment->coin_symbol }}</td>
                        <td class="border px-4 py-2">{{ $investment->amount }}</td>
                        <td class="border px-4 py-2">{{ number_format($investment->buy_price, 2, ',', '.') }} €</td>

                        <td class="border px-4 py-2">
                            @if ($investment->current_price !== null)
                                {{ number_format($investment->current_price, 2, ',', '.') }} €
                            @else
                                <span class="text-red-600">nicht verfügbar</span>
                            @endif
                        </td>

                        <td class="border px-4 py-2">
                            {{ number_format($investment->current_value ?? 0, 2, ',', '.') }} €
                        </td>

                        <td class="border px-4 py-2 font-bold {{ $investment->profit >= 0 ? 'text-green-500' : 'text-red-500' }}">
                            {{ number_format($investment->profit ?? 0, 2, ',', '.') }} €
                        </td>

                        <td class="border px-4 py-2">
                            <form action="{{ route('investments.destroy', $investment) }}" method="POST" onsubmit="return confirm ('wirklich löschen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tfoot>
                    <tr class="bg-gray-300 text-black">
                        <td colspan="5" class="text-right font-bold px-4 py-2">Gesamtgewinn:</td>
                        <td colspan="2" class="px-4 py-2 font-bold {{ $totalProfit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ number_format($totalProfit, 2, ',', '.') }} €
                        </td>
                    </tr>
                    <tr class="bg-gray-300 text-black">
                        <td colspan="5" class="text-right font-bold px-4 py-2">Gesamtwert aktuell:</td>
                        <td colspan="2" class="px-4 py-2 font-bold text-blue-700">
                            {{ number_format($totalValue, 2, ',', '.') }} €
                        </td>
                    </tr>
                </tfoot>
            </tbody>
        </table>
                    <h3 class="text-xl font-bold mt-10 mb-4">Portfolio-Diagram</h3>
                    <canvas id="portfolioChart" width="400" height="200"></canvas>
                    <script>
                        const ctx = document.getElementById('portfolioChart').getContext('2d');
                        const portfolioChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: {!! json_encode($chartData['values']) !!},
                                datasets: [{
                                    label: 'Weert in Euro',
                                    data: {!! json_encode($chartData['values']) !!},
                                    backgroundColor: {!! json_encode($chartData['profits']->map(fn($p) => $p >= 0 ? 'rgba(34,197,94,0.6)' : 'rgba(239,68,68,0.6)')) !!},
                                    borderColor: 'rgba(0,0,0,0.1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                    <div class="mt-10 bg-gray-300 text-black p-4  rounded">
                        <h3 class="text-xl font-bold mb-2">Verkaufssimulation</h3>

                        <p> Würdest du jetzt alles verkaufen, würdest du erhalten:</p>

                        <p class="text-lg font-bold text-blue-600 mt-2">
                            {{ number_format($simulatedEarnings, 2, ',', '.') }} €
                        </p>

                        <p class="mb-2">
                            Dein ursprünglicher Einsatz war:
                            <span class="font-bold">{{ number_format($simulatedEarnings - $simulatedGain, 2, ',', '.') }} € </span>
                        </p>

                        <p class="mt-2">
                            <strong class="{{ $simulatedGain >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $simulatedGain >= 0 ? '+' : '' }}{{ number_format($simulatedGain, 2, ',', '.') }} € Gewinn
                            </strong>
                        </p>
                    </div>
                 @endif
        @endsection
