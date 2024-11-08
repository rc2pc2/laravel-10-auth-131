<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view("admin.users.index", compact("users"));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("admin.users.show", compact("user"));
    }

}
