@component('mail::message')
# {{ $subject }}

{{ $message }}

{{ config('app.name') }}
@endcomponent
