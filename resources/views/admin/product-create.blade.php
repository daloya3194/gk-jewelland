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
                <div class="grid lg:grid-cols-3 gap-10">
                    <div class="border border-gray-200 p-10 shadow-md lg:col-span-2">
                        <div class="grid lg:grid-cols-3 gap-3">
                            <div class="lg:col-span-2">
                                <label for="name">Name<span class="text-red-600">*</span></label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="lg:col-span-1">
                                <label for="status">Status<span class="text-red-600">*</span></label>
                                <select name="eyes_problems" id="status"
                                        class="" required>
                                    <option value="1" selected>Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="description">Description<span class="text-red-600">*</span></label>
                            <textarea type="text" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mt-4">
                            <label for="avatar" class="">Media<span class="text-red-600">*</span></label>
                            <input id="avatar" type="file" class="border border-gray-300 rounded" name="avatar[]" autocomplete="avatar" multiple required>
                        </div>
                    </div>
                    <div class="border border-gray-200 p-10 shadow-md lg:col-span-1 h-80">
                        <div class="">
                            <label for="price">Price<span class="text-red-600">*</span></label>
                            <input type="number" id="price" name="price" placeholder="€" required>
                        </div>
                        <div class="mt-4">
                            <label for="category_id">Category<span class="text-red-600">*</span></label>
                            <select name="category_id" id="category_id"
                                    class="" required>
                                <option disabled selected>Please Select...</option>
                                @isset($categories)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                        <div class="mt-4">
                            <label for="label_id">Label</label>
                            <select name="label_id" id="label_id"
                                    class="">
                                <option selected>Please Select...</option>
                                @isset($labels)
                                    @foreach($labels as $label)
                                        <option value="{{ $label->id }}">{{ $label->name }}</option>
                                    @endforeach
                                @endisset
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="flex justify-start gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Create</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.products', app()->getLocale()) }}">Create</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
