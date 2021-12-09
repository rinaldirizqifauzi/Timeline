<?php

namespace App\Http\Controllers;


use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
  
    public function following(User $user)
    {
        return view('users.following', [
            'following' => $user->follows,
            'user' => $user,
        ]); 
    }


    public function follower(User $user)
    {

        return view('users.following', [
            'following' => $user->followers,
            'user' => $user,
        ]); 
        
    }

    public function store(User $user)
    {
        if (Auth::user()->hasFollow($user)) {

            Auth::user()->unfollow($user);

        }else {

            Auth::user()->follow($user);
        }

       return back()->with("Success", "You are follow the user!");
    }
}
