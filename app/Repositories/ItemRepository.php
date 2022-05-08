<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use Illuminate\Support\Facades\DB;

class ItemRepository implements ItemRepositoryInterface {

    public function getAllItems(){
        // return Item::all();
        return DB::table("items")->orderBy("id")->paginate(20);
    }


}

