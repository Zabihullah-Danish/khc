<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permissions(User $user)
    {
        return view('admin.permissions.index',compact('user'));
    }
}
