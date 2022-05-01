@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">Home</a> /
            <a class="hover:underline">Register</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:rounded sm:max-w-lg sm:px-10">
            <div class="mx-auto max-w-md">
                <div class="divide-y divide-gray-300/50">
                    <form class="mb-0 space-y-6" action="{{ route('register', app()->getLocale()) }}" method="POST">
                        @csrf

                        <div class="flex gap-1">
                            <div class="basis-1/2">
                                <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-600">*</span></label>
                                <div class="mt-1">
                                    <input id="firstname" name="firstname" type="text" value="{{ old('firstname') }}" autocomplete="on" required maxlength="100"
                                           class="@error('firstname') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('firstname')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="basis-1/2">
                                <label for="lastname" class="block text-sm font-medium text-gray-700 text-right">Lastname<span class="text-red-600">*</span></label>
                                <div class="mt-1">
                                    <input id="lastname" name="lastname" type="text" value="{{ old('lastname') }}" autocomplete="on" required maxlength="100"
                                           class="@error('lastname') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('lastname')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-1">
                            <div class="basis-4/6">
                                <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                                <div class="mt-1 ">
                                    <input id="street" name="street" type="text" value="{{ old('street') }}" autocomplete="on" maxlength="100"
                                           class="@error('street') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('street')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="basis-2/6">
                                <label for="house_number" class="block text-sm font-medium text-gray-700 text-right">Number</label>
                                <div class="mt-1 ">
                                    <input id="house_number" name="house_number" type="text" value="{{ old('house_number') }}" autocomplete="on" maxlength="100"
                                           class="@error('house_number') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('house_number')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex gap-1">
                            <div class="basis-2/6">
                                <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip code</label>
                                <div class="mt-1 ">
                                    <input id="zip_code" name="zip_code" type="number" value="{{ old('zip_code') }}" autocomplete="on" maxlength="100"
                                           class="@error('zip_code') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('zip_code')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="basis-4/6">
                                <label for="city" class="block text-sm font-medium text-gray-700 text-right">City</label>
                                <div class="mt-1 ">
                                    <input id="city" name="city" type="text" value="{{ old('city') }}" autocomplete="on" maxlength="100"
                                           class="@error('city') border-red-600 ring-red-500 @enderror"
                                    >
                                    @error('city')
                                    <small class="text-red-600">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                            <div class="mt-1">
                                <input id="country" name="country" type="text" value="{{ old('country') }}" autocomplete="on" maxlength="50"
                                       class="@error('country') border-red-600 ring-red-500 @enderror"
                                >
                                @error('country')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="on" required maxlength="100"
                                       class="@error('email') border-red-600 ring-red-500 @enderror"
                                >
                                @error('email')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="password" name="password" type="password" required minlength="6"
                                       class="@error('password') border-red-600 ring-red-500 @enderror"
                                >
                                @error('password')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="password_confirmation" name="password_confirmation" type="password" required minlength="6"
                                       class="@error('password') border-red-600 ring-red-500 @enderror"
                                >
                                @error('password')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900">
                                By clicking Register, I agree that I have read and accepted the GK-Jewelland
                                <a href="#" class="text-indigo-600 hover:text-indigo-500 hover:underline">Terms of Use and Privacy Policy</a>
                            </label>
                        </div>

                        <div>
                            <button type="submit"
                                    class="w-full rounded flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >Register</button>
                        </div>
                    </form>
                    <div class="flex items-center mt-4">
                        <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900">
                            Already have an account?
                            <a href="{{ route('login-index', app()->getLocale()) }}" class="text-indigo-600 hover:text-indigo-500 hover:underline">Sign in</a>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
