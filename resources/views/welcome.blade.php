@extends('layouts.app')

@section('content')

    <div class="mt-8 mb-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
            <form class="mb-0 space-y-6" action="#" method="POST">

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required
                        class="">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="password" required
                               class="">
                    </div>
                </div>

                <div>
                    <label for="company-size" class="block text-sm font-medium text-gray-700">Company size</label>
                    <div class="mt-1">
                        <select name="company-size" id="company-size"
                                class="">
                            <option>Please Select</option>
                            <option>1 to 10 employees</option>
                            <option>11 to 50 employees</option>
                            <option>50+ employees</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="terms-and-privacy" name="terms-and-privacy" type="checkbox"
                           class="">
                    <label for="terms-and-privacy" class="ml-2 block text-sm text-gray-900">
                        I agree to the
                        <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms</a>
                        and
                        <a href="#" class="text-indigo-600 hover:text-indigo-500">Privacy Policy</a>
                    </label>
                </div>
            </form>
        </div>
    </div>

    {{--<h1 class="text-xl font-bold text-center">
        Hello world!
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
        Hello world! <br>
    </h1>--}}

    <div class="bg-white">
        <div class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900">Customers also purchased</h2>

            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                <div class="group relative">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="https://tailwindui.com/img/ecommerce-images/product-page-01-related-product-01.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                <a href="#">
                                    <span aria-hidden="true" class="absolute inset-0"></span>
                                    Basic Tee
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">Black</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">$35</p>
                    </div>
                </div>

                <!-- More products... -->
            </div>
        </div>
    </div>

@endsection
