<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KhcModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if(!auth()->user()->khc_model->users)
        {
            abort(403);
        }
        $users = User::all();
        return view('admin.users.index',compact('users'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->permission->create_user)
        {
            abort(403);
        }
        
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {   

       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);

        $khcmodel = new KhcModel([
            'users' => 0,
            'posts' => 0,
            'tags' => 0,
            'ads' => 0,
            'slider' => 0,
        ]);
        $user->khc_model()->save($khcmodel);
        $user->permission()->create([
            //user
            'create_user' => 0,
            'view_user' => 0,
            'edit_user' => 0,
            'delete_user' => 0,
            //post
            'create_post' => 0,
            'view_post' => 0,
            'edit_post' => 0,
            'delete_post' => 0,
            //tag
            'create_tag' => 0,
            'edit_tag' => 0,
            'delete_tag' => 0,
            //ads
            'create_ads' => 0,
            'view_ads' => 0,
            'edit_ads' => 0,
            'delete_ads' => 0,
            //slider
            'create_slider' => 0,
            'view_slider' => 0,
            'edit_slider' => 0,
            'delete_slider' => 0,
        ]);

        return redirect()->route('users.index')->with('success','User created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(!auth()->user()->permission->view_user)
        {
            abort(403);
        }
        if($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name != "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"Trying to edit super admin user, contact administrator for help!");
        }
        return view('admin.users.edit',compact('user'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
            
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                
            ]);
            return redirect()->back()->with('message','User updated');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(!auth()->user()->permission->delete_user)
        {
            abort(403);
        }

        if($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name != "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"Trying to delete administrator user, for help contact administrator.");
        }
        elseif($user->name == "Mohammad Mahdi Hedayat" && auth()->user()->name == "Mohammad Mahdi Hedayat")
        {
            return redirect()->back()->with('warning',"Trying to delete administrator user, for help contact administrator.");
        }
        $user->delete();
        return redirect()->back()->with('danger','User deleted');
    }
}
