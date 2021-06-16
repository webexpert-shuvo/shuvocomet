<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashBordController extends Controller
{

    public function __construct()
    {
        $this ->middleware('guest')->except('showAdminPanelPage');
    }


    //Show Login Page
    public function showLoginPage()
    {
        return view('backend.login');
    }

    //Show register Page

    public function showRegisterPage()
    {
        return view('backend.register');
    }

    //Show Admin Panel Page

    public function showAdminPanelPage()
    {
        return view('backend.dashbord');
    }



}
