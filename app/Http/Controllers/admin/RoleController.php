<?php

namespace App\Http\Controllers\admin;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->latest()->paginate(25);
        return view('admin.role.index', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'role' => 'required|string|unique:roles',
            'label' => ['required', 'string'],
        ], [

        ], [
            'role' => 'عنوان نقش',
            'label' => 'توضیحات',
        ]);

        if ($valid->passes()) {
            Role::insert([
                'role' => $request->role,
                'label' => $request->label,
            ]);
            $role = Role::whereRole($request->role)->first();
            return response([
                'status' => 'نقش با موفقیت، ذخیره شد.',
                'roleId' => $role->id,
                'roleCounter' => Role::all()->count(),
                'roleName' => $role->role,
                'roleLabel' => $role->label,
                'roleDeleteUrl' => '/admin/roles/' . $role->id,
            ], 200);
        } else {  //  data dose not validation
            return response([
                'errors' => $valid->errors()->all(),
            ], 200); //  422 نمیزارم، چون میخام وارد قسمت success ایجکس بشه.
        }
    }

    public function rolesAddPermissionCreate()
    {
        $roles = Role::all()->filter(function ($value, $key) {
            return ($value->permissions()->count() <= 0);
        });
        $permissions = Permission::all();

        return view('admin.role.create', compact(['roles', 'permissions']));
    }

    public function rolesAddPermissionStore(Request $request)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'role' => 'required',
            'permission' => ['required'],
        ], [], [
            'role' => 'عنوان نقش',
            'permission' => 'عنوان مسئولیت',
        ]);

        if ($valid->passes()) {
            Role::find($request->role)->permissions()->sync($request->permission);


            return response([
                'status' => 'مسئولیت‌ها با موفقیت، به نقش، اضافه شدند.'
            ], 200);
        } else {  //  data dose not validation
            return response([
                'errors' => $valid->errors()->all(),
            ], 200); //  422 نمیزارم، چون میخام وارد قسمت success ایجکس بشه.
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.update', compact(['role', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function rolesPermissionUpdate(Request $request, Role $role)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'role' => 'required',
            'label' => 'required',
            'permission' => ['required'],
        ], [], [
            'role' => 'عنوان نقش',
            'label' => 'توضیح نقش',
            'permission' => 'عنوان مسئولیت',
        ]);

        if ($valid->passes()) {
            $role->update([
                'role' => $request->role,
                'label' => $request->label
            ]);

            $role->permissions()->sync($request->permission);

            return response([
                'status' => 'نقش مورد نظر، بروزرسانی گردید.'
            ], 200);
        } else {  //  data dose not validation
            return response([
                'errors' => $valid->errors()->all(),
            ], 200); //  422 نمیزارم، چون میخام وارد قسمت success ایجکس بشه.
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($roleId)
    {
        DB::beginTransaction();
        try {
            DB::table('permission_role')->where('role_id', $roleId)->delete();
            DB::table('role_user')->where('role_id', $roleId)->delete();
            DB::table('roles')->where('id', $roleId)->delete();
            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
        return back();
    }
}
