<?php

namespace App\Services;

use App\Models\CartItem;
use App\Models\Invoice;
use App\Models\Product;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class PDFService
{
    public static function generateInvoicePDF($user, $data, $invoice)
    {
        $customer = new Buyer([
            'name'          => $user->firstname . ' ' . $user->lastname,
            'custom_fields' => [
                'email' => $user->email,
            ],
        ]);

        $invoice_db = Invoice::with(['cart'])->find($invoice->id);
        $cart_items = CartItem::where('cart_id', $invoice_db->cart->id)->get();
        $items = null;

        foreach ($cart_items as $cart_item) {
            $product = Product::find($cart_item->item);
            $items [] = (new InvoiceItem())
                ->title($product->name)
                ->description($product->description)
                ->pricePerUnit($product->price)
                ->quantity($cart_item->quantity);
        }

        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($customer)
            ->status(__('invoices::invoice.paid'))
            ->currencySymbol('€')
            ->currencyCode('EUR')
            ->addItems($items)
            ->logo(public_path('img/gk_logo.png'))
            ->save('public');

        return [
            'attach' => $invoice->url(),
            'download' => $invoice->download(),
        ];
    }
}
