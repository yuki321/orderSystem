<?php

namespace App\Http\Controllers;

use App\Common\isAdmin;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // ログインユーザが管理者か確認 
        $isAdmin = isAdmin::isAdmin();

        return view("dashboard")
                ->with("isAdmin", $isAdmin);

    }



}
