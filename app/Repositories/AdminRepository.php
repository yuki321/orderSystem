<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AdminRepository implements AdminRepositoryInterface {
    public function getAllAdmins(Request $request){
        $query = DB::table("admins");

        return $query->orderBy("id")->paginate(10);
    }


}




