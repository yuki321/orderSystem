<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderHistoriesRepositoryInterface {

    public function getAllOrderHistories(Request $request);
    public function getItemName(Request $request);
    public function getCompanyName(Request $request);

}




