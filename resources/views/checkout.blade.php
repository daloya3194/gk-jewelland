@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
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
                            <select onchange="setAddress(this.value)" name="address" class="p-2.5 w-full border-gray-300 rounded shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option disabled selected>Please select the shipping address...</option>
                                <option value="0">New address</option>
                                @isset($addresses)
                                    @foreach($addresses as $address)
                                        <option value="{{ $address->id }}" id="select_address{{$address->id}}" data-address="{{ \App\Models\Address::find($address->id) }}" @isset($standard_address) {{ $standard_address->id == $address->id ? 'selected' : '' }} @endisset>{{ $address->lastname . ' (' .  $address->street . ' ' . $address->house_number . '...)' }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    @endauth
                    <input class="mt-5" type="text" placeholder="First Name" name="firstname" id="firstname" required
                            @if($standard_address !== null)
                                value="{{ $standard_address->firstname }}"
                            @elseif(Auth::user() !== null)
                                value="{{ Auth::user()->firstname }}"
                            @else
                                value="{{ old('firstname') }}"
                            @endif
                    >

                    <input class="mt-4" type="text" placeholder="Last Name" name="lastname" id="lastname" required
                           @if($standard_address !== null)
                               value="{{ $standard_address->lastname }}"
                           @elseif(Auth::user() !== null)
                               value="{{ Auth::user()->lastname }}"
                           @else
                               value="{{ old('lastname') }}"
                           @endif
                    >
                    @guest()
                        <input class="mt-4" type="email" placeholder="Email" name="email" id="email" required>
                    @endguest
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <input class="col-span-3 md:col-span-2" type="text" placeholder="Street" name="street" id="street" required
                               value="{{ $standard_address !== null ? $standard_address->street : old('street') }}"
                        >
                        <input class="col-span-3 md:col-span-1" type="text" placeholder="House Number" name="house_number" id="house_number" required
                               value="{{ $standard_address !== null ? $standard_address->house_number : old('house_number') }}"
                        >
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-2">
                        <input class="col-span-3 md:col-span-1" type="text" placeholder="ZIP Code" name="zip_code" id="zip_code" required
                               value="{{ $standard_address !== null ? $standard_address->zip_code : old('zip_code') }}"
                        >
                        <input class="col-span-3 md:col-span-2" type="text" placeholder="City" name="city" id="city" required
                               value="{{ $standard_address !== null ? $standard_address->city : old('city') }}"
                        >
                    </div>
                    <input class="mt-4" type="text" placeholder="Country" name="country" id="country" required
                           value="{{ $standard_address !== null ? $standard_address->country : old('country') }}"
                    >
                    <div class="mt-4">
                        <label for="terms-and-privacy" class="block text-sm text-gray-900">
                            Already have an account?
                            <a href="{{ route('login-index', app()->getLocale()) }}" class="text-bordeaux hover:text-red-600 hover:underline">Sign in</a>
                        </label>
                    </div>
                </div>
                <div class="col-span-5 md:col-span-2 py-5 px-10 flex items-center">
                    <div class="w-full">
                        <p class="text-3xl font-semibold">Summary</p>
                        <hr class="mt-2 mb-4">
                        <div class="flex justify-between">
                            <div class="text-xl font-semibold">Subtotal</div>
                            <div class="text-xl font-semibold">{{ $cart !== null ? $cart->total_price : 0 }}€</div>
                        </div>
                        <div class="flex justify-between mt-2">
                            <div>Delivery costs</div>
                            <div>Free</div>
                        </div>
                        <hr class="mt-2 mb-4">
                        <div class="flex justify-between">
                            <div class="text-xl font-semibold">Total</div>
                            <div class="text-xl font-semibold">{{ $cart !== null ? $cart->total_price : 0 }}€</div>
                        </div>
                        <small>incl. VAT</small>
                        <button type="submit"
                                class="md:px-10 lg:px-20 py-3 bg-yellow-400 rounded-md shadow-md hover:bg-yellow-500 w-full flex justify-center mt-4">
                            <img class="h-6 object-fill"
                                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png"
                                 alt="paypal">
                        </button>
                        {{--<button type="submit"
                                class="md:px-10 lg:px-20 py-3 bg-bordeaux rounded-md shadow-md hover:bg-red-600 w-full flex justify-center mt-4">
                            <img class="h-6 object-fill"
                                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/PayPal.svg/2560px-PayPal.svg.png"
                                 alt="paypal">
                        </button>--}}
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
