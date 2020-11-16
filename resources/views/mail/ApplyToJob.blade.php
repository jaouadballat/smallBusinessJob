@component('mail::message')
# New Message from : {{ $job->title }}

{!! $message !!}

@component('mail::button', ['url' => route('agency.dashboard.messages', ['freelancerId' => $freelancer->id, 'jobId' => $job->id])])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
