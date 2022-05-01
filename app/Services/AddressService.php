<?php

namespace App\Services;

use App\Models\Address;

class AddressService
{
    public static function createAddress($data, $id_name, $id)
    {
        $address = Address::create($data);
        $address->$id_name = $id;
        $address->save();

        return $address;
    }
}
