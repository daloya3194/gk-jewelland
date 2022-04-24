@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/" class="hover:underline">Home</a> /
            <a href="{{ route('show.category', [app()->getLocale(), $product->category->slug]) }}" class="hover:underline">{{ $product->category->name }}</a> /
            <a class="hover:underline">{{ $product->name }}</a>
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
            <div class="py-2 px-4 text-center md:text-left">
                <div class="align-middle text-5xl font-bold">{{ $product->name }}</div>
                <div class="text-6xl font-light mt-2">{{ $product->price }}€</div>

                <div class="mt-5 text-xl border-b-2 font-bold pb-1">Description</div>
                <div class="mt-2 text-lg border-b-2 pb-1">{{ $product->description }}</div>

                <form action="{{ route('cart.add', [app()->getLocale(), $product->id]) }}" method="POST">
                    @csrf
                    <div class="mt-5">
                        <label for="quantity" class="text-xl font-semibold">Quantity</label>
                        <input id="quantity" class="w-20 block mt-2 mx-auto md:mx-0" type="number" name="quantity" value="1" min="1" max="50">
                    </div>

                    <div class="mt-10">
                        <button class="border border-yellow-600 bg-yellow-500 hover:bg-yellow-600 px-20 py-4 rounded-lg font-semibold"
                                type="submit"
                        >Add To Card</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
