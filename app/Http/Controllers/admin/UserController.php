<?php

namespace App\Http\Controllers\admin;


use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->orderByDesc('created_at')->paginate(15);
        //  return $users;
        return view('admin.users.show', ['users' => $users]);
    }

    public function show($id)
    {
        $user = User::query()->find($id);
        return view('admin.users.showuser', ['user' => $user]);
    }

//    public function edit($id)
//    {
//        $user = User::query()->find($id);
//        return view('admin.users.edit',compact('user'));
//    }

    public function destroy($id)
    {
        $user = User::query()->find($id);
        $fullName = $user->fullname;
        $user->delete();
        $statusMsg = $fullName . ', با موفقیت حذف گردید.';
        return back()->with('statusMsg', $statusMsg);
    }
}
