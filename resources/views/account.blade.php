@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
            <a class="hover:underline">Account</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div class="bg-gray-200 h-60 relative flex justify-center">
            <div class="flex flex-col gap-3 text-center pt-4">
                <div class="mx-auto">
                    <img class="h-20 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}" alt="{{ Auth::user()->firstname }}">
                </div>
                <div>
                    <p class="text-xl font-bold">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                    <small><a onclick="window.location.href='{{ route('logout', app()->getLocale()) }}'" class="text-red-600 cursor-pointer hover:underline">Logout</a></small>
                </div>
            </div>
            <div class="flex gap-5 absolute -bottom-14 hidden md:inline-flex">
                <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'account']) }}'"
                     class="bg-white text-center rounded-md shadow-md py-5 px-10 cursor-pointer hover:scale-105 hover:text-yellow-600 @if($section == 'account') text-yellow-600 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <p class="mt-2 font-semibold">Account</p>
                </div>
                <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'order']) }}'"
                     class="bg-white text-center rounded-md shadow-md py-5 px-10 cursor-pointer hover:scale-105 hover:text-yellow-600 @if($section == 'order') text-yellow-600 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                    </svg>
                    <p class="mt-2 font-semibold">Orders</p>
                </div>
                <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'wishlist']) }}'"
                     class="bg-white text-center rounded-md shadow-md py-5 px-10 cursor-pointer hover:scale-105 hover:text-yellow-600 @if($section == 'wishlist') text-yellow-600 @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <p class="mt-2 font-semibold">Wishlist</p>
                </div>
            </div>
            <div class="flex absolute bottom-0 md:hidden">
                <a href="{{ route('account', [app()->getLocale(), 'account']) }}"
                   class="px-4 py-2 rounded-sm font-bold cursor-pointer border-r hover:bg-white flex gap-3 items-center @if($section == 'account') bg-white text-yellow-600 @else bg-gray-100 @endif"
                >Account</a>
                <a href="{{ route('account', [app()->getLocale(), 'order']) }}"
                   class="px-4 py-2 rounded-sm font-bold cursor-pointer border-r hover:bg-white @if($section == 'order') bg-white text-yellow-600 @else bg-gray-100 @endif"
                >Order</a>
                <a href="{{ route('account', [app()->getLocale(), 'wishlist']) }}"
                   class="px-4 py-2 rounded-sm font-bold cursor-pointer hover:bg-white @if($section == 'wishlist') bg-white text-yellow-600 @else bg-gray-100 @endif"
                >Wishlist</a>
            </div>
        </div>

        @if($section == 'account')
            @include('layouts/_my-account')
        @endif

        @if($section == 'order')
            @include('layouts/_my-orders')
        @endif

        @if($section == 'wishlist')
            @include('layouts/_my-wishlist')
        @endif


    </div>

@endsection
