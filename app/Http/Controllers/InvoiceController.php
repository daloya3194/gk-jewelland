<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Invoice;
use App\Services\AddressService;
use App\Services\CartDatabaseService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class InvoiceController extends Controller
{
    public function index()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $addresses = null;
        $standard_address = null;

        if (Auth::user() !== null) {
            $addresses = Address::with(['user'])->where('user_id', Auth::id())->get();
            $standard_address = Address::find(Auth::user()->standard_address);
        }

        return view('checkout', [
            'cart' => $cart,
            'addresses' => $addresses,
            'standard_address' => $standard_address,
            'navigation' => 'cart'
        ]);
    }

    public function checkout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect(route('cart', $request->language));
        }

        $data = $this->validator($request->all())->validate();
        Session::put('data', $data);

        $cart = Session::get('cart');

        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', $request->language),
                "cancel_url" => route('cancelTransaction', $request->language),
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "EUR",
                        "value" => $cart->total_price,
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('checkout', $request->language)
                ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('checkout', $request->language)
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }

        /*$data = $this->validator($request->all())->validate();

        $cart = Session::get('cart');

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = UserService::createUser($data, 'guest');
        }

        $invoice = Invoice::create([
            'user_id' => $user->id,
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $invoice->invoice_number = str_pad(((string) $invoice->id), 10, '0', STR_PAD_LEFT);
        $invoice->save();

        CartDatabaseService::createCart($cart, 'invoice_id', $invoice->id);

        AddressService::createAddress($data, 'invoice_id', $invoice->id);

        dd($invoice);*/
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            $this->saveInvoice();
            return redirect()
                ->route('cart', $request->language)
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('checkout', $request->language)
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('checkout', $request->language)
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    private function saveInvoice()
    {
        $cart = Session::get('cart');
        $data = Session::get('data');

        if (Auth::check()) {
            $user = Auth::user();
        } else {
            $user = UserService::createUser($data, 'guest');
        }

        $invoice = Invoice::create([
            'user_id' => $user->id,
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        $invoice->invoice_number = str_pad(((string) $invoice->id), 10, '0', STR_PAD_LEFT);
        $invoice->save();

        CartDatabaseService::createCart($cart, 'invoice_id', $invoice->id);

        AddressService::createAddress($data, 'invoice_id', $invoice->id);

        Session::forget('cart');

        Session::forget('data');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'address' => 'nullable|numeric',
            'firstname' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'street' => 'required|string|max:100',
            'house_number' => 'required|string|max:100',
            'zip_code' => 'required|numeric',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'email' => ['nullable','email','max:100', Rule::unique('users')->where(function ($query) {
                return $query->whereIn('role', ['customer', 'admin'])->get();
            })],
        ]);
    }
}
