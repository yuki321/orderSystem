<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface StockRepositoryInterface {

    public function getAllStocks(Request $request);
    public function updateStockInfo(Request $request);

}


