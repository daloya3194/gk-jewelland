<div class="mt-5 md:mt-20 grid grid-cols-5 gap-1 bg-gray-100 p-1">
    <div class="col-span-5 md:col-span-1 bg-white">
        <br>
        <div class="py-2 px-5 font-bold">My Account</div>
        <hr class="mx-auto">
        <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'account', 'personal-information']) }}'"
             class="py-3 px-5 hover:bg-gray-200 cursor-pointer {{ $section_2 == 'personal-information' ? 'bg-gray-100' : ''}}">
            <a>Personal Information</a>
        </div>
        <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'account', 'change-password']) }}'"
             class="py-3 px-5 hover:bg-gray-200 cursor-pointer {{ $section_2 == 'change-password' ? 'bg-gray-100' : ''}}">
            <a>Change Password</a>
        </div>
        <div onclick="window.location.href='{{ route('account', [app()->getLocale(), 'account', 'addresses']) }}'"
             class="py-3 px-5 hover:bg-gray-200 cursor-pointer {{ $section_2 == 'addresses' ? 'bg-gray-100' : ''}}">
            <a>Addresses</a>
        </div>
    </div>
    <div class="col-span-5 md:col-span-4 bg-white p-5">
        @if($section_2 == 'personal-information')
            @include('layouts._personal-information')
        @endif

        @if($section_2 == 'change-password')
            @include('layouts._change-password')
        @endif

        @if($section_2 == 'addresses')
            @include('layouts._addresses')
        @endif
    </div>
</div>
