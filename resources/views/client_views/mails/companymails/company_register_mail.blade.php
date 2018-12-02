@component('mail::message')
# Welcome {{$CompanyName}}

@component('mail::panel')
Please Verifiy Your Email By Click On The Button Below.

@component('mail::button', ['url' => 'careerspoons.com/company-email-verification/'.$CompanyEmail])
Click Me
@endcomponent 
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
