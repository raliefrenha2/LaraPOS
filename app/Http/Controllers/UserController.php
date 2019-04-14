<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Requests\UserRequest as UserRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('users.create', compact('role'));
    }

    public function store(UserRequest $request)
    {
        $user = User::firstOrCreate($request->except('role','_token'),['status' => true]);

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Ditambahkan']);
    }

    public function edit(User $user)
    {
        
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        if (empty($request['password'])) {
            unset($request['password']);
        }

        // $password = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update($request->input());
        // dd($user);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Diperbaharui']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }

    public function roles(Request $request, User $user)
    {
        $roles = Role::all()->pluck('name');
        return view('users.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, User $user)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        //menggunakan syncRoles agar terlebih dahulu menghapus semua role yang dimiliki
        //kemudian di-set kembali agar tidak terjadi duplicate
        $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => 'Role Sudah Di Set']);
    }


    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        // Mengambil data role
        $roles = Role::all()->pluck('name');
        //apabila parameter role terpenuhi
        if (!empty($role)) {
            //select role berdasarkan namenya, ini sejenis dengan method find()
            $getRole = Role::findByName($role);
            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = User::hasPermission($getRole->id)->get()->pluck('name')->all();
            //Mengambil data permission
            $permissions = Permission::all()->pluck('name');
        }
        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        //select role berdasarkan namanya
        $role = Role::findByName($role);

        //fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
        //kemudian di-assign kembali sehingga tidak terjadi duplicate data
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }
}
