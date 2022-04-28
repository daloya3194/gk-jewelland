<?php

namespace App\Http\Controllers;

use App\CartService;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            $request->session()->regenerate();

            if(Auth::user()->cart()->first() !== null) {
                $this->putCartFromDatabaseToSession(Auth::user()->cart()->first());
            }

            return redirect(route('account', $request->language));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function registerIndex()
    {
        return view('register');
    }

    public function register(Request $request)
    {

        $data = $this->registerValidator($request->all())->validate();
        User::create($data);

        return redirect(route('login-index', $request->language));

    }

    public function logout(Request $request)
    {
        Auth::logout();

//        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function registerValidator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'street' => 'nullable|string|max:50',
            'house_number' => 'nullable|string|max:50',
            'postcode' => 'nullable|numeric',
            'city' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:50',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|confirmed|string|min:6',
        ]);
    }

    private function putCartFromDatabaseToSession($cart)
    {
        \session()->remove('cart');

        foreach ($cart->items()->get() as $item) {

            $old_cart = Session::has('cart') ? Session::get('cart') : null;

            $product = Product::with(['pictures'])->find($item['item']);

            $cart = new CartService($old_cart);
            $cart->add($product, $item['item'], $item['quantity']);
            Session::put('cart', $cart);
        }
    }
}
