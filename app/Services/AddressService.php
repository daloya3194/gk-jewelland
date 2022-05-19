<?php

namespace App\Services;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AddressService
{
    public static function createAddress($data, $id_name, $id)
    {
        $address = Address::create($data);
        $address->$id_name = $id;
        $address->save();

        if ($id_name == 'user_id' && Auth::user()->standard_address == null) {
            User::find(Auth::id())->update([
                'standard_address' => $address->id
            ]);
        }

        return $address;
    }
}
