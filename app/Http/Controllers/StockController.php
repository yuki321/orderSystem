<?php

namespace App\Http\Controllers;

use App\Common\isAdmin;
use App\Http\Requests\StoreStockRequest;
use App\Http\Requests\UpdateStockRequest;

use App\Interfaces\StockRepositoryInterface;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{

    private StockRepositoryInterface $stockRepository;
    public function __construct(StockRepositoryInterface $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request;
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stocks = $this->stockRepository->getAllStocks($request);
        $contents = $stocks->join("items", "stocks.itemId", "=", "items.id");

        // ログインユーザが管理者か確認 
        $isAdmin = isAdmin::isAdmin();

        return view("stock.stock")
        ->with("contents", $contents->paginate(20))
        ->with("isAdmin", $isAdmin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStockRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $stock = Stock::where("itemId", "=", $id)->first();
        // 在庫テーブルと商品テーブルをjoin
        $contents = $stock->join("items", "stocks.itemId", "=", "items.id");

        return view("stock.stockLowerLimit")
        ->with("stock", $stock)
        ->with("contents", $contents->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {      
        $this->stockRepository->updateStockInfo($request);

        return redirect("/stock");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
