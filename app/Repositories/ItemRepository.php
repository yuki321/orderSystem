<?php

namespace App\Repositories;

use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemRepository implements ItemRepositoryInterface {

    public function getAllItems(Request $request){

        // 検索フォームに入力された内容を取得する
        $search = $request->input("search");

        $query = DB::table("items");

        if($search){
            // 検索内容の入力内容とDBを比較すて、部分一致があれば
            $query->where("itemName", "like", "%".$search."%");
        }
        
        return $query->orderBy("id")->paginate(20);
    }

}

