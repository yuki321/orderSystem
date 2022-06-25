<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ItemRepositoryInterface {

    public function getAllItems(Request $request);
    public function order(Request $request);
    public function calcTotalPrice(Request $request);

}


