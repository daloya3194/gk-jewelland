<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories', [
            'categories' => $categories,
            'nav' => 'categories'
        ]);
    }

    public function create()
    {
        return view('admin.category-create', [
            'nav' => 'categories'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        Category::create($data);

        return redirect(route('admin.categories', $request->language));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:256',
        ]);
    }
}
