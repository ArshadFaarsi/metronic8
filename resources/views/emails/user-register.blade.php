<x-mail::message>
# Introduction

Password: {{ $message['password'] }}

Email: {{ $message['email'] }}

<x-mail::button :url="'{{url('admin')}}'">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>




@component('mail::message')
# Introduction

Password: {{ $message['password'] }}

Email: {{ $message['email'] }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent

