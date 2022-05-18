<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index($language, $section = 'account', $section_2 = 'personal-information')
    {
        return view('account', [
            'section' => $section,
            'section_2' => $section_2,
            'navigation' => 'account'
        ]);
    }

    public function updateAccount(Request $request)
    {
        $data = $this->updateAccountValidator($request->all())->validate();

        User::find(Auth::id())->update($data);

        return redirect(route('account', [$request->language, 'account', 'personal-information']))->with('success', 'success');
    }

    public function updatePassword(Request $request)
    {
        $data = $this->updatePasswordValidator($request->all())->validate();

        if( ! Hash::check( $data['old_password'], Auth::user()->getAuthPassword() ) )
        {
            return redirect(route('account', [$request->language, 'account', 'change-password']))->with('error', 'Old Password Not Correct !');
        }

        User::find(Auth::id())->update($data);

        return redirect(route('account', [$request->language, 'account', 'change-password']))->with('success', 'success');
    }

    public function updateAddress(Request $request)
    {
        dd($request->all());
    }

    private function updateAccountValidator(array $data) {
        return Validator::make($data, [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => ['required','email','max:100', Rule::unique('users')->ignore(Auth::user())],
        ]);
    }

    private function updatePasswordValidator(array $data) {
        return Validator::make($data, [
            'old_password' => 'required|string',
            'password' => 'required|confirmed|string|min:6',
        ]);
    }
}
