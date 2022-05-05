@component('mail::message')
# Introduction

Thank you for your order.
Your invoice is in the attachment.
or you can directly download it through this button.

@component('mail::button', ['url' => $invoice_pdf['attach']])
Download your Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
