<div class="flex justify-end">
    <button onclick="showElement('modal_add_address')"
            class="rounded flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
    >+ Add Address</button>
</div>

{{--Modal--}}
<div onclick="hideElementByParentClick('modal_add_address')" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center hidden" id="modal_add_address">
    <div class="bg-white h-fit w-5/6 xl:w-1/2 mt-40 p-10">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">Add Address</div>
            <br>
            <div onclick="hideElement('modal_add_address')" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <form class="mb-0 space-y-6" action="{{ route('address-add', app()->getLocale()) }}" method="POST">
            @csrf

            <div class="md:flex gap-1">
                <div class="basis-1/2">
                    <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-600">*</span></label>
                    <div class="mt-1">
                        <input id="firstname" name="firstname" type="text" value="{{ old('firstname') }}" autocomplete="on" required maxlength="100"
                               class="@error('firstname') border-red-600 ring-red-500 @enderror"
                        >
                        @error('firstname')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="basis-1/2 mt-5 md:mt-0">
                    <label for="lastname" class="block text-sm font-medium text-gray-700 md:text-right">Lastname<span class="text-red-600">*</span></label>
                    <div class="mt-1">
                        <input id="lastname" name="lastname" type="text" value="{{ old('lastname') }}" autocomplete="on" required maxlength="100"
                               class="@error('lastname') border-red-600 ring-red-500 @enderror"
                        >
                        @error('lastname')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:flex gap-1">
                <div class="basis-4/6">
                    <label for="street" class="block text-sm font-medium text-gray-700">Street<span class="text-red-600">*</span></label>
                    <div class="mt-1 ">
                        <input id="street" name="street" type="text" value="{{ old('street') }}" autocomplete="on" maxlength="100" required
                               class="@error('street') border-red-600 ring-red-500 @enderror"
                        >
                        @error('street')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="basis-2/6 mt-5 md:mt-0">
                    <label for="house_number" class="block text-sm font-medium text-gray-700 md:text-right">Number<span class="text-red-600">*</span></label>
                    <div class="mt-1 ">
                        <input id="house_number" name="house_number" type="text" value="{{ old('house_number') }}" autocomplete="on" maxlength="100" required
                               class="@error('house_number') border-red-600 ring-red-500 @enderror"
                        >
                        @error('house_number')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="md:flex gap-1">
                <div class="basis-2/6">
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip code<span class="text-red-600">*</span></label>
                    <div class="mt-1 ">
                        <input id="zip_code" name="zip_code" type="number" value="{{ old('zip_code') }}" autocomplete="on" maxlength="100" required
                               class="@error('zip_code') border-red-600 ring-red-500 @enderror"
                        >
                        @error('zip_code')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="basis-4/6 mt-5 md:mt-0">
                    <label for="city" class="block text-sm font-medium text-gray-700 md:text-right">City<span class="text-red-600">*</span></label>
                    <div class="mt-1 ">
                        <input id="city" name="city" type="text" value="{{ old('city') }}" autocomplete="on" maxlength="100" required
                               class="@error('city') border-red-600 ring-red-500 @enderror"
                        >
                        @error('city')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country<span class="text-red-600">*</span></label>
                <div class="mt-1">
                    <input id="country" name="country" type="text" value="{{ old('country') }}" autocomplete="on" maxlength="50" required
                           class="@error('country') border-red-600 ring-red-500 @enderror"
                    >
                    @error('country')
                    <small class="text-red-600">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <button type="submit"
                        class="w-full rounded flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
                >Add address</button>
            </div>
        </form>
    </div>
</div>

<br>

@isset($standard_address)
    <div class="text-xl font-semibold underline">Standard Shipping Address</div>
    <br>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="border border-1 flex justify-between items-center p-3 shadow hover:scale-105 cursor-pointer">
            <div onclick="showElement('modal_add_address{{ $standard_address->id }}')">
                <div class="font-bold text-xl">{{ $standard_address->firstname }} {{ $standard_address->lastname }}</div>
                <div class="">{{ $standard_address->street }} {{ $standard_address->house_number }}</div>
                <div class="">{{ $standard_address->zip_code }} {{ $standard_address->city }}</div>
                <div class="">{{ $standard_address->country }}</div>
            </div>
            <div class="flex justify-between gap-x-2 sm:gap-x-3 items-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                </div>
                <div onclick="showElement('modal_add_address{{ $standard_address->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-bordeaux" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div onclick="window.location.href='{{ route('address-delete', [app()->getLocale(), $standard_address->id]) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
            </div>
        </div>

        {{--Modal--}}
        <div onclick="hideElementByParentClick('modal_add_address{{ $standard_address->id }}')" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center hidden" id="modal_add_address{{ $standard_address->id }}">
            <div class="bg-white h-fit w-5/6 xl:w-1/2 mt-40 p-10">
                <div class="flex justify-between items-center">
                    <div class="text-2xl font-bold">Add Address</div>
                    <br>
                    <div onclick="hideElement('modal_add_address{{ $standard_address->id }}')" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <form class="mb-0 space-y-6" action="{{ route('address-update', [app()->getLocale(), $standard_address->id]) }}" method="POST">
                    @csrf

                    <div class="md:flex gap-1">
                        <div class="basis-1/2">
                            <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="firstname" name="firstname" type="text" value="{{ old('firstname') ?? $standard_address->firstname }}" autocomplete="on" required maxlength="100"
                                       class="@error('firstname') border-red-600 ring-red-500 @enderror"
                                >
                                @error('firstname')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-1/2 mt-5 md:mt-0">
                            <label for="lastname" class="block text-sm font-medium text-gray-700 md:text-right">Lastname<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="lastname" name="lastname" type="text" value="{{ old('lastname') ?? $standard_address->lastname }}" autocomplete="on" required maxlength="100"
                                       class="@error('lastname') border-red-600 ring-red-500 @enderror"
                                >
                                @error('lastname')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="md:flex gap-1">
                        <div class="basis-4/6">
                            <label for="street" class="block text-sm font-medium text-gray-700">Street<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="street" name="street" type="text" value="{{ old('street') ?? $standard_address->street }}" autocomplete="on" maxlength="100" required
                                       class="@error('street') border-red-600 ring-red-500 @enderror"
                                >
                                @error('street')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-2/6 mt-5 md:mt-0">
                            <label for="house_number" class="block text-sm font-medium text-gray-700 md:text-right">Number<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="house_number" name="house_number" type="text" value="{{ old('house_number') ?? $standard_address->house_number }}" autocomplete="on" maxlength="100" required
                                       class="@error('house_number') border-red-600 ring-red-500 @enderror"
                                >
                                @error('house_number')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="md:flex gap-1">
                        <div class="basis-2/6">
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip code<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="zip_code" name="zip_code" type="number" value="{{ old('zip_code') ?? $standard_address->zip_code }}" autocomplete="on" maxlength="100" required
                                       class="@error('zip_code') border-red-600 ring-red-500 @enderror"
                                >
                                @error('zip_code')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-4/6 mt-5 md:mt-0">
                            <label for="city" class="block text-sm font-medium text-gray-700 md:text-right">City<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="city" name="city" type="text" value="{{ old('city') ?? $standard_address->city }}" autocomplete="on" maxlength="100" required
                                       class="@error('city') border-red-600 ring-red-500 @enderror"
                                >
                                @error('city')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country<span class="text-red-600">*</span></label>
                        <div class="mt-1">
                            <input id="country" name="country" type="text" value="{{ old('country') ?? $standard_address->country }}" autocomplete="on" maxlength="50" required
                                   class="@error('country') border-red-600 ring-red-500 @enderror"
                            >
                            @error('country')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full rounded flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
                        >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endisset

<br>
<hr>
<br>

@isset($addresses)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @foreach($addresses as $address)
        <div class="border border-1 flex justify-between items-center p-3 shadow hover:scale-105 cursor-pointer">
            <div onclick="showElement('modal_add_address{{ $address->id }}')">
                <div class="font-bold text-xl">{{ $address->firstname }} {{ $address->lastname }}</div>
                <div class="">{{ $address->street }} {{ $address->house_number }}</div>
                <div class="">{{ $address->zip_code }} {{ $address->city }}</div>
                <div class="">{{ $address->country }}</div>
            </div>
            <div class="flex justify-between gap-x-2 sm:gap-x-3 items-center">
                <div onclick="window.location.href='{{ route('address-standard', [app()->getLocale(), $address->id]) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9 hover:text-bordeaux" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                </div>
                <div onclick="showElement('modal_add_address{{ $address->id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 hover:text-bordeaux" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </div>
                <div onclick="window.location.href='{{ route('address-delete', [app()->getLocale(), $address->id]) }}'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-500 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>
            </div>
        </div>

        {{--Modal--}}
        <div onclick="hideElementByParentClick('modal_add_address{{ $address->id }}')" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center hidden" id="modal_add_address{{ $address->id }}">
            <div class="bg-white h-fit w-5/6 xl:w-1/2 mt-40 p-10">
                <div class="flex justify-between items-center">
                    <div class="text-2xl font-bold">Add Address</div>
                    <br>
                    <div onclick="hideElement('modal_add_address{{ $address->id }}')" class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <form class="mb-0 space-y-6" action="{{ route('address-update', [app()->getLocale(), $address->id]) }}" method="POST">
                    @csrf

                    <div class="md:flex gap-1">
                        <div class="basis-1/2">
                            <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="firstname" name="firstname" type="text" value="{{ old('firstname') ?? $address->firstname }}" autocomplete="on" required maxlength="100"
                                       class="@error('firstname') border-red-600 ring-red-500 @enderror"
                                >
                                @error('firstname')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-1/2 mt-5 md:mt-0">
                            <label for="lastname" class="block text-sm font-medium text-gray-700 md:text-right">Lastname<span class="text-red-600">*</span></label>
                            <div class="mt-1">
                                <input id="lastname" name="lastname" type="text" value="{{ old('lastname') ?? $address->lastname }}" autocomplete="on" required maxlength="100"
                                       class="@error('lastname') border-red-600 ring-red-500 @enderror"
                                >
                                @error('lastname')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="md:flex gap-1">
                        <div class="basis-4/6">
                            <label for="street" class="block text-sm font-medium text-gray-700">Street<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="street" name="street" type="text" value="{{ old('street') ?? $address->street }}" autocomplete="on" maxlength="100" required
                                       class="@error('street') border-red-600 ring-red-500 @enderror"
                                >
                                @error('street')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-2/6 mt-5 md:mt-0">
                            <label for="house_number" class="block text-sm font-medium text-gray-700 md:text-right">Number<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="house_number" name="house_number" type="text" value="{{ old('house_number') ?? $address->house_number }}" autocomplete="on" maxlength="100" required
                                       class="@error('house_number') border-red-600 ring-red-500 @enderror"
                                >
                                @error('house_number')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="md:flex gap-1">
                        <div class="basis-2/6">
                            <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip code<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="zip_code" name="zip_code" type="number" value="{{ old('zip_code') ?? $address->zip_code }}" autocomplete="on" maxlength="100" required
                                       class="@error('zip_code') border-red-600 ring-red-500 @enderror"
                                >
                                @error('zip_code')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="basis-4/6 mt-5 md:mt-0">
                            <label for="city" class="block text-sm font-medium text-gray-700 md:text-right">City<span class="text-red-600">*</span></label>
                            <div class="mt-1 ">
                                <input id="city" name="city" type="text" value="{{ old('city') ?? $address->city }}" autocomplete="on" maxlength="100" required
                                       class="@error('city') border-red-600 ring-red-500 @enderror"
                                >
                                @error('city')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="country" class="block text-sm font-medium text-gray-700">Country<span class="text-red-600">*</span></label>
                        <div class="mt-1">
                            <input id="country" name="country" type="text" value="{{ old('country') ?? $address->country }}" autocomplete="on" maxlength="50" required
                                   class="@error('country') border-red-600 ring-red-500 @enderror"
                            >
                            @error('country')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="w-full rounded flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
                        >Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
    </div>
@endisset
