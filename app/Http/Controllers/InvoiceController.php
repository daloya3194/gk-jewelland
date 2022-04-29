<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InvoiceController extends Controller
{
    public function index()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;

        return view('checkout', [
            'cart' => $cart,
            'navigation' => 'cart'
        ]);
    }
}
