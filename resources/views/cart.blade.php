@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold">
            <a href="/" class="hover:underline">Home</a> /
            <a href="{{ route('cart', app()->getLocale()) }}" class="hover:underline">Cart</a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto mb-12">
        <div class="grid grid-cols-1">
            @isset($cart)

                <div class="flex flex-row p-4 bg-yellow-300">
                    <div class="basis-1/2 md:basis-4/5 font-bold">Product</div>
                    <div class="basis-1/4 md:basis-1/5 font-bold pl-2">Quantity</div>
                    <div class="basis-1/4 md:basis-1/5 text-right font-bold">Total</div>
                </div>

                @foreach($cart->items as $item)
                    <div class="flex flex-row p-2 mt-2">
                        <div class="basis-1/2 md:basis-4/5 grid grid-cols-1 md:flex gap-3 items-center">
                            <div>
                                <img class="h-24 w-24 object-cover" src="{{ Storage::url($item['item']->pictures->first()->path) }}" alt="dfsf">
                            </div>
                            <div>
                                <div class="text-xl font-bold hidden md:block">{{ $item['item']['name'] }}</div>
                                <div class="font-semibold opacity-70">Price: {{ $item['item']['price'] }}€</div>
                                <div onclick="window.location.href='{{ route('cart.remove', [app()->getLocale(), $item['item']['id']]) }}'">
                                    <small class="text-red-600 font-semibold cursor-pointer hover:underline">Remove</small>
                                </div>
                            </div>
                        </div>
                        <div class="basis-1/4 md:basis-1/5 flex items-center">
                            <form action="{{ route('cart.update-quantity', [app()->getLocale(), $item['item']['id']]) }}" method="POST">
                                @csrf
                                <input onchange="this.form.submit()" class="w-20" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="50">
                            </form>
                        </div>
                        <div class="basis-1/4 md:basis-1/5 flex items-center justify-end">
                            <div class="font-semibold">{{ $item['price'] }}€</div>
                        </div>
                    </div>
                @endforeach

                    {{--<div class="flex flex-row p-2 mt-2">
                    <div class="basis-1/2 md:basis-4/5 grid grid-cols-1 md:flex gap-3 items-center">
                        <div>
                            <img class="h-24 w-24 object-cover" src="https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="dfsf">
                        </div>
                        <div>
                            <div class="text-xl font-bold hidden md:block">Red Printed Tshirt</div>
                            <div class="font-semibold opacity-70">Price: 355€</div>
                            <div><small class="text-red-600 font-semibold cursor-pointer hover:underline">Remove</small></div>
                        </div>
                    </div>
                    <div class="basis-1/4 md:basis-1/5 flex items-center">
                        <input class="w-20" type="number" name="quantity" value="1" min="1" max="50">
                    </div>
                    <div class="basis-1/4 md:basis-1/5 flex items-center justify-end">
                        <div class="font-semibold">1010.00€</div>
                    </div>
                </div>
                <div class="flex flex-row p-2 mt-2">
                    <div class="basis-1/2 md:basis-4/5 grid grid-cols-1 md:flex gap-3 items-center">
                        <div>
                            <img class="h-24 w-24 object-cover" src="https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="dfsf">
                        </div>
                        <div>
                            <div class="text-xl font-bold hidden md:block">Red Printed Tshirt</div>
                            <div class="font-semibold opacity-70">Price: 355€</div>
                            <div><small class="text-red-600 font-semibold cursor-pointer hover:underline">Remove</small></div>
                        </div>
                    </div>
                    <div class="basis-1/4 md:basis-1/5 flex items-center">
                        <input class="w-20" type="number" name="quantity" value="1" min="1" max="50">
                    </div>
                    <div class="basis-1/4 md:basis-1/5 flex items-center justify-end">
                        <div class="font-semibold">1010.00€</div>
                    </div>
                </div>--}}

                    <div class="flex flex-row">
                        <div class="basis-4/5 font-bold hidden md:block"></div>
                        <div class="basis-1/2 md:basis-1/5 font-bold border-t-4 border-yellow-300 pl-2 pt-4">Total</div>
                        <div class="basis-1/2 md:basis-1/5 text-right font-bold border-t-4 border-yellow-300 pt-4">{{ $cart->total_price }}€</div>
                    </div>

                    <br>
                    <br>

                    <div class="flex flex-row">
                        <div class="basis-4/5 font-bold"></div>
                        <div class="basis-1/5 font-bold"></div>
                        <div class="basis-1/5 text-right font-bold">
                            <a class="px-10 py-4 bg-yellow-300 cursor-pointer hover:bg-yellow-400">Checkout</a>
                        </div>
                    </div>
            @endisset

        </div>
    </div>

@endsection
