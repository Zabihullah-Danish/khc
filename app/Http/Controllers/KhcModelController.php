<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KhcModel;
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
        $models = KhcModel::where('user_id',$user->id)->get();
        return view('admin.permissions.index',compact('models','user'));
    }

    

    public function createKhcModel(User $user)
    {

        return view('admin.permissions.create',compact('user'));
        
        
    }

    public function storeKhcModel(Request $request,$id)
    {
        // dd($request->all());
        KhcModel::create([
            'user_id' => $id,
            'users' => $request->users ?? 0,
            'posts' => $request->posts ?? 0,
            'tags' => $request->tags ?? 0,
            'ads' => $request->ads ?? 0,
            'slider' => $request->slider ?? 0,
        ]);

        return redirect()->route('permissions.index',$id)->with('success','Model Access set successfull.');
    }

    public function editKhcModel(KhcModel $model)
    {
        if($model->user->id == 1)
        {
            return redirect()->back()->with('warning',"You're Administrator, you have full access to anything what do you want!");
        }

        return view('admin.permissions.edit',compact('model'));
    }

    public function updateKhcModel(Request $request,KhcModel $model)
    {   
        // dd($request->all());
        $model->update([
            'users' => $request->users ?? 0,
            'posts' => $request->posts ?? 0,
            'tags' => $request->tags ?? 0,
            'ads' => $request->ads ?? 0,
            'slider' => $request->slider ?? 0,
        ]);

        return redirect()->route('permissions.index',$model->user->id)->with('success','Updated Successfully');
    }

    

    
}
