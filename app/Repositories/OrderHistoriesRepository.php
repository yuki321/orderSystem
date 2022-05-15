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
        // $search = $request->input("search");
        $max = $request->input("max");
        $min = $request->input("min");

        if($min > $max){
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

        $query = OrderHistory::orderBy("order_histories.id");
        
        // // 検索内容の入力内容とDBを比較すて、部分一致があれば
        // if($search){
        //     $query->where("itemName", "like", "%".$search."%");
        // }
        // // 単価の下限(min)
        if($min){
            $query->where("unitPrice", ">=", $min);
        }
        // // 単価の上限(max)
        if($max){
            $query->where("unitPrice", "<=", $max);
        }
        
        // return $query->orderBy("id")->paginate(20);
        return $query;
    }

    public function getItemName(Request $request)
    {
        $itemNames = DB::table("order_histories")
        ->join("items", "order_histories.itemId", "=", "items.id")
        ->select("items.itemName")
        ->get();

        return $itemNames;
    }

    public function getCompanyName(Request $request)
    {
        $companyNames = DB::table("order_histories")
        ->join("customers", "order_histories.customerId", "=", "customers.id")
        ->select("customers.companyName")
        ->get();

        return $companyNames;
    }






}



