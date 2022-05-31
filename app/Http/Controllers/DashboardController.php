<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // adminsテーブルからデータを取得
        $admins = DB::table("admins")->get();
        // ログインユーザのID
        $userId = Auth::id();

        /**
         * ログインユーザのIDとadmin IDが
         * 一致すれば、管理者機能へのリンクが
         * 画面に表示される。
         * 
         */
        $isAdmin = false;
        foreach($admins as $admin){
            if($userId == $admin->userId) $isAdmin = true;
        }

        return view("dashboard")
                ->with("isAdmin", $isAdmin);
        // ->with("users", $users)
        // ->with("admins", $admins);

    }



}
