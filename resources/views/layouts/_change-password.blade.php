<form class="mb-0 space-y-6" action="{{ route('password-update', app()->getLocale()) }}" method="POST">
    @csrf

    <div>
        <label for="old_password" class="block text-sm font-medium text-gray-700">Old Password<span class="text-red-600">*</span></label>
        <div class="mt-1">
            <input id="old_password" name="old_password" type="password" required minlength="6"
                   class="@error('old_password') border-red-600 ring-red-500 @enderror"
            >
            @error('old_password')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">New Password<span class="text-red-600">*</span></label>
        <div class="mt-1">
            <input id="password" name="password" type="password" required minlength="6"
                   class="@error('password') border-red-600 ring-red-500 @enderror"
            >
            @error('password')
            <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm New Password<span class="text-red-600">*</span></label>
        <div class="mt-1">
            <input id="password_confirmation" name="password_confirmation" type="password" minlength="6"
                   class="@error('password') border-red-600 ring-red-500 @enderror"
            >
            @error('password')
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
