@extends('layouts.app')

@section('content')
    <!-- Jumbotron -->
    <div
        class="max-w-7xl mx-auto p-12 text-center relative overflow-hidden bg-no-repeat bg-cover"
        style="
    background-image: url('https://media.istockphoto.com/photos/jewelry-on-window-display-picture-id155013169');
    height: 400px;
  "
    >
        <div
            class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
            style="background-color: rgba(0, 0, 0, 0.2)"
        >
            <div class="flex justify-center items-center h-full">
                <div class="text-white">
                    <h2 class="font-semibold text-4xl mb-4">Heading</h2>
                    <h4 class="font-semibold text-xl mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor, hic.</h4>
                    <a
                        class="inline-block px-7 py-3 mb-1 border-2 border-gray-200 text-gray-200 font-medium text-sm leading-snug uppercase rounded hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out"
                        href="#!"
                        role="button"
                        data-mdb-ripple="true"
                        data-mdb-ripple-color="light"
                    >Shop now</a
                    >
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->

    <div class="max-w-2xl mx-auto py-8 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 text-center">New items</h2>

        <div class="mt-6 grid grid-cols-2 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            @isset($new_products)
                @foreach($new_products as $new_product)
                    <div class="group relative">
                        <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($new_product->pictures->first()->path) }}" alt="{{ $new_product->pictures->first()->filename }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-yellow-600">
                                    <a href="{{ route('show.product', [app()->getLocale(), $new_product->slug]) }}">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $new_product->name }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500">{{ substr($new_product->description, 0, 30) }}...</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900">{{ $new_product->price }}€</p>
                        </div>
                        <div class="absolute top-2 left-2 bg-red-600 px-4 py-1 rounded-lg shadow-2xl text-white font-bold">
                            New
                        </div>
                    </div>
                @endforeach
            @endisset
            {{--<div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="https://joliedemoiselle.fr/10909-thickbox_default/bracelet-ashley-perles-eau-douce-plaque-or.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-yellow-600">
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

            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="https://joliedemoiselle.fr/10846-thickbox_default/bracelet-elastique-perle-rose-pierres-rhodonites.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-yellow-600">
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

            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="https://joliedemoiselle.fr/10954-thickbox_default/bracelet-chaine-boules-argent-925-creation-pierre-naturelle.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-yellow-600">
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

            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="https://joliedemoiselle.fr/10931-thickbox_default/bracelet-omali-plaque-or-medaillon-rond-personnalisable-creation-jolie-demoiselle.jpg" alt="Front of men&#039;s Basic Tee in black." class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-yellow-600">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Basic Tee
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Black</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">$35</p>
                </div>
            </div>--}}

            <!-- More products... -->
        </div>

        <br>
        <br>
        <br>
        <br>

        <section class="mb-32 text-gray-800">
            <div class="flex flex-wrap">
                <div class="grow-0 shrink-0 basis-auto mb-6 md:mb-0 w-full md:w-6/12 px-3 lg:px-6">
                    <h2 class="text-3xl font-bold mb-6">Contact us</h2>
                    <p class="text-gray-500 mb-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Laudantium, modi accusantium ipsum corporis quia asperiores
                        dolorem nisi corrupti eveniet dolores ad maiores repellendus enim
                        autem omnis fugiat perspiciatis? Ad, veritatis.
                    </p>
                    <p class="text-gray-500 mb-2">New York, 94126, United States</p>
                    <p class="text-gray-500 mb-2">+ 01 234 567 89</p>
                    <p class="text-gray-500 mb-2">info@gmail.com</p>
                </div>
                <div class="grow-0 shrink-0 basis-auto mb-12 md:mb-0 w-full md:w-6/12 px-3 lg:px-6">
                    <form>
                        <div class="form-group mb-6">
                            <input type="text" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput7"
                                   placeholder="Name">
                        </div>
                        <div class="form-group mb-6">
                            <input type="email" class="form-control block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInput8"
                                   placeholder="Email address">
                        </div>
                        <div class="form-group mb-6">
            <textarea class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
            " id="exampleFormControlTextarea13" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group form-check text-center mb-6">
                            <input type="checkbox"
                                   class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain mr-2 cursor-pointer"
                                   id="exampleCheck87" checked>
                            <label class="form-check-label inline-block text-gray-800" for="exampleCheck87">Send me a copy of this
                                message</label>
                        </div>
                        <button type="submit" class="
            w-full
            px-6
            py-2.5
            bg-blue-600
            text-white
            font-medium
            text-xs
            leading-tight
            uppercase
            rounded
            shadow-md
            hover:bg-blue-700 hover:shadow-lg
            focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
            active:bg-blue-800 active:shadow-lg
            transition
            duration-150
            ease-in-out">Send</button>
                    </form>
                </div>
            </div>
        </section>
    </div>







    {{--<div class="mt-8 mb-8 sm:mx-auto sm:w-full sm:max-w-md">
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
        </div>--}}







@endsection
