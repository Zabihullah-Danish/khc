<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\KhcModel;

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
        if($user->name === "Zabihullah Danish" && !auth()->user()->is_admin)
        {
            abort(403);
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
        if($user->name === "Zabihullah Danish" && !auth()->user()->is_admin || auth()->user()->is_admin)
        {
            return redirect()->back()->with('warning',"Trying to delete administrator user, for help contact administrator.");
        }
        $user->delete();
        return redirect()->back()->with('danger','User deleted');
    }
}
