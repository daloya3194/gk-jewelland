@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4 sticky z-10 top-16">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/" class="hover:underline">Home</a> /
            <a href="#" class="hover:underline">{{ $category->name }}</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 text-center">New items</h2>

        <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @isset($category->products)
                @foreach($category->products as $product)
                    <div class="group relative">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->pictures->first()->path) }}" alt="{{ $product->pictures->first()->filename }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-yellow-600">
                                    <a href="{{ route('show.product', [app()->getLocale(), $product->slug]) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ substr($product->description, 0, 30) }}...</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ $product->price }}€</p>
                        </div>
                    </div>
            @endforeach
        @endisset
        </div>
    </div>

@endsection
