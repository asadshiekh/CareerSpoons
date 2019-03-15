@component('mail::message')
# Congratulations You Have Successfully Purchased Our Package.

@component('mail::panel')

 Your Receipt Number  is : {{$Receipt_Number}}


@component('mail::table')
| Amound Paid   | Date Paid          | Starting Package Date  | Ending Package Date  |
| ------------- |:------------------:| ----------------------:| --------------------:|
| Rs 1,000      | {{$Starting_Time}} | {{$Starting_Time}}     | {{$Ending_Time}}     |
|               |                    |                        |                      |
@endcomponent

@endcomponent

If you have any Questions, Contact us at careerspoons@gmail.com.<br>
 <!-- {{ config('app.name') }} -->
@endcomponent
