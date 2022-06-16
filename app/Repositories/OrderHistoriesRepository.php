<?php

namespace App\Repositories;

use App\Interfaces\OrderHistoriesRepositoryInterface;
use App\Models\OrderHistory;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderHistoriesRepository implements OrderHistoriesRepositoryInterface {

    public function getAllOrderHistories(Request $request){

        // 検索フォームに入力された内容を取得する
        $item_name = $request->input("item_name");
        // $company_name = $request->input("company_name");
        $order_max = $request->input("order_max");
        $order_min = $request->input("order_min");
        $totalPrice_max = $request->input("totalPrice_max");
        $totalPrice_min = $request->input("totalPrice_min");

        // 上限 < 下限 の場合
        if($order_min > $order_max){
            $tmp = $order_min;
            $order_min = $order_max;
            $order_max = $tmp;
        }
        if($totalPrice_min > $totalPrice_max){
            $tmp = $totalPrice_min;
            $totalPrice_min = $totalPrice_max;
            $totalPrice_max = $tmp;
        }

        $query = orderHistory::select([
            "o.id",
            "i.itemName",
            "o.numOfOrder",
            "o.totalPrice"
        ])
        ->from("order_histories as o")
        ->join("items as i", function($join){
            $join->on("o.itemId", "=", "i.id");
        });
        // ->orderBy("o.id")
        // ->paginate(20);
        
        // 検索内容の入力内容とDBを比較すて、部分一致があれば
        if($item_name){
            $query->where("itemName", "like", "%" .$item_name."%");        
        }

        // 発注数の下限(order_min)
        if($order_min){
            $query->where("numOfOrder", ">=", $order_min);
        }
        // 発注数の上限(order_max)
        if($order_max){
            $query->where("numOfOrder", "<=", $order_max);
        }

        // 合計金額の下限(totalPrice_min)
        if($totalPrice_min){
            $query->where("totalPrice", ">=", $totalPrice_min);
        }
        // 合計金額の上限(totalPrice_max)
        if($totalPrice_max){
            $query->where("totalPrice", "<=", $totalPrice_max);
        }
        
        return $query->orderBy("o.id")
        ->paginate(20);
    }
    


}



