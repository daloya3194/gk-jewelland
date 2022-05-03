<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $addresses = null;
        $standard_address = null;

        if (Auth::user() !== null) {
            $addresses = Address::with(['user'])->where('user_id', Auth::id())->get();
            $standard_address = Address::find(Auth::user()->standard_address);
        }

        return view('checkout', [
            'cart' => $cart,
            'addresses' => $addresses,
            'standard_address' => $standard_address,
            'navigation' => 'cart'
        ]);
    }
}
