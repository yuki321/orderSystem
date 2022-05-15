<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface OrderHistoriesRepositoryInterface {

    public function getAllOrderHistories(Request $request);

}




