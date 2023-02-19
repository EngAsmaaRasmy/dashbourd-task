<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\AdminRequest;
use App\Http\Requests\admin\LoginRequest;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function showAdminLoginForm()
    {
        return view("admin.login");  
    }
    public function showHome()
    {
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        return view("admin.home", compact('totalCategories', 'totalProducts'));
    }

    public function adminLogin(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return  redirect()->route("admin.home");
        } else {
            return back()->withErrors(['error' => trans('admin/messages.not_found')])->withInput($request->all());
        }
    }

    public function getEditForm()
    {
        $admin = Admin::find(Auth::id());
        return view("admin.editProfile", compact('admin'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route("get-admin-login");
    }

    public function index(Request $request)
    {
        $admins = Admin::paginate(15);
        return view("admin.admins.index", compact("admins"));
    }

    public function create()
    {
        return view('admin.admins.add');
    }

    public function store(AdminRequest $request)
    {
        $password = Hash::make($request->input("password"));
        $admin = Admin::create([
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password" => $password,
        ]);
        session()->flash('add');
        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $admin = Admin::find($id);
        $admin->update($input);

        session()->flash('edit');
        return redirect()->route('admins.index');
    }
}
