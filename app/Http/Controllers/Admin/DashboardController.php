<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function registered(){
        $users=User::all();
        return view('admin.register',compact('users'));
    }
    public function registeredEdit(Request $request,$id)
    {
        $users=User::findorFail($id);
        return view('admin.register-edit',compact('users'));
    }
    public function registeredUpdate(Request $request,$id)
    {
        $users=User::find($id);
        $users->name=$request->input('name');
        $users->usertype=$request->input('usertype');
        $users->update();
        return redirect('/role-register')->with('status','Your Data is Updated');

    }
    public function registeredDelete(Request $request, $id)
    {
        $users=User::findorFail($id);
        $users->delete();
        return redirect('/role-register')->with('status','One User is Deleted');

    }
}
