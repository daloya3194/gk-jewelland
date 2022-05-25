<form class="mb-0 space-y-6" action="{{ route('account-update', app()->getLocale()) }}" method="POST">
    @csrf

    <div class="md:flex gap-1">
        <div class="md:basis-1/2">
            <label for="firstname" class="block text-sm font-medium text-gray-700">Firstname<span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="firstname" name="firstname" type="text" value="{{ old('firstname') ?? Auth::user()->firstname }}" autocomplete="on" required maxlength="100"
                       class="@error('firstname') border-red-600 ring-red-500 @enderror"
                >
                @error('firstname')
                <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="md:basis-1/2 mt-5 md:mt-0">
            <label for="lastname" class="block text-sm font-medium text-gray-700">Lastname<span class="text-red-600">*</span></label>
            <div class="mt-1">
                <input id="lastname" name="lastname" type="text" value="{{ old('lastname') ?? Auth::user()->lastname }}" autocomplete="on" required maxlength="100"
                       class="@error('lastname') border-red-600 ring-red-500 @enderror"
                >
                @error('lastname')
                <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email address<span class="text-red-600">*</span></label>
        <div class="mt-1">
            <input id="email" name="email" type="email" value="{{ old('email') ?? Auth::user()->email }}" autocomplete="on" required maxlength="100" readonly
                   class="@error('email') border-red-600 ring-red-500 @enderror"
            >
            @error('email')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div>
        <button type="submit"
                class="w-full rounded flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium text-white bg-bordeaux hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:border-bordeaux"
        >Update</button>
    </div>
</form>
