<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
        $standard_address = Address::find(Auth::user()->standard_address);
        $addresses = Address::where('user_id', Auth::id())->where('id', '!=', Auth::user()->standard_address)->get();

        return view('account', [
            'standard_address' => $standard_address,
            'addresses' => $addresses,
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

    public function addAddress(Request $request)
    {
        $data = $this->addressValidator($request->all())->validate();
        $address = Address::create($data);
        $address->user_id = Auth::id();
        $address->save();

        if (Auth::user()->standard_address == null) {
            $this->setStandardAddress($address->id);
        }

        return redirect(route('account', [$request->language, 'account', 'addresses']))->with('success', 'success');
    }

    public function updateAddress(Request $request, $language, $address_id)
    {
        $data = $this->addressValidator($request->all())->validate();
        Address::find($address_id)->update($data);

        return redirect(route('account', [$language, 'account', 'addresses']))->with('success', 'success');
    }

    public function standardAddress($language, $address_id)
    {
        $this->setStandardAddress($address_id);

        return redirect(route('account', [$language, 'account', 'addresses']))->with('success', 'success');
    }

    public function deleteAddress($language, $address_id)
    {
        Address::destroy($address_id);
        $address = Address::where('user_id', Auth::id())->first();

        if (Auth::user()->standard_address == $address_id && isset($address)) {
            $this->setStandardAddress($address->id);
        }

        if (Address::find(Auth::user()->standard_address) == null && $address == null) {
            User::find(Auth::id())->update([
                'standard_address' => null
            ]);
        }

        return redirect(route('account', [$language, 'account', 'addresses']))->with('success', 'success');
    }

    private function setStandardAddress($address_id)
    {
        User::find(Auth::id())->update([
            'standard_address' => $address_id
        ]);
    }

    private function updateAccountValidator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'email' => ['required','email','max:100', Rule::unique('users')->ignore(Auth::user())],
        ]);
    }

    private function updatePasswordValidator(array $data)
    {
        return Validator::make($data, [
            'old_password' => 'required|string',
            'password' => 'required|confirmed|string|min:6',
        ]);
    }

    private function addressValidator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:100',
            'zip_code' => 'required|numeric',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);
    }
}
