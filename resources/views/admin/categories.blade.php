@extends('admin.layout')

@section('content')
    <div id="main-content" class="w-full flex-1">

        <div class="p-6 md:p-10 lg:p-16 flex justify-between items-center">
            <div>
                <p class="text-4xl font-semibold">Categories</p>
            </div>
            <div>
                <a class="px-10 py-4 md:px-20 bg-indigo-400 text-white hover:bg-indigo-600 rounded" href="{{ route('admin.categories.create', app()->getLocale()) }}">Create Category</a>
            </div>
        </div>

        <div class="px-6 md:px-10 lg:px-16">
            <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


                <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                    <tr class="text-left">
                        <th data-priority="1">Id</th>
                        <th data-priority="2">Name EN</th>
                        <th data-priority="3">Name FR</th>
                        <th data-priority="4">Name DE</th>
                        <th data-priority="5">Slug</th>
                        <th data-priority="6">Edit</th>
                        <th data-priority="7">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($categories)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name_en }}</td>
                                <td>{{ $category->name_fr }}</td>
                                <td>{{ $category->name_de }}</td>
                                <td>{{ $category->slug }}</td>
                                <td><a class="text-blue-600 hover:text-blue-600 hover:underline" href="{{ route('admin.categories.edit', [app()->getLocale(), $category->slug]) }}">Edit</a></td>
                                <td><a class="text-red-600 hover:text-red-600 hover:underline" href="{{ route('admin.categories.delete', [app()->getLocale(), $category]) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>

                </table>


            </div>
        </div>

    </div>
@endsection
