<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private AdminRepositoryInterface $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = $this->adminRepository->getAllAdmins();
        
        return view("admin.adminList")
        ->with("admins", $admins);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);
        return view("admin.adminDetail")
        ->with("admin", $admin);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 管理者以外とログインユーザーを取得
        $usersWithoutAdmins = $this->adminRepository->getUsersWithoutAdmins();

        return view("admin.createAdmin")
        ->with("usersWithoutAdmins", $usersWithoutAdmins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validator =  Validator::make($request->all());

        // if($validator->fails()){
        //     return redirect("/createAdmin")
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        $this->adminRepository->storeAdmin($request);

        return redirect("/adminList");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $admin = Admin::find($id);
        return view("admin.editAdmin")
        ->with("admin", $admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $validator =  Validator::make($request->all());

        // if($validator->fails()){
        //     return redirect("/editAdmin")
        //     ->withErrors($validator)
        //     ->withInput();
        // }

        $this->adminRepository->updateAdmin($request);

        return redirect("/adminList");
    }

    public function delete(string $id){
        $admin = Admin::find($id);
        return view("admin.deleteAdmin")
        ->with("admin", $admin);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Admin::find($request->id)->delete();
        return redirect("/adminList");
    }
}
