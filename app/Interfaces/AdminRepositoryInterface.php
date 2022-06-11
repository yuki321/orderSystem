<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminRepositoryInterface {
    public function getAllAdmins();
    public function getUsersWithoutAdmins();
    public function updateAdmin(Request $request);
    public function storeAdmin(Request $request);

}