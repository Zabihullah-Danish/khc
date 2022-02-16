<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KhcModel;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhcModelController extends Controller
{
    public function index(User $user)
    {
        if(!auth()->user()->is_admin)
        {
            abort(403);
        }

        $permissionId = $user->permission->id;
        $modelId = $user->khc_model->id;
        $permission = Permission::find($permissionId);
        $model = KhcModel::find($modelId);
        // dd($model);
        return view('admin.permissions.index',compact('model','user','permission'));
    }


    public function updateKhcModel(Request $request,KhcModel $model)
    {   
        if($model->user->name == "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"This is super administrator user has full access to all models!");
        }
        $model->update([
            'users' => $request->users ?? 0,
            'posts' => $request->posts ?? 0,
            'tags' => $request->tags ?? 0,
            'ads' => $request->ads ?? 0,
            'slider' => $request->slider ?? 0,
        ]);

        return redirect()->back()->with('success','Models Access Updated Successfully');
    }

    public function userLevelUpdate(Request $request,User $user)
    {
        
        if($user->name == "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"You're trying to change Super administrator user level, contact administrator!");
        }
        $user->update([
            'is_admin' => $request->admin,
        ]);

        return redirect()->back()->with('success','User Level Updated Successfully.');
    }

    public function updateModelsPermission(Request $request,User $user)
    {
        if($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name != "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"You're trying to change Super administrator user permission, for help contact administrator!");
        }
        elseif($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name == "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"You have to access to all models and permissions!");
        }
        
        $user->permission->update([
             //user
             'create_user' => $request->create_user ?? 0,
             'view_user' => $request->view_user ?? 0,
             'edit_user' => $request->edit_user ?? 0,
             'delete_user' => $request->delete_user ?? 0,
             //post
             'create_post' => $request->create_post ?? 0,
             'view_post' => $request->view_post ?? 0,
             'edit_post' => $request->edit_post ?? 0,
             'delete_post' => $request->delete_post ?? 0,
             //tag
             'create_tag' => $request->create_tag ?? 0,
             'edit_tag' => $request->edit_tag ?? 0,
             'delete_tag' => $request->delete_tag ?? 0,
             //ads
             'create_ads' => $request->create_ads ?? 0,
             'view_ads' => $request->view_ads ?? 0,
             'edit_ads' => $request->edit_ads ?? 0,
             'delete_ads' => $request->delete_ads ?? 0,
             //slider
             'create_slider' => $request->create_slider ?? 0,
             'view_slider' => $request->view_slider ?? 0,
             'edit_slider' => $request->edit_slider ?? 0,
             'delete_slider' => $request->delete_slider ?? 0,
        ]);

        return redirect()->back()->with('success','Models Permission Updated Successfully.');

    }

    public function userStatus(Request $request,User $user)
    {
        if($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name != "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"This is Super Admin user, can't block anyone this user!");
        }
        elseif($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name == "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"This is Super Admin user, can't block anyone this user!");
        }
        $user->blocked = $request->blocked;
        $user->save();
        return redirect()->back()->with('success','User Status Updated Successfully.');
    }

    

    
}
