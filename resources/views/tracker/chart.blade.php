@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Kurse (letzte 7 Tage)</h2>

    <canvas id="coinChart" width="600" height="300"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('coinChart').getContext('2d');

        const chart = new Chart(ctx,
        {
            type: 'line',
            data:{
                labels: {!!  json_encode($labels) !!},
                datasets: [{
                    label: 'Bitcoin (EUR)',
                    data: {!! json_encode($prices) !!},
                    borderColor: 'rgba(34,197,94,0.8)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options:{
                responsive: true,
                scales:{
                    y: {
                        beginAtZero: false
                    }
                }
            }
        })
    </script>
@endsection
