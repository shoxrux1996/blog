<?php

namespace yuridik\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use yuridik\Admin;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('isAdmin');
    }

    public function moderatorList()
    {
        $moderators = Admin::where('type', 0)->get();
        return view('admin.moderators')->withModerators($moderators);
    }
    public function moderatorCreate(){
        return view('admin.moderator-create');
    }
    public function moderatorStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);
        $admin = new Admin;
        $admin->email = $request->email;
        $admin->name = $request->name;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.moderators.index');
    }

    public function moderatorDelete($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->blogs()->delete();
        $admin->delete();
        Session::flash('message', 'Moderator was deleted successfully');
        return redirect()->back();
    }
    public function moderatorEdit($id){
        $admin = Admin::findOrFail($id);
        return view('admin.moderator-edit')->withModerator($admin);
    }
    public function moderatorUpdate(Request $request, $id){
        $admin = Admin::findOrFail($id);
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:admins,email,'.$id,
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.moderators.index');
    }

}
