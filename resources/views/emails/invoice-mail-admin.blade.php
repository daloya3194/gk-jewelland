@component('mail::message')
# Hi Admin,

You have a new order in the online shop.

@component('mail::button', ['url' => $data['pdf_url']])
    Orders Details
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
