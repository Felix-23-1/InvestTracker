<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvestmentController;
use Illuminate\Support\Facades\Session;
use App\Helpers\NewsHelper;
use Illuminate\Support\Facades\Http;


Route::get('/', function () {
    return view('welcome');
});

//Inverstment Route für die CRUD-Operationen
Route::resource('investments', InvestmentController::class);


//News Route für nachrichten abfrage

Route::get('/news', function () {
    $news = NewsHelper::getLatestNews();
    Session::put('news_items', $news); // wichtig für Detailansicht
    return view('Nachrichten.news', ['news' => $news]);
})->name('news.index');

Route::get('/news/view/{index}', function ($index) {
    $items = Session::get('news_items');
    $news = $items[$index] ?? null;

    if (!$news) {
        abort(404);
    }

    return view('Nachrichten.show', ['news' => $news]);
})->name('news.show');



//Route für den Tracker

Route::get('/tracker',function(){
    $response = Http::get('https://api.coingecko.com/api/v3/coins/bitcoin/market_chart', [
        'vs_currency' => 'eur',
        'days' => '1',
    ]);

    $data = $response->json();
    // dd($data);


    $labels =[];
    $prices =[];

    foreach ($data['prices'] as $entry) {
        $labels[] = \Carbon\Carbon::createFromTimestampMs($entry[0])->format('d.m');
        $prices[] = round($entry[1],2);
    }

    return view('tracker.chart' , [
        'labels' => $labels,
        'prices' => $prices,
    ]);

})->name('tracker');

//Route für die Marktübersicht

Route::get('/market',function(){
    $response = Http::get('https://api.coingecko.com/api/v3/coins/markets', [
        'vs_currency' => 'eur',
        'order' => 'market_cap_desc',
        'per_page' => 100,
        'page' => 1,
        'sparkline' => false,
        'price_change_percentage' => '1h,24h,7d',
    ]);

    $coins = $response->json();

    return view('market.index', ['coins' => $coins]);
})->name('market.index');
