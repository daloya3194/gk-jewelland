<nav class="" style="background-color: #F8F8F8">
    <div class="container max-w-7xl mx-auto">
        <div class="py-6 flex justify-between mx-5 md:grid md:grid-cols-3 items-center md:py-8">
            <div class="hidden md:block md:text-left">
                <div class="flex items-center" onclick="showElement('modal_search')">
                    <input id="search" class="cursor-pointer border-2 border-gray-700 hover:border-bordeaux hover:ring-bordeaux rounded-md pl-3 pr-11 w-5/12 h-10" type="text" placeholder="Search" disabled>
                    <button class=" -ml-9 h-10 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </div>
            </div>

            {{--Modal--}}
            <div onclick="hideElementByParentClick('modal_search')" class="bg-black bg-opacity-50 fixed overflow-y-auto inset-0 z-50 flex justify-center hidden" id="modal_search">
                <div class="bg-gray-200 h-fit w-3/4 mt-40 rounded">
                    <livewire:search />
                </div>
            </div>

            <div class="md:text-center">
                <a href="{{ route('welcome', app()->getLocale()) }}">
                    <img class="h-12 w-12 md:h-24 md:w-24 md:mx-auto" src="{{ asset('img/gk_logo.png') }}" alt="GK">
                </a>
            </div>

            <div class="block flex justify-end items-center md:gap-5">
                <div class="md:hidden pr-4 hover:text-bordeaux" onclick="showElement('modal_search')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l2.879-2.879m0 0a3 3 0 104.243-4.242 3 3 0 00-4.243 4.242zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="text-center text-gray-700 hover:text-bordeaux md:-space-y-1 relative cursor-pointer" id="userButton">
                    <div class="hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <div class="mr-2 font-bold md:mr-0 md:font-normal">
                        <small class="">{{ Config::get('languages')[App::getLocale()] }}</small>
                    </div>
                    <div id="userMenu" class="bg-white nunito rounded shadow-md mt-2 absolute mt-12 -top-6  md:top-12 -right-2 min-w-full overflow-auto z-30 invisible">
                        <ul class="list-reset">
                            @foreach (Config::get('languages') as $lang => $language)
                                @if ($lang != App::getLocale())
                                    <li>
                                        <a href="{{ $urlGenerator->toLanguage($lang) }}"
                                           class="px-4 py-2 block text-gray-900 hover:bg-bordeaux hover:text-white no-underline hover:no-underline font-semibold md:font-normal text-sm"
                                        >{{$language}}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="relative text-center text-gray-700 hover:text-bordeaux md:-space-y-1 cursor-pointer @if(isset($navigation) && $navigation == 'account') text-bordeaux @endif"
                     onclick="window.location.href='{{ route('account', [app()->getLocale(), 'account']) }}'"
                     onmouseenter="showElement('account_menu')"
                     onmouseleave="hideElement('account_menu')"
                >
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="hidden md:block">
                        <small class="mx-auto">{{ Auth::check() ? 'Account' : 'Login' }}</small>
                    </div>
                    @auth()
                        <div class="hidden flex flex-col absolute mt-12 -top-6  md:top-12 -right-6 bg-white rounded shadow-md z-30 overflow-hidden" id="account_menu">
                            <a href="{{ route('account', [app()->getLocale(), 'account']) }}"
                               class="text-gray-700 hover:bg-gray-200 px-4 py-2">Account</a>
                            <a href="{{ route('account', [app()->getLocale(), 'order']) }}"
                               class="text-gray-700 hover:bg-gray-200 px-4 py-2">Order</a>
                            <a href="{{ route('account', [app()->getLocale(), 'wishlist']) }}"
                               class="text-gray-700 hover:bg-gray-200 px-4 py-2">Wishlist</a>
                            <hr>
                            <a href="{{ route('logout', app()->getLocale()) }}"
                               class="hover:bg-red-600 hover:text-white px-4 py-2">Logout</a>
                        </div>
                    @endauth
                </div>
                <a class="text-center text-gray-700 hover:text-bordeaux md:-space-y-1 relative @if(isset($navigation) && $navigation == 'cart') text-bordeaux @endif"
                   href="{{ route('cart', app()->getLocale()) }}">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                    <div class="hidden md:block">
                        <small class="cursor-pointer">Cart</small>
                    </div>
                    <small class="bg-red-600 absolute top-0 right-0 rounded-full text-white font-bold px-1 text-xs">{{ session('cart') !== null ? session('cart')->total_quantity : 0 }}</small>
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="text-center bg-white flex justify-center border-t-2 gap-3 md:gap-5 lg:gap-7 xl:gap-10 sticky z-10 block top-0 py-2 md:py-4 uppercase font-bold">
    @foreach(\App\Models\Category::all() as $category)
        <a href="{{ route('show.category', [app()->getLocale(), $category->slug]) }}"
           class="border-b-4 hover:border-bordeaux pb-1 text-gray-700 @if(isset($navigation) && $navigation == $category->slug) border-bordeaux @endif"
        >{{ $category->name }}</a>
    @endforeach

    {{--<a class="hover:border-b-2 border-yellow-600">Wristbands</a>
    <a class="hover:border-b-2 border-yellow-600">Rings</a>--}}
</div>


{{--<select class="p-3 rounded-md shadow-lg" name="cars" id="cars">
    <option value="volvo">Volvo</option>
    <option value="saab">Saab</option>
    <option value="mercedes">Mercedes</option>
    <option value="audi">Audi</option>
</select>--}}



