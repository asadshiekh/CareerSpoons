<?php

namespace App\Mail\Site_Mail\User_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class User_Change_Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        //return $this->markdown('client_views/mails/usermails/user_change_email');
          
          return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->new_email,'to ')->subject('CareerSpoons')->markdown('client_views/mails/usermails/user_change_email')->with([
                        'UserEmail' => $request->new_email,
                    ]);
    }
}
