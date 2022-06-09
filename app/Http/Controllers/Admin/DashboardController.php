<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Label;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $total_users_customer = User::where('role', 'customer')->count();
        $total_users_guests = User::where('role', 'guest')->count();
        $carts_total_price = Cart::whereHas('invoice')->sum('total_price');
        $total_revenue = number_format($carts_total_price, 2, ',', ' ') . '€';

        $ip = $request->ip();
//        dd($ip);

        return view('admin.dashboard', [
            'total_users' => $total_users_customer,
            'total_users_guests' => $total_users_guests,
            'total_revenue' => $total_revenue,
            'nav' => 'dashboard'
        ]);

    }
}
