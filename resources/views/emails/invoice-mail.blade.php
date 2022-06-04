@component('mail::message')
# Order Confirmation

Hello {{ $data['firstname'] }} {{ $data['lastname'] }},

Thank you for your order.
Your invoice is in the attachment.
or you can directly download it through this button.

@component('mail::button', ['url' => $data['pdf_url']])
Download your Invoice
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
