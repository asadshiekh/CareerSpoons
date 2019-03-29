@component('mail::message')
# Welcome {{$CompanyEmail}}

@component('mail::panel')
Please Click on the Button to Change Your Password.

@component('mail::button', ['url' => 'careerspoons.com/create-company-password/'])
Click Me
@endcomponent 
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
