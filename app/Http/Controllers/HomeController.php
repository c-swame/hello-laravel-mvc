<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {

            $userRole=Auth()->user()->role;

            if($userRole=='admin')
            {
                return view('admin.home');
            }
            else
            {
                return view('home');
            }
        }
        
    }
}
