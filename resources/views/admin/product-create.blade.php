@extends('admin.layout')

@section('content')
    <div class="d-flex">
        <div class=" d-none d-lg-block" style="min-width: 325px"></div>
        <div class="px-0 px-lg-3 px-xl-5 w-100 p-5">

            <div class="row justify-content-start px-3 align-items-center">
                <div class="col-12 h3 ps-0">Create Product</div>
            </div>

            <form class="mt-4" action="{{ route('admin.products.store', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="row mb-4">
                    <div class="col-md-8 mb-3 mb-md-0">
                        <div class="p-3 border shadow-sm bg-white rounded-4">
                            <div class="row justify-content-between mb-3">
                                <div class="col-md-8 mb-3 mb-md-0">
                                    <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                    <select class="form-select" name="status" id="status" aria-label="Default select example">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row justify-content-between mb-3">
                                <div class="">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                            </div>
                            <div>
                                <label for="avatar" class="form-label">Media<span class="text-danger">*</span></label>
                                <input id="avatar" type="file" class="form-control" name="avatar[]" autocomplete="avatar" multiple required>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 border shadow-sm bg-white rounded-4">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div>
                                <label for="category" class="form-label">Select Category<span class="text-danger">*</span></label>
                                <select class="form-select" aria-label="Default select example" id="category" name="category">
                                    <option selected disabled>Please select a category...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex">
                    <div class="me-3">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                    <div class="">
                        <a onclick="window.location.href='{{ route('admin.products', app()->getLocale()) }}'" class="btn btn-outline-dark">Cancel</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
