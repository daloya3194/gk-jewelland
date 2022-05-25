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

    public function edit($language, $slug)
    {
        $category = Category::where('slug', $slug)->first();

        return view('admin.category-edit', [
            'category' => $category,
            'nav' => 'categories'
        ]);
    }

    public function update(Request $request, $language, Category $category)
    {
        $data = $this->validator($request->all())->validate();
        $category->update($data);

        return redirect(route('admin.categories', $language));
    }

    public function delete($language, Category $category)
    {
        $category->delete();

        return redirect(route('admin.categories', $language));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|unique:categories,name|max:256',
        ]);
    }
}
