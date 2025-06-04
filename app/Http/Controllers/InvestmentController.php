<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investment;
use App\Helpers\CryptoHelper;
use App\Helpers\NewsHelper;


class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $investments = Investment::all()->map(function ($inv) {
            $price = CryptoHelper::getCurrentPrice($inv->coin_symbol);

            // Debug-Log falls Preis null
            if ($price === null) {
                logger('❌ Kein Preis für: ' . $inv->coin_symbol);
            }

            $inv->current_price = $price;
            $inv->current_value = $price * $inv->amount;
            $inv->profit = ($price - $inv->buy_price) * $inv->amount;

            return $inv;
        });

        $totalProfit = $investments->sum('profit');
        $totalValue = $investments->sum('current_value');
        $totalBuyValue = $investments->sum(function($inv) {
            return $inv->buy_price * $inv->amount;
        });
        $simulatedEarnings = $totalValue; // was du bekommen würdest
        $simulatedGain = $simulatedEarnings - $totalBuyValue;


        $chartData = [
            'labels' => $investments->pluck('coin_symbol'),
            'values' => $investments->pluck('current_value'),
            'profits' => $investments->pluck('profit'),
        ];

        $news = NewsHelper::getLatestNews();

        return view('investments.index', [
            'investments' => $investments,
            'totalProfit' => $totalProfit,
            'totalValue' => $totalValue,
            'chartData' => $chartData,
            'simulatedEarnings' => $simulatedEarnings,
            'simulatedGain' => $simulatedGain,
            'news' => $news
        ]);

        // @dd($news);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('investments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coin_symbol' => 'required|string|max:10',
            'amount' => 'required|numeric|min:0',
            'buy_price' => 'required|numeric|min:0',
            'target_price' => 'nullable|numeric|min:0',
        ]);
        Investment::create($request->only('coin_symbol', 'amount', 'buy_price', 'target_price'));
        return redirect()->route('investments.index')->with('success', 'Investition gespeichert.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Investment $investment)
    {
        $investment->delete();
        return redirect()->route('investments.index')->with('success', 'Investition gelöscht.');

    }
}
