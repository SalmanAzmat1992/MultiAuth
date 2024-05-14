<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function SuperAdminDashboard()
    {
        return view('superadmin.layout.dashboard');
    }

    public function Page1()
    {
        return view('superadmin.page1');
    }
}
