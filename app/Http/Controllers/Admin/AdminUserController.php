<?php

namespace yuridik\Http\Controllers\Admin;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');
        return $this->middleware('isAdmin');
    }

    public function moderatorList(){
        return view('moderator.list');
    }
    public function moderatorStore(Request $request){
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:clients|unique:lawyers',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);
        $admin = new Admin;
        $admin->email = $request->email;
        $admin->name =$request->name;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back();
    }
    public function moderatorDelete($id){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Session::flash('message', 'Moderator was deleted successfully');
        return redirect()->back();
    }

    public function adminList(){
        return view('admin.list');
    }
    public function adminStore(Request $request){
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:clients|unique:lawyers',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);
        $admin = new Admin;
        $admin->email = $request->email;
        $admin->name =$request->name;
        $admin->password = Hash::make($request->password);
        $admin->type = 1;
        $admin->save();
        Session::flash('message', 'New admin was added successfully');
        return redirect()->back();
    }
    public function adminDelete($id){
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Session::flash('message', 'Admin was deleted successfully');
        return redirect()->back();
    }
    public function admins(){
        $moderators = Admin::where('type', 0);
        $admins = Admin::where('type', 1);

        return view('admin.user.list')->withModerators($moderators)->withAdmin($admins);
    }
}
