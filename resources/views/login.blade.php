@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/" class="hover:underline">Home</a> /
            <a class="hover:underline">Login</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div class="relative bg-white px-6 pt-10 pb-8 shadow ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded sm:px-10">
            <div class="mx-auto max-w-md">
                <div class="divide-y divide-gray-300/50">
                    <form class="mb-0 space-y-6" action="{{ route('login', app()->getLocale()) }}" method="POST">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
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
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
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
                                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >Sign in</button>
                        </div>
                    </form>

                    <div class="flex items-center mt-4">
                        <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900">
                            Don't have an account yet?
                            <a href="{{ route('register-index', app()->getLocale()) }}" class="text-indigo-600 hover:text-indigo-500 hover:underline">Register now</a>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
