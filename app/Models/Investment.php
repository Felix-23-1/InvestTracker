<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Investment extends Model
{
    protected $fillable =['coin_symbol', 'amount', 'buy_price', 'target_price'];
}
