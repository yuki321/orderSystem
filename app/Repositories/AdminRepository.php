<?php

namespace App\Repositories;

use App\Interfaces\AdminRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminRepository implements AdminRepositoryInterface {
    /**
     * indexメソッド
     * adminList.blade.php
     */
    public function getAllAdmins(){
        $query = DB::table("admins");

        return $query->orderBy("id")->paginate(10);
    }

    /**
     * storeメソッド
     * createAdmin.blade.php
     */
    public function getUsersWithoutAdmins(){
        // 取得したユーザーから管理者を除く
        $usersWithoutAdmins = $this->removeAdmins();
        return $usersWithoutAdmins;
    }

    public function removeAdmins(){
        // ログインユーザのIDを取得
        $exceptionalUser = Auth::id();
        // 除外するユーザID配列
        $data = [$exceptionalUser]; 

        // 管理者のデータを取得
        $admins = DB::table("admins")->get();
        // ユーザデータの取得
        $users = DB::table("users")->get();
        // ユーザーデータの中に管理者がいれば取り除く
        foreach($users as $user){
            foreach($admins as $admin){
                if($user->id == $admin->userId){
                    array_push($data, $user->name);
                }
            }
        }

        /**
         * 1. usersコレクションを配列に変換($users->toArray())
         * 2. usersArryにusersのユーザ名のみ格納する
         * 3. 2つ目のループでstdClassからstring型に変換する
         */
        $usersArry = [];
        $users = $users->toArray();

        // users配列からユーザ名のみ格納
        for($i = 0; $i < count($users); $i++){
            $userName = $users[$i]->name;
            array_push($usersArry, $userName);
        }
        // ユーザデータから管理者とログインユーザを除去する
        $usersWithoutAdmins = array_diff($usersArry, $data);

        return $usersWithoutAdmins;
    }

}




