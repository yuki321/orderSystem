<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Interfaces\AdminRepositoryInterface;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
     * @param  \App\Http\Requests\StoreAdminRequest  $request
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

        $admin = new Admin();
        $admin->userId = Auth::id();
        $admin->adminName = $request->adminName;

        // 権限を算出
        $admin->admin = 0;
        if($request->authentication) $admin->admin = $admin->admin + 4;
        if($request->setting) $admin->admin = $admin->admin + 2;
        if($request->delOrderHistory) $admin->admin = $admin->admin + 1;
        
        $admin->save();

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
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
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

        $admin = Admin::find($request->id);

        // 権限の編集   
        $total = 0;
        if(isset($request->authentication) | isset($request->setting) | isset($request->delOrderHistory)){
            $total = (int)$request->authentication + (int)$request->setting + (int)$request->delOrderHistory;
        }

        $admin->adminName = $request->adminName;
        $admin->admin = $total;
        $admin->save();

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
