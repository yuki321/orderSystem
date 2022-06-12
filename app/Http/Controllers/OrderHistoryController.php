<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderHistoryRequest;
use App\Http\Requests\UpdateOrderHistoryRequest;
use App\Interfaces\OrderHistoriesRepositoryInterface;
use App\Models\OrderHistory;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;

class OrderHistoryController extends Controller
{
    private OrderHistoriesRepositoryInterface $orderHistoriesRepository;
    public function __construct(OrderHistoriesRepositoryInterface $orderHistoriesRepository)
    {
        $this->orderHistoriesRepository = $orderHistoriesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // OrderHistoryテーブルからデータを取得
        $contents = $this->orderHistoriesRepository->getAllOrderHistories($request);

        return view("orderHistory.orderHistory")
        // ->with("contents", $contents->paginate(20));
        ->with("contents", $contents);

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
     * @param  \App\Http\Requests\StoreOrderHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function show(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderHistory $orderHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderHistoryRequest  $request
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderHistoryRequest $request, OrderHistory $orderHistory)
    {
        //
    }

    public function delete(string $id){

        // 発注履歴テーブルからデータを取得
        $orderHistory = OrderHistory::find($id);

        // 商品テーブルのIDと発注履歴テーブルのItemIdが一致するデータを取得
        $item = Item::whereId($orderHistory->itemId)->first();

        // 顧客テーブルのIDと発注履歴テーブルのItemIdが一致するデータを取得
        $customer = Customer::whereId($orderHistory->customerId)->first();

        return view("orderHistory.deleteOrderHistories")
        ->with("orderHistory", $orderHistory)
        ->with("customer", $customer)
        ->with("item", $item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        OrderHistory::find($request->id)->delete();
        return redirect("/orderHistory");
    }
}
