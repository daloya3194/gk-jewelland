<?php

namespace App\Http\Controllers;

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
