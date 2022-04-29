<nav class="bg-yellow-200 bg-opacity-10">
    <div class="container max-w-7xl mx-auto">
        <div class="py-6 flex justify-between mx-5 md:grid md:grid-cols-3 items-center md:py-8">
            <div class="hidden md:block md:text-left">
                <form class="flex items-center">
                    <input id="search" class="border-2 border-gray-400 focus:border-yellow-600 focus:ring-yellow-600 rounded-md pl-3 pr-11 w-5/12 h-10" type="text" placeholder="Search">
                    <button type="submit" class=" -ml-9 h-10 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
            <div class="md:text-center">
                <a href="{{ route('welcome', app()->getLocale()) }}">
                    <img class="h-12 w-12 md:h-24 md:w-24 md:mx-auto" src="/img/gk_logo.png" alt="GK">
                </a>
            </div>
            <div class="block flex justify-end items-center md:gap-5">
                {{--<form class="">
                    <select class="h-10 md:h-full border-none focus:border-none focus:ring-0">
                        <option>EN</option>
                        <option>FR</option>
                        <option>DE</option>
                    </select>
                </form>--}}
                <a class="text-center text-gray-600 hover:text-yellow-600 md:-space-y-1" href="#">
                    <div class="hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <div class="mr-2 font-bold md:mr-0 md:font-normal">
                        <small class="">EN</small>
                    </div>
                </a>
                <a class="text-center text-gray-600 hover:text-yellow-600 md:-space-y-1 @if(isset($navigation) && $navigation == 'account') text-yellow-600 @endif"
                   href="{{ route('account', app()->getLocale()) }}">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-10 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="hidden md:block">
                        <small class="mx-auto">Account</small>
                    </div>
                </a>
                <a class="text-center text-gray-600 hover:text-yellow-600 md:-space-y-1 relative @if(isset($navigation) && $navigation == 'cart') text-yellow-600 @endif"
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
<div class="text-center bg-white flex justify-center border-t-2 gap-10 sticky z-10 block top-0 py-2 md:py-4 uppercase font-bold">
    @foreach(\App\Models\Category::all() as $category)
        <a href="{{ route('show.category', [app()->getLocale(), $category->slug]) }}"
           class="border-b-4 border-white hover:border-yellow-600 pb-1 @if(isset($navigation) && $navigation == $category->slug) border-yellow-600 @endif"
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



