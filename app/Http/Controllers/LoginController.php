<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
        /////////// GET VIEWS
        public function getLogin()
        {
                return view('auth.login', ['no_categories' => true]);
        }

        public function getRegister()
        {
                return view('auth.register', ['no_categories' => true]);
        }
        /////////// AUTHENTICATION
        
}
