<?php

namespace App\Http\Controllers;

use App\Common\isAdmin;
use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
use App\Models\OrderHistory;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    private ItemRepositoryInterface $itemRepository;

    public function __construct(ItemRepositoryInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = $this->itemRepository->getAllItems($request);

        $isAdmin = isAdmin::isAdmin();

        return view("item.item")
        ->with("items", $items)
        ->with("isAdmin", $isAdmin);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view("item.itemOrder")
        ->with("item", $item);
    }

    public function order(Request $request)
    {
        $this->itemRepository->order($request);

        return redirect("/orderHistory");
    }


}
