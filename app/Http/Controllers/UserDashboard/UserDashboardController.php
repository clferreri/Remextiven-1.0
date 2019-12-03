<?php

namespace App\Http\Controllers\UserDashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserDashboardController extends Controller
{
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function index()
    {

       return view('User.dashboard');
        
    }

}
