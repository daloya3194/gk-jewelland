@if(!isset($wishlist) || $wishlist == [])
    <div class="h-full flex justify-center items-center">
        <p class="text-xl font-semibold">You don't have any product here &#x1F615;</p>
    </div>
@else
    <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        @foreach($products as $product)
            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="{{ $product->pictures->first()->complete_path }}" alt="{{ $product->pictures->first()->filename }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-bordeaux">
                            <a href="{{ route('show.product', [app()->getLocale(), $product->slug]) }}">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                {{ $product->{'name_' . app()->getLocale()} ?? $product->name_en }}
                            </a>
                        </h3>
                    </div>
                    <p class="text-sm font-medium text-gray-900">{{ $product->price }}€</p>
                </div>
                @if($product->label)
                    <div class="absolute top-1 left-0 scale-75 md:top-2 md:left-2 md:scale-100 bg-red-600 px-4 py-1 rounded-lg shadow-2xl text-white font-bold">
                        {{ $product->label->{'name_' . app()->getLocale()} ?? $product->label->name_en }}
                    </div>
                @endif
                <small onclick="window.location.href='{{ route('remove-to-wishlist', [app()->getLocale(), $product->slug]) }}'"
                   class="absolute -bottom-6 left-0 hover:text-red-600 cursor-pointer"
                >remove</small>
            </div>
        @endforeach
    </div>
    <br>
@endif
