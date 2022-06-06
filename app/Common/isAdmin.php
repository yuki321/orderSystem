<?php

namespace App\Common;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class isAdmin{
    public static function isAdmin(){
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

        return $isAdmin;
    }

}




