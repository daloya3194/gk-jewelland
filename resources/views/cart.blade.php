@extends('layouts.app')

@section('content')

    <div class="bg-gray-100 mb-5 py-3 px-4">
        <div class="max-w-7xl mx-auto font-semibold flex gap-x-3">
            <a href="{{ route('welcome', app()->getLocale()) }}" class="hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </a> /
            <a class="hover:underline">Cart</a>
        </div>
    </div>

{{--    <div class="max-w-7xl mx-auto mb-12">--}}
{{--        <div class="grid grid-cols-1">--}}
{{--            @isset($cart)--}}

{{--                <div class="flex flex-row p-4 bg-yellow-300">--}}
{{--                    <div class="basis-1/2 md:basis-4/5 font-bold">Product</div>--}}
{{--                    <div class="basis-1/4 md:basis-1/5 font-bold pl-2">Quantity</div>--}}
{{--                    <div class="basis-1/4 md:basis-1/5 text-right font-bold">Total</div>--}}
{{--                </div>--}}

{{--                @foreach($cart->items as $item)--}}
{{--                    <div class="flex flex-row p-2 mt-2">--}}
{{--                        <div class="basis-1/2 md:basis-4/5 grid grid-cols-1 md:flex gap-3 items-center">--}}
{{--                            <div>--}}
{{--                                <img class="h-24 w-24 object-cover" src="{{ Storage::url($item['item']->pictures->first()->path) }}" alt="dfsf">--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <div class="text-xl font-bold hidden md:block">{{ $item['item']['name'] }}</div>--}}
{{--                                <div class="font-semibold opacity-70">Price: {{ $item['item']['price'] }}€</div>--}}
{{--                                <div onclick="window.location.href='{{ route('cart.remove', [app()->getLocale(), $item['item']['id']]) }}'">--}}
{{--                                    <small class="text-red-600 font-semibold cursor-pointer hover:underline">Remove</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="basis-1/4 md:basis-1/5 flex items-center">--}}
{{--                            <form action="{{ route('cart.update-quantity', [app()->getLocale(), $item['item']['id']]) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input onchange="this.form.submit()" class="w-20" type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" max="50">--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                        <div class="basis-1/4 md:basis-1/5 flex items-center justify-end">--}}
{{--                            <div class="font-semibold">{{ $item['price'] }}€</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            --}}
{{--                    <div class="flex flex-row">--}}
{{--                        <div class="basis-4/5 font-bold hidden md:block"></div>--}}
{{--                        <div class="basis-1/2 md:basis-1/5 font-bold border-t-4 border-yellow-300 pl-2 pt-4">Total</div>--}}
{{--                        <div class="basis-1/2 md:basis-1/5 text-right font-bold border-t-4 border-yellow-300 pt-4">{{ $cart->total_price }}€</div>--}}
{{--                    </div>--}}

{{--                    <br>--}}
{{--                    <br>--}}

{{--                    <div class="flex flex-row">--}}
{{--                        <div class="basis-4/5 font-bold"></div>--}}
{{--                        <div class="basis-1/5 font-bold"></div>--}}
{{--                        <div class="basis-1/5 text-right font-bold">--}}
{{--                            <a href="{{ route('checkout', app()->getLocale()) }}" class="px-10 py-4 bg-yellow-300 cursor-pointer hover:bg-yellow-400">Checkout</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--            @endisset--}}

{{--        </div>--}}
{{--    </div>--}}

    <div class="max-w-7xl mx-auto mb-12 px-5 md:px-0">
        <div class="grid grid-cols-1">
            @if(isset($cart))

                <div class="flex flex-row p-4 bg-bordeaux">
                    <div class="basis-1/2 md:basis-4/5 font-bold text-white">Product</div>
                    <div class="basis-1/4 md:basis-1/5 font-bold pl-2 text-white">Quantity</div>
                    <div class="basis-1/4 md:basis-1/5 text-right font-bold text-white">Subtotal</div>
                </div>

                @foreach($cart->items as $item)
                    <div class="flex flex-row p-2 mt-2">
                        <div class="basis-1/2 md:basis-4/5 grid grid-cols-1 md:flex gap-3 items-center">
                            <div>
{{--                                <img class="h-24 w-24 object-cover" src="{{ Storage::url($item['item']->pictures->first()->path) }}" alt="dfsf">--}}
                                <img class="h-24 w-24 object-cover" src="{{ $item['item']->pictures->first()->complete_path }}" alt="dfsf">
                            </div>
                            <div>
                                <div class="text-xl font-bold hidden md:block">{{ $item['item']['name_' . app()->getLocale()] ?? $item['item']['name_en'] }}</div>
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

                <div class="flex flex-row">
                    <div class="basis-4/5 font-bold hidden md:block"></div>
                    <div class="basis-1/2 md:basis-1/5 font-bold border-t-4 border-bordeaux pl-2 pt-4">Total</div>
                    <div class="basis-1/2 md:basis-1/5 text-right font-bold border-t-4 border-bordeaux pt-4">{{ $cart->total_price }}€</div>
                </div>

                <br>
                <br>

                <div class="flex justify-end">
                    <div class="text-right font-bold">
                        <a href="{{ route('checkout', app()->getLocale()) }}" class="px-10 py-4 rounded-sm bg-bordeaux cursor-pointer hover:bg-red-600 text-white">Process to checkout</a>
                    </div>
                </div>
            @else
                <div class="flex justify-center items-center mt-7 lg:mt-24 lg:mb-32">
                    <p class="text-xl font-semibold">Your cart ist empty &#x1F615;</p>
                </div>
            @endif
        </div>
    </div>

@endsection
