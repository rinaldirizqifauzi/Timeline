<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreUserController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        return view('users.index',[
            'user' => $user,
           'users' => User::latest()->simplePaginate(8), 
        ]);
    }
}
