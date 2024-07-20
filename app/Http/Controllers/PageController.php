<?php

namespace App\Http\Controllers;
use Illuminate\View\View;

class PageController extends Controller
{
    public function welcomePage(){
        return view('welcome');
    }

    public function dashboardPage()
    {
        return view('dashboard');
    }

    public function getUserAuth (Request $request) {
        return $request->user();
    }
}
