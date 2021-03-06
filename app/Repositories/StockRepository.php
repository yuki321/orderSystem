<?php

namespace App\Repositories;

use App\Interfaces\StockRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class StockRepository implements StockRepositoryInterface {

    public function getAllstocks(Request $request){

        // 検索フォームに入力された内容を取得する
        $search = $request->input("search");
        
        $max = $request->input("max");
        $min = $request->input("min");

        if($min > $max){
            $tmp = $min;
            $min = $max;
            $max = $tmp;
        }

       $query = Stock::where(function($contents){
            $contents->select('id')
            ->from('stocks')
            ->orderByDesc('stocks.id');
        });

        // 検索内容の入力内容とDBを比較して、部分一致があれば
        if($search){
            $query->where("itemName", "like", "%".$search."%");
        }
        // 実在庫数の下限(min)
        if($min){
            $query->where("actualStock", ">=", $min);
        }
        
        // 実在庫数の上限(max)
        if($max){
            $query->where("actualStock", "<=", $max);
        }
                
         return $query;
    }

    /**
     * updateメソッド(StockController)
     */
    public function updateStockInfo(Request $request){
        $stock = Stock::find($request->id);

        $stock->minStock = $request->minStock;
        $stock->save();
    }


}

