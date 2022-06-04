<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
        $data = $this->validator($request->all(), $category)->validate();
        $category->update($data);

        return redirect(route('admin.categories', $language));
    }

    public function delete($language, Category $category)
    {
        $category->delete();

        return redirect(route('admin.categories', $language));
    }

    public function validator(array $data, $category = null)
    {
        return Validator::make($data, [
            'name_en' => ['required', 'string', 'max:256', Rule::unique('categories', 'name_en')->ignore($category->id ?? '')],
            'name_fr' => 'nullable|string|max:256',
            'name_de' => 'nullable|string|max:256',
        ]);
    }
}
