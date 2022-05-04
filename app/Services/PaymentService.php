<?php

namespace App\Services;

use App\Models\Payment;

class PaymentService
{
    public static function createPayment($invoice_id, $type, $transaction)
    {
        Payment::create([
            'invoice_id' => $invoice_id,
            'type' => $type,
            'transaction_number' => $transaction['purchase_units'][0]['payments']['captures'][0]['id'],
            'status' => $transaction['status'],
        ]);
    }
}
