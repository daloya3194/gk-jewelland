<?php

namespace App\Http\Controllers;

use App\CartService;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index($language, $section = 'account')
    {
        return view('account', [
            'section' => $section,
            'navigation' => 'account'
        ]);
    }

}
