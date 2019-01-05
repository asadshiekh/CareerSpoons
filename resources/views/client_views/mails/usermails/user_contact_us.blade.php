@component('mail::message')
# Welcome {{$UserName}}

@component('mail::panel')
Thanks for Contact us. We try to be as responsive as possible. We'll respond to you soon.
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
