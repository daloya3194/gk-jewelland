<?php

namespace App\Http\Controllers;

use App\Jobs\SendContactUsMessageMailJob;
use App\Mail\SendContactUsMessageMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $new_products = Product::with(['pictures', 'label', 'category'])
            ->where('label_id', 1)
            ->where('status', 1)
            ->get();

        return view('welcome', [
            'new_products' => $new_products,
            'categories' => $categories,
        ]);
    }

    public function sendContactUsMessage(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        SendContactUsMessageMailJob::dispatch($data['name'], $data['email'], $data['message'], $data['send_copy'] ?? null);

//        Mail::to('service@gk-jewelland.com')->when(isset($data['send_copy']), function ($query) use ($data) {
//            $query->cc($data['email']);
//        })->send(new SendContactUsMessageMail($data['name'], $data['email'], $data['message']));

        return redirect()->back()->with('success', 'success');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:600',
            'send_copy' => 'nullable|boolean',
        ]);
    }
}
