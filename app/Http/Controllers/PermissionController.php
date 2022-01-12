<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permission()
    {
        Permission::create([
            'name' => 'edit user',
        ]);
    }
}
