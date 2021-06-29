<?php

namespace App\Http\Controllers\admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LevelManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(3119)->hasRole();
        $users = User::all();
        $users = $users->filter(function ($value, $key) {
            return $value->hasRole();
        });
        return view('admin.userManage.index', compact('users'));
    }

    public function usersAddRolesCreate()
    {
        $users = User::all();
        $roles = Role::all();

        return view('admin.userManage.create', compact(['users', 'roles']));
    }

    public function usersAddRolesStore(Request $request)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'user' => 'required',
            'role' => ['required'],
        ], [], [
            'user' => 'کاربر',
            'role' => 'عنوان نقش',
        ]);

        if ($valid->passes()) {
            $user = User::find($request->user);
            $user->update([
                'type' => 'admin',
            ]);
            $user->roles()->sync($request->role);


            return response([
                'status' => 'نقش با موفقیت، به کاربر، اضافه شد.'
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
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.userManage.update', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function usersRoleUpdate(Request $request, User $user)
    {
        // از این نوع ولیدیشن وقتی استفاده میکنیم ک از ایجکس استفاده کرده باشیم.
        $valid = Validator::make($request->except('_token'), [
            'user' => 'required',
            'role' => 'required',
        ], [], [
            'user' => 'کاربر',
            'role' => 'عنوان نقش',
        ]);

        if ($valid->passes()) {
            $user->roles()->sync($request->role);

            return response([
                'status' => 'با موفقیت، بروزرسانی گردید.',
                'roleId' => $request->role,
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
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->update([
            'type' => 'user',
        ]);
        return back();
    }
}
