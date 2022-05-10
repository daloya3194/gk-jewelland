@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Edit Product</p>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">

            <form action="{{ route('admin.products.update', [app()->getLocale(), $product]) }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $product->pictures->first() !== null ? 3 - sizeof($product->pictures) : 3 }}" id="max_number_of_images">
                <input type="hidden" value="{{ $product->pictures->first() !== null ? '0' : '1' }}" id="image_require">
                <div class="grid lg:grid-cols-3 gap-10">
                    <div class="border border-gray-200 p-10 shadow-md lg:col-span-2 " style="height: fit-content">
                        <div class="grid lg:grid-cols-3 gap-3">
                            <div class="lg:col-span-2">
                                <label for="name">Name<span class="text-red-600">*</span></label>
                                <input type="text" id="name" name="name" value="{{ old('name') ?? $product->name }}" required
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
                                    <option value="1" @if($product->status) selected @endif>Active</option>
                                    <option value="0" @if(!$product->status) selected @endif>Inactive</option>
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
                            >{{ old('description') ?? $product->description }}</textarea>
                            @error('description')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-4">
                            <label for="avatar" class="">Media<span class="text-red-600">*</span>(Max {{ isset($product->pictures) ? 3 - sizeof($product->pictures) : 3 }} Pictures)</label>
                            <input id="avatar" type="file" name="avatar[]" autocomplete="avatar" multiple required
                                   class="border border-gray-300 rounded @error('avatar*') border-red-600 ring-red-500 @enderror"
                            >
                            @error('avatar*')
                            <small class="text-red-600">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="lg:col-span-1">
                        <div class="border border-gray-200 p-10 shadow-md" style="height: fit-content">
                            <div class="">
                                <label for="price">Price<span class="text-red-600">*</span></label>
                                <input type="number" id="price" name="price" placeholder="€" value="{{ old('price') ?? $product->price }}" required
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
                                            <option value="{{ $category->id }}" @if(old('category_id') == $category->id || $product->category->id == $category->id) selected @endif>{{ $category->name }}</option>
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
                                            <option value="{{ $label->id }}" @if(old('label_id') == $label->id) selected @elseif(isset($product->label->id) && $product->label->id == $label->id) selected @endif>{{ $label->name }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                                @error('label_id')
                                <small class="text-red-600">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-x-4">
                            @foreach($product->pictures as $picture)
                                <div class="mt-4 relative shadow-md">
                                    <img src="{{ Storage::url($picture->path) }}" alt="dsfsd">
                                    <svg onclick="deleteImage({{ $picture->id }}, '{{ route('admin.image.delete', app()->getLocale()) }}', '{{ url()->current() }}', '{{ csrf_token() }}')"
                                         xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 absolute top-2 right-2 text-red-600 cursor-pointer bg-white rounded-full scale-75 shadow hover:scale-90" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <br>
                <br>
                <div class="flex justify-start gap-5">
                    <button class="px-10 py-3 text-white bg-indigo-400 hover:bg-indigo-600 rounded" type="submit">Save</button>
                    <a class="px-10 py-3 text-white border border-black text-black hover:bg-black hover:text-white rounded" href="{{ route('admin.products', app()->getLocale()) }}">Cancel</a>
                </div>
            </form>

            <br>
            <br>

        </div>

    </div>
@endsection
