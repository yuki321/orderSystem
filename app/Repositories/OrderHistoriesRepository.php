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
        $company_name = $request->input("company_name");
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

        $query = OrderHistory::where(function($contents){
            $contents->select('id')
            ->from('order_histories')
            ->orderByDesc('order_histories.id');
        });
        
        // 検索内容の入力内容とDBを比較すて、部分一致があれば
        $query = $this->getSearchResult($query, $item_name, $company_name);

        // 発注数の上限下限を絞る
        $query = $this->searchOrderMaxMin($query, $order_max, $order_min);

        // 合計金額の上限下限を絞る
        $query = $this->searchTotalPriceMaxMin($query, $totalPrice_max, $totalPrice_min);
        
        return $query;
    }

    public function getSearchResult($query, $item_name, $company_name){
        // 検索内容の入力内容とDBを比較すて、部分一致があれば
        if($item_name){
            $query->where("items.itemName", "like", "%".$item_name."%");
        }
        if($company_name){
            $query->where("customers.companyName", "like", "%".$company_name."%");
        }

        return $query;
    }

    public function searchOrderMaxMin($query, $order_max, $order_min){
        // 発注数の下限(order_min)
        if($order_min){
            $query->where("numOfOrder", ">=", $order_min);
        }
        // 発注数の上限(order_max)
        if($order_max){
            $query->where("numOfOrder", "<=", $order_max);
        }

        return $query;
    }

    public function searchTotalPriceMaxMin($query, $totalPrice_max, $totalPrice_min){
        // 合計金額の下限(totalPrice_min)
        if($totalPrice_min){
            $query->where("totalPrice", ">=", $totalPrice_min);
        }
        // 合計金額の上限(totalPrice_max)
        if($totalPrice_max){
            $query->where("totalPrice", "<=", $totalPrice_max);
        }

        return $query;
    }




}



