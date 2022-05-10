@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Product</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded" href="{{ route('admin.products.create', app()->getLocale()) }}">Create Product</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Description</th>
                        <th data-priority="3">Category</th>
                        <th data-priority="4">Price</th>
                        <th data-priority="5">Status</th>
                        <th data-priority="6">Label</th>
                        <th data-priority="7">Edit</th>
                        <th data-priority="8">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($products)
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description ?? '' }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->status ? 'active' : 'inactive' }}</td>
                                <td>{{ $product->label->name ?? '' }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.products.edit', [app()->getLocale(), $product->slug]) }}">Edit</a></td>
                                <td><a class="text-red-600 hover:text-red-600 hover:underline" href="{{ route('admin.products.delete', [app()->getLocale(), $product]) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>

                </table>


            </div>
        </div>

    </div>
@endsection
