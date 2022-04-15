@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4 sticky z-10 top-12">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/">Home</a> /
            <a href="#">{{ $product->category->name }}</a> /
            <a href="#">{{ $product->name }}</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <div class="">
                <div class="mb-4">
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($product->pictures->first()->path) }}"
                         alt="{{ \Illuminate\Support\Facades\Storage::url($product->pictures->first()->filename) }}"
                         class="object-cover w-full"
                    >
                </div>
                <div class="flex justify-center gap-4">
                    @isset($product->pictures)
                        @foreach($product->pictures as $picture)
                            <div class="h-32 w-32">
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($picture->path) }}"
                                     alt="{{ \Illuminate\Support\Facades\Storage::url($picture->filename) }}"
                                     class="object-cover w-full h-full"
                                >
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
            <div class="py-10 px-4">
                <div class="align-middle text-5xl font-bold">{{ $product->name }}</div>
                <div class="text-6xl font-light mt-2">{{ $product->price }}€</div>

                <div class="mt-12 text-xl border-b-2 font-bold">Description</div>
                <div class="mt-2 text-lg">{{ $product->description }}</div>

                <div class="mt-20">
                    <a href="#"
                       class="border border-yellow-600 bg-yellow-500 px-20 py-4 rounded-lg"
                    >Add To Card</a>
                </div>
            </div>
        </div>
    </div>

@endsection
