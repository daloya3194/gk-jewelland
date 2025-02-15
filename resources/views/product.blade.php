@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
            <a href="{{ route('show.category', [app()->getLocale(), $product->category->slug]) }}" class="hover:underline">{{ $product->category->{'name_' . app()->getLocale()} ?? $product->category->name_en }}</a> /
            <a class="hover:underline">{{ $product->{'name_' . app()->getLocale()} ?? $product->name_en }}</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12 px-5 md:px-0">

        <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-16 lg:gap-x-20 items-center">
            <div class="swiper myProductSwiper pt-0 pb-0 overflow-hidden md:overflow-visible">
                <div class="swiper-wrapper">
                    @isset($product->pictures)
                        @foreach($product->pictures as $picture)
                            <div class="swiper-slide h-full mr-10">
                                <img src="{{ $picture->complete_path }}"
                                     alt="{{ $picture->filename }}"
                                     class="object-cover w-full h-full"
                                >
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="swiper-button-next text-bordeaux"></div>
                <div class="swiper-button-prev text-bordeaux"></div>
            </div>
            <div class="py-2 px-4 text-center md:text-left">
                <div class="align-middle text-5xl font-bold">{{ $product->{'name_' . app()->getLocale()} ?? $product->name_en }}</div>
                <div class="text-6xl font-light mt-2 text-red-900">{{ $product->price }}€</div>

                <div class="mt-5 text-xl border-b-2 font-bold pb-1">Description</div>
                <div class="mt-2 text-lg border-b-2 pb-1">{{ $product->{'description_' . app()->getLocale()} ?? $product->description_en }}</div>

                <form action="{{ route('cart.add', [app()->getLocale(), $product->id]) }}" method="POST">
                    @csrf
                    <div class="mt-5">
                        <label for="quantity" class="text-xl font-semibold">Quantity</label>
                        <input id="quantity" class="w-20 block mt-2 mx-auto md:mx-0" type="number" name="quantity" value="1" min="1" max="50">
                    </div>

                    <div class="mt-10 flex justify-between items-center gap-x-2">
                        <button class="basis-5/6 border border-yellow-600 bg-bordeaux hover:bg-red-600 px-10 py-2 sm:px-20 sm:py-4 rounded-lg font-semibold text-white"
                                type="submit"
                        >Add To Card</button>

                        @if(isset(auth()->user()->wishlist) && in_array($product->id, auth()->user()->wishlist))
                            <div onclick="window.location.href='{{ route('remove-to-wishlist', [app()->getLocale(), $product->slug]) }}'"
                                 class="border bottom-2 py-2 sm:py-4 px-6 rounded-lg border-bordeaux cursor-pointer text-bordeaux hover:border-gray-600 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        @else
                            <div onclick="window.location.href='{{ route('add-to-wishlist', [app()->getLocale(), $product->slug]) }}'"
                                 class="border bottom-2 py-2 sm:py-4 px-6 rounded-lg border-gray-600 cursor-pointer hover:border-bordeaux hover:text-bordeaux">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </div>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
