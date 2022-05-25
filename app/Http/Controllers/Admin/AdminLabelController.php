<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminLabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();

        return view('admin.labels', [
            'labels' => $labels,
            'nav' => 'labels'
        ]);
    }

    public function create()
    {
        return view('admin.label-create', [
            'nav' => 'labels'
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        Label::create($data);

        return redirect(route('admin.labels', $request->language));
    }

    public function edit($language, $slug)
    {
        $label = Label::where('slug', $slug)->first();

        return view('admin.label-edit', [
            'label' => $label,
            'nav' => 'labels'
        ]);
    }

    public function update(Request $request, $language, Label $label)
    {
        $data = $this->validator($request->all())->validate();
        $label->update($data);

        return redirect(route('admin.labels', $language));
    }

    public function delete($language, Label $label)
    {
        $label->delete();

        return redirect(route('admin.labels', $language));
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|unique:labels,name|max:256',
        ]);
    }
}
