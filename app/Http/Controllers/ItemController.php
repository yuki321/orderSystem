<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Interfaces\ItemRepositoryInterface;
use App\Models\Item;
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

        return view("item.item")
        ->with("items", $items);
    }


}
