@component('mail::message')
# Customer Message

Name: {{ $data['name'] }}
<br>
Email: {{ $data['email'] }}

{{ $data['message'] }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
