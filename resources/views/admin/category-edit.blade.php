@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Edit Category</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form action="{{ route('admin.categories.update', [app()->getLocale(), $category]) }}" method="POST">
                @csrf
                <div class="">
                    <div class="border border-gray-200 p-10 shadow-md">
                        <div class="">
                            <div class="">
                                <label for="name">Name<span class="text-red-600">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') ?? $category->name }}" required
                                       class="@error('name') border-red-600 ring-red-500 @enderror"
                                >
                                @error('name')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="flex justify-start gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Save</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.categories', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
