<?php

namespace AryoKesuma\LaravelInstaller\Controllers;

use Illuminate\Routing\Controller;

class WelcomeController extends Controller
{
    /**
     * Display the installer welcome page.
     */
    public function welcome()
    {
        return view('vendor.installer.welcome');
    }
}
