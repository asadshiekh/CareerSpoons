@component('mail::message')
# Welcome Candidate

@component('mail::panel')
Please Verifiy Your Email By Click On The Button Below.

@component('mail::button', ['url' => 'careerspoons.com/candidate-email-verification/'.$UserEmail])
Click Me
@endcomponent 
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
