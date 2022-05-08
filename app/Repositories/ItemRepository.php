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
        $max = $request->input("max");
        $min = $request->input("min");

        if($min > $max){
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        $query = DB::table("items");

        // 検索内容の入力内容とDBを比較すて、部分一致があれば
        if($search){
            $query->where("itemName", "like", "%".$search."%");
        }
        // 単価の下限(min)
        if($min){
            $query->where("unitPrice", ">=", $min);
        }
        // 単価の上限(max)
        if($max){
            $query->where("unitPrice", "<=", $max);
        }
        
        return $query->orderBy("id")->paginate(20);
    }

}

