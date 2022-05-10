@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Create Product</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form action="{{ route('admin.products.store', app()->getLocale()) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ 3 }}" id="max_number_of_images">
                <input type="hidden" value="1" id="image_require">

                <div class="grid lg:grid-cols-3 gap-10">
                    <div class="border border-gray-200 p-10 shadow-md lg:col-span-2">
                        <div class="grid lg:grid-cols-3 gap-3">
                            <div class="lg:col-span-2">
                                <label for="name">Name<span class="text-red-600">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                       class="@error('name') border-red-600 ring-red-500 @enderror"
                                >
                                @error('name')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="lg:col-span-1">
                                <label for="status">Status<span class="text-red-600">*</span></label>
                                <select name="status" id="status" required
                                        class="@error('status') border-red-600 ring-red-500 @enderror"
                                >
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @error('status')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="description">Description<span class="text-red-600">*</span></label>
                            <textarea type="text" id="description" name="description" rows="3" required
                                      class="@error('description') border-red-600 ring-red-500 @enderror"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="avatar" class="">Media<span class="text-red-600">*</span></label>
                            <input id="avatar" type="file" name="avatar[]" autocomplete="avatar" multiple
                                   class="border border-gray-300 rounded @error('avatar*') border-red-600 ring-red-500 @enderror"
                            >
                            @error('avatar*')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="border border-gray-200 p-10 shadow-md lg:col-span-1 h-80">
                        <div class="">
                            <label for="price">Price<span class="text-red-600">*</span></label>
                            <input type="number" id="price" name="price" placeholder="€" value="{{ old('price') }}" required
                                   class="@error('price') border-red-600 ring-red-500 @enderror"
                            >
                            @error('price')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="category_id">Category<span class="text-red-600">*</span></label>
                            <select name="category_id" id="category_id" required
                                    class="@error('category_id') border-red-600 ring-red-500 @enderror"
                            >
                                <option disabled selected>Please Select...</option>
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('category_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="label_id">Label</label>
                            <select name="label_id" id="label_id"
                                    class="@error('label_id') border-red-600 ring-red-500 @enderror"
                            >
                                <option value="{{ null }}" selected>Please Select...</option>
                                @isset($labels)
                                    @foreach($labels as $label)
                                        <option value="{{ $label->id }}" @if(old('label_id') == $label->id) selected @endif>{{ $label->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                            @error('label_id')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="flex justify-start gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.products', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
