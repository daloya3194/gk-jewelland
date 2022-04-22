@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/" class="hover:underline">Home</a> /
            <a class="hover:underline">Account</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div>
            <img class="h-56 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->firstname }}+{{ Auth::user()->lastname }}" alt="{{ Auth::user()->firstname }}">
        </div>

        <a onclick="window.location.href='{{ route('logout', app()->getLocale()) }}'" class="text-red-600 cursor-pointer hover:underline">Logout</a>
    </div>

@endsection
