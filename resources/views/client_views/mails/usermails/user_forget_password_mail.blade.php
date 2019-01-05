@component('mail::message')
# Welcome {{$UserEmail}}

@component('mail::panel')
Please Click on the Button to Change Your Password.

@component('mail::button', ['url' => 'careerspoons.com/create-candidate-password/'])
Click Me
@endcomponent 
@endcomponent

Thanks,<br>
CareerSpoons <!-- {{ config('app.name') }} -->
@endcomponent
