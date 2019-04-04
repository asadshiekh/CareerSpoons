@component('mail::message')
# Respected Sir / Madam 

@component('mail::panel')
{{$text}}
@endcomponent

From ( {{$sender_name}} ) Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
