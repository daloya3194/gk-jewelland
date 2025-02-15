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
                trans('invoices::invoice.address_name') => $data['firstname'] . ' ' . $data['lastname'],
                trans('invoices::invoice.street')       => $data['street'] . ' ' . $data['house_number'],
                trans('invoices::invoice.city')         => $data['zip_code'] . ' ' . $data['city'],
                trans('invoices::invoice.country')      => $data['country'],
                trans('invoices::invoice.email')        => $user->email,
            ],
        ]);

        $invoice_db = Invoice::with(['cart'])->find($invoice->id);
        $cart_items = CartItem::where('cart_id', $invoice_db->cart->id)->get();
        $items = null;

        foreach ($cart_items as $cart_item) {
            $product = Product::find($cart_item->item);
            $items [] = (new InvoiceItem())
                ->title($product->{'name_' . app()->getLocale()} ?? $product->name_en)
                ->description($product->{'description_' . app()->getLocale()} ?? $product->description_en)
                ->pricePerUnit($product->price)
                ->quantity($cart_item->quantity);
        }

        $invoice = \LaravelDaily\Invoices\Invoice::make()
            ->buyer($customer)
            ->status(__('invoices::invoice.paid'))
            ->sequence((int) $invoice->invoice_number)
            ->serialNumberFormat('{SEQUENCE}')
            ->dateFormat('d.m.Y')
            ->currencySymbol('€')
            ->currencyCode('EUR')
            ->filename('Invoice_' . $invoice->invoice_number . '_' . $user->lastname)
            ->addItems($items)
            ->logo(public_path('img/gk_logo.png'))
            ->save('public');

        return $invoice->url();
    }
}
