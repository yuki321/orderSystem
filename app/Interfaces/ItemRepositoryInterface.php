<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ItemRepositoryInterface {

    public function getAllItems(Request $request);

}


