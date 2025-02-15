<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use App\Services\AddressService;
use App\Services\CartDatabaseService;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function loginIndex(Request $request)
    {
        if (!in_array(url()->previous(), [route('welcome', $request->language), route('login', $request->language)])) {
            \session(['url.intended' => url()->previous()]);
        }

        return view('login',[
            'navigation' => 'account'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {

            if(Auth::user()->cart()->first() !== null && \session('url.intended') !== route('checkout', $request->language)) {
                CartDatabaseService::putCartFromDatabaseToSession(Auth::user()->cart()->first());
            }

            if (Session::has('cart') && Auth::user()->cart()->first() == null) {
                CartDatabaseService::saveCartUserToDatabase(Session::get('cart'));
            }

            $redirect_to = null;

            if (\session()->has('url.intended')) {
                $redirect_to = \session()->get('url.intended');
                \session()->forget('url.intended');
            }

            $request->session()->regenerate();

            if ($redirect_to !== null) {
                return redirect($redirect_to);
            }

            return redirect(route('account', [Auth::user()->language ?? $request->language, 'account']));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);

    }

    public function registerIndex()
    {
        return view('register',[
            'navigation' => 'account'
        ]);
    }

    public function register(Request $request)
    {

        $data = $this->registerValidator($request->all())->validate();
        $user = User::create($data);
        $user->language = $request->language;
        $user->save();

        if (isset($data['street'])) {
            $address = Address::create($data);
            $address->user_id = $user->id;
            $address->save();
            $user->standard_address = $address->id;
            $user->save();
        }

        return redirect(route('login-index', $request->language));

    }

    public function logout(Request $request)
    {
        User::find(Auth::id())->update([
            'language' => $request->language
        ]);

        Auth::logout();

        $request->session()->regenerateToken();

        return redirect(route('welcome', $request->language));
    }

    public function registerValidator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'street' => 'required_with:house_number,zip_code,city,country',
            'house_number' => 'required_with:street,zip_code,city,country',
            'zip_code' => 'required_with:street,house_number,city,country',
            'city' => 'required_with:street,house_number,zip_code,country',
            'country' => 'required_with:street,house_number,zip_code,city',
            'email' => ['required','email','max:100', Rule::unique('users')->where(function ($query) {
                return $query->whereIn('role', ['customer', 'admin'])->get();
            })],
            'password' => 'required|confirmed|string|min:6',
        ]);
    }
}
