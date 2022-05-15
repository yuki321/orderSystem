<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderHistoryRequest;
use App\Http\Requests\UpdateOrderHistoryRequest;
use App\Interfaces\OrderHistoriesRepositoryInterface;
use App\Models\OrderHistory;
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
        $orderHistories = $this->orderHistoriesRepository->getAllOrderHistories($request);

        $contents = $orderHistories->join("items", "order_histories.itemId", "=", "items.id")
        ->get();
        $contents = $orderHistories->join("customers", "order_histories.customerId", "=", "customers.id")
        ->get();

        return view("orderHistory.orderHistory")
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderHistory  $orderHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderHistory $orderHistory)
    {
        //
    }
}
