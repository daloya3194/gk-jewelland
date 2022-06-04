@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create Category</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form action="{{ route('admin.categories.store', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="">
                    <div class="border border-gray-200 p-10 shadow-md">
                        <div class="">
                            <div class="">
                                <label for="name_en">Name EN<span class="text-red-600">*</span></label>
                                <input type="text" id="name_en" name="name_en" value="{{ old('name_en') }}" required
                                       class="@error('name_en') border-red-600 ring-red-500 @enderror"
                                >
                                @error('name_en')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <label for="name_fr">Name FR</label>
                                <input type="text" id="name_fr" name="name_fr" value="{{ old('name_fr') }}">
                            </div>
                            <div class="mt-4">
                                <label for="name_de">Name DE</label>
                                <input type="text" id="name_de" name="name_de" value="{{ old('name_de') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="flex justify-start gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.categories', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
