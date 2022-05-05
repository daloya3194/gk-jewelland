@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
            <a class="hover:underline">Login</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded sm:px-10">
            <p class="text-center font-bold underline">Login to your account</p>
            <div class="mx-auto max-w-md">
                <div class="divide-y divide-gray-300/50">
                    <form class="mb-0 space-y-6" action="{{ route('login', app()->getLocale()) }}" method="POST">
                        @csrf

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
                            <button type="submit"
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-bordeaux"
                            >Sign in</button>
                        </div>
                    </form>

                    <div class="flex items-center mt-4">
                        <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900">
                            Don't have an account yet?
                            <a href="{{ route('register-index', app()->getLocale()) }}" class="text-bordeaux hover:text-red-600 hover:underline">Register now</a>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
