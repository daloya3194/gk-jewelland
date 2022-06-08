<div class="">
    <div class="flex justify-between items-end px-4 xl:px-0">

        <div>
            <select wire:model="price_range_key">
                <option value="0">Price range</option>
                <option value="1">Price under 25€</option>
                <option value="2">25€ to 100€</option>
                <option value="3">100€ to 500€</option>
                <option value="4">500€ and above</option>
            </select>
        </div>

        <div>
            <select wire:model="sort_direction">
                <option value="asc">Price asc</option>
                <option value="desc">Price desc</option>
            </select>
        </div>
    </div>

    <br>

    <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8 px-5 xl:px-0">
        @isset($category_filtered)
            @foreach($category_filtered as $product)
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
                            <p class="mt-1 text-sm text-gray-500">{{ substr($product->{'description_' . app()->getLocale()} ?? $product->description_en, 0, 30) }}...</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ $product->price }}€</p>
                    </div>
                    @if($product->label)
                        <div class="absolute top-1 left-0 scale-75 md:top-2 md:left-2 md:scale-100 bg-red-600 px-4 py-1 rounded-lg shadow-2xl text-white font-bold">
                            {{ $product->label->{'name_' . app()->getLocale()} ?? $product->label->name_en }}
                        </div>
                    @endif
                </div>
            @endforeach
        @endisset
    </div>
    @if($number_of_taking_products < $number_of_products)
        <br>
    <div class="px-0 sm:px-4 xl:px-0">
        <div wire:click="load" class="cursor-pointer px-5 py-2 bg-bordeaux text-white font-semibold rounded-md w-fit scale-75 sm:scale-100 hover:bg-red-700">Load more...</div>
    </div>
    @endif
</div>
