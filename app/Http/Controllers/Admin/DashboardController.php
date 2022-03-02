<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard() {

        return view('admin.dashboard', [
            'nav' => 'dashboard'
        ]);

    }

    public function products() {

        return view('admin.products', [
            'nav' => 'products'
        ]);

    }
}
