@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">Home</a> /
            <a href="{{ route('cart', app()->getLocale()) }}" class="hover:underline">Cart</a> /
            <a class="hover:underline">Checkout</a>
        </div>
    </div>

    <div class="max-w-5xl mx-auto mb-12">
        <form action="{{ route('checkout-submit', app()->getLocale()) }}" method="POST">
            @csrf
            <div class="grid grid-cols-5">
                <div class="col-span-5 md:col-span-3 py-5 px-10">
                    <p class="text-xl font-bold">Shipping address</p>
                    @auth()
                        <div class="mt-5">
                            <select name="address" class="p-2.5 w-full border-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option disabled selected>Please select your address...</option>
                                <option value="0">New address</option>
                                @isset($addresses)
                                    @foreach($addresses as $address)
                                        <option value="{{ $address->id }}" @isset($standard_address) {{ $standard_address->id == $address->id ? 'selected' : '' }} @endisset>{{ $address->user->lastname . ' (' .  $address->street . ' ' . $address->house_number . '...)' }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    @endauth
                    <input class="mt-5" type="text" placeholder="First Name" name="firstname" id="firstname"
                            @if($standard_address !== null)
                                value="{{ $standard_address->firstname }}"
                            @elseif(Auth::user() !== null)
                                value="{{ Auth::user()->firstname }}"
                            @else
                                value="{{ old('firstname') }}"
                            @endif
                    >

                    <input class="mt-4" type="text" placeholder="Last Name" name="lastname" id="lastname"
                           @if($standard_address !== null)
                               value="{{ $standard_address->lastname }}"
                           @elseif(Auth::user() !== null)
                               value="{{ Auth::user()->lastname }}"
                           @else
                               value="{{ old('lastname') }}"
                           @endif
                    >
                    @guest()
                        <input class="mt-4" type="email" placeholder="Email" name="email" id="email">
                    @endguest
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <input class="col-span-3 md:col-span-2" type="text" placeholder="Street" name="street" id="street"
                               value="{{ $standard_address !== null ? $standard_address->street : old('street') }}"
                        >
                        <input class="col-span-3 md:col-span-1" type="text" placeholder="House Number" name="house_number" id="house_number"
                               value="{{ $standard_address !== null ? $standard_address->house_number : old('house_number') }}"
                        >
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <input class="col-span-3 md:col-span-1" type="text" placeholder="ZIP Code" name="zip_code" id="zip_code"
                               value="{{ $standard_address !== null ? $standard_address->zip_code : old('zip_code') }}"
                        >
                        <input class="col-span-3 md:col-span-2" type="text" placeholder="City" name="city" id="city"
                               value="{{ $standard_address !== null ? $standard_address->city : old('city') }}"
                        >
                    </div>
                    <input class="mt-4" type="text" placeholder="Country" name="country" id="country"
                           value="{{ $standard_address !== null ? $standard_address->country : old('country') }}"
                    >
                </div>
                <div class="col-span-5 md:col-span-2 py-5 px-10 flex items-center">
                    <div class="w-full">
                        <p class="text-3xl font-semibold">Summary</p>
                        <hr class="mt-2 mb-4">
                        <div class="flex justify-between">
                            <div class="text-xl font-semibold">Zwischensumme</div>
                            <div class="text-xl font-semibold">{{ $cart !== null ? $cart->total_price : 0 }}€</div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <div>Lieferkosten</div>
                            <div>Gratis</div>
                        </div>
                        <hr class="mt-2 mb-4">
                        <div class="flex justify-between">
                            <div class="text-xl font-semibold">Gesammtsumme</div>
                            <div class="text-xl font-semibold">{{ $cart !== null ? $cart->total_price : 0 }}€</div>
                        </div>
                        <small>inkl. MwSt.</small>
                        <button type="submit"
                                class="md:px-10 lg:px-20 py-3 bg-yellow-400 rounded-md shadow-md hover:bg-yellow-500 w-full flex justify-center mt-4">
                            <img class="h-6 object-fill"
                                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png"
                                 alt="paypal">
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
