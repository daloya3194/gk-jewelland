<div class="flex justify-end">
    <button onclick="showElement('modal_add_address')"
            class="rounded flex justify-center py-3 px-8 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
    >+ Add Address</button>
</div>

{{--Modal--}}
<div onclick="hideElementByParentClick('modal_add_address')" class="bg-black bg-opacity-50 absolute inset-0 z-50 flex justify-center hidden" id="modal_add_address">
    <div class="bg-white h-fit w-1/2 mt-40 p-10">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">Add Address</div>
            <br>
            <div onclick="hideElement('modal_add_address')" class="cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 hover:text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <form class="mb-0 space-y-6" action="{{ route('register', app()->getLocale()) }}" method="POST">
            @csrf

            <div class="flex gap-1">
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
                <div class="basis-1/2">
                    <label for="lastname" class="block text-sm font-medium text-gray-700 text-right">Lastname<span class="text-red-600">*</span></label>
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

            <div class="flex gap-1">
                <div class="basis-4/6">
                    <label for="street" class="block text-sm font-medium text-gray-700">Street</label>
                    <div class="mt-1 ">
                        <input id="street" name="street" type="text" value="{{ old('street') }}" autocomplete="on" maxlength="100"
                               class="@error('street') border-red-600 ring-red-500 @enderror"
                        >
                        @error('street')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="basis-2/6">
                    <label for="house_number" class="block text-sm font-medium text-gray-700 text-right">Number</label>
                    <div class="mt-1 ">
                        <input id="house_number" name="house_number" type="text" value="{{ old('house_number') }}" autocomplete="on" maxlength="100"
                               class="@error('house_number') border-red-600 ring-red-500 @enderror"
                        >
                        @error('house_number')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="flex gap-1">
                <div class="basis-2/6">
                    <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip code</label>
                    <div class="mt-1 ">
                        <input id="zip_code" name="zip_code" type="number" value="{{ old('zip_code') }}" autocomplete="on" maxlength="100"
                               class="@error('zip_code') border-red-600 ring-red-500 @enderror"
                        >
                        @error('zip_code')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="basis-4/6">
                    <label for="city" class="block text-sm font-medium text-gray-700 text-right">City</label>
                    <div class="mt-1 ">
                        <input id="city" name="city" type="text" value="{{ old('city') }}" autocomplete="on" maxlength="100"
                               class="@error('city') border-red-600 ring-red-500 @enderror"
                        >
                        @error('city')
                        <small class="text-red-600">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <div class="mt-1">
                    <input id="country" name="country" type="text" value="{{ old('country') }}" autocomplete="on" maxlength="50"
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
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div class="border border-1 flex justify-between items-center p-3 shadow hover:scale-105 cursor-pointer">
        <div>
            <div class="font-bold text-xl">Danick Loic Yagoue</div>
            <div class="">Altendorferstr. 354</div>
            <div class="">45143 Essen</div>
            <div class="">Deutschland</div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </div>
    </div>

    <div class="border border-1 flex justify-between items-center p-3 shadow hover:scale-105 cursor-pointer">
        <div>
            <div class="font-bold text-xl">Danick Loic Yagoue</div>
            <div class="">Altendorferstr. 354</div>
            <div class="">45143 Essen</div>
            <div class="">Deutschland</div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </div>
    </div>

    <div class="border border-1 flex justify-between items-center p-3 shadow hover:scale-105 cursor-pointer">
        <div>
            <div class="font-bold text-xl">Danick Loic Yagoue</div>
            <div class="">Altendorferstr. 354</div>
            <div class="">45143 Essen</div>
            <div class="">Deutschland</div>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-bordeaux" viewBox="0 0 20 20" fill="currentColor">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </div>
    </div>
</div>

