@component('mail::message')
# Hello {{$UserName}}

@component('mail::panel')
{{$Reply}}
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent