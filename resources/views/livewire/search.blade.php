<div class="p-5">
    <div class="flex justify-between items-center md:px-10">
        <div class="basis-4/5 grid grid-cols-1 md:grid-cols-3 gap-1">
            <div class="relative">
                <input type="text" class="" placeholder="Search a product" wire:model="query" autofocus>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 absolute top-0 right-0 mt-2 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div>
                <select wire:model="price_range_key">
                    <option value="0">All prices</option>
                    <option value="1">Price under 25€</option>
                    <option value="2">25€ to 100€</option>
                    <option value="3">100€ to 500€</option>
                    <option value="4">500€ and above</option>
                </select>
            </div>

            <div>
                <select wire:model="sort">
                    <option value="price.asc">Price: ascending</option>
                    <option value="price.desc">Price descending</option>
                    <option value="label_id.desc">New products first</option>
                </select>
            </div>
        </div>

        <div class="cursor-pointer" onclick="hideElement('modal_search')">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:scale-110 hover:text-bordeaux" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>

    <br>
    <hr class="border-gray-400">
    <br>

    @if(strlen($query) > 1 && isset($products[0]))
        <div class="text-center text-gray-700 text-xl">Search Results for <span class="font-semibold">"{{ $query }}"</span></div>
    <br>
        <div class="grid grid-cols-2 gap-2 sm:grid-cols-2 lg:grid-cols-4 px-0">
            @foreach($products as $product)
                <div class="group relative scale-90">
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
                        <div class="absolute top-1 left-0 bg-red-600 px-4 py-1 rounded-lg shadow-2xl text-white font-bold scale-75 md:top-2 md:left-2 md:scale-100">
                            {{ $product->label->{'name_' . app()->getLocale()} ?? $product->label->name_en }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @else
        @if(strlen($query) > 1)
            <div class="text-center">No Result for <span class="font-semibold">"{{ $query }}"</span></div>
        @else
            <div class="text-center">Type something (min 2 characters)</div>
        @endif

    @endif

    @if($number_of_taking_products < $number_of_products)
        <br>
        <div class="px-0 sm:px-4 xl:px-0">
            <div wire:click="$set('number_of_taking_products', {{ $number_of_taking_products += 8 }})" class="cursor-pointer px-5 py-2 bg-bordeaux text-white font-semibold rounded-md w-fit scale-75 sm:scale-100 hover:bg-red-700">Load more...</div>
        </div>
    @endif
</div>
