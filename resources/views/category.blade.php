@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
            <a class="hover:underline">{{ $category->{'name_' . app()->getLocale()} ?? $category->name_en }}</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">

        <livewire:category :category="$category"/>

{{--        <h2 class="text-2xl font-extrabold tracking-tight text-center">Filters</h2>--}}

{{--        <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 px-5 xl:px-0">--}}
{{--            @isset($category->active_products)--}}
{{--                @foreach($category->active_products as $product)--}}
{{--                    <div class="group relative">--}}
{{--                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">--}}
{{--                            <img src="{{ \Illuminate\Support\Facades\Storage::url($product->pictures->first()->path) }}" alt="{{ $product->pictures->first()->filename }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">--}}
{{--                        </div>--}}
{{--                        <div class="mt-4 flex justify-between">--}}
{{--                            <div>--}}
{{--                                <h3 class="text-sm text-bordeaux">--}}
{{--                                    <a href="{{ route('show.product', [app()->getLocale(), $product->slug]) }}">--}}
{{--                                        <span aria-hidden="true" class="absolute inset-0"></span>--}}
{{--                                        {{ $product->{'name_' . app()->getLocale()} ?? $product->name_en }}--}}
{{--                                    </a>--}}
{{--                                </h3>--}}
{{--                                <p class="mt-1 text-sm text-gray-500">{{ substr($product->{'description_' . app()->getLocale()} ?? $product->description_en, 0, 30) }}...</p>--}}
{{--                            </div>--}}
{{--                            <p class="text-sm font-medium text-gray-900">{{ $product->price }}€</p>--}}
{{--                        </div>--}}
{{--                        @if($product->label)--}}
{{--                            <div class="absolute top-1 left-0 scale-75 md:top-2 md:left-2 md:scale-100 bg-red-600 px-4 py-1 rounded-lg shadow-2xl text-white font-bold">--}}
{{--                                {{ $product->label->{'name_' . app()->getLocale()} ?? $product->label->name_en }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--            @endforeach--}}
{{--        @endisset--}}
{{--        </div>--}}
    </div>

@endsection
