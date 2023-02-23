<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{


    public function getLogin()
    {

    	return view('login', [
            'login' => true
    	]);
    }

    public function getRegister()
    {

    	return view('register', [
            'register' => true
    	]);
    }
}
