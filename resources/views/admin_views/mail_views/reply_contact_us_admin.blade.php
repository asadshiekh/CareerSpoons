@component('mail::message')
# Welcome {{$UserName}}

@component('mail::panel')
{{$Reply}}
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent