<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PageController extends Controller
{
    public function welcomePage(){
        return view('welcome');
    }

    public function template(){
        return view('layouts.template');
    }

    public function dashboardPage()
    {
        return view('dashboard');
    }

    public function getUserAuth(Request $request) {
        return $request->user();
    }
}
