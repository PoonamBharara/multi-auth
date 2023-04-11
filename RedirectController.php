<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class RedirectController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function adminHome(){
        return view('admin');
    }

    public function managerHome(){
        return view('manager');
    }
}
