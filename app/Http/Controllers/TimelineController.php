<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\User;


class TimelineController extends Controller
{
    public function __invoke(Request $request)
    
    {
        $statuses = Auth::user()->timeline();
        return view('timeline', compact('statuses'));
    }
    
    
}
