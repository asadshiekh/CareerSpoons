<?php

namespace App\Mail\Site_Mail\User_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;
use Illuminate\Support\Facades\Session;
class User_Forget_Password extends Mailable
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
         return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->candidate_email,'to ')->subject('Forget Password')->markdown('client_views/mails/usermails/user_forget_password_mail')->with([
                        'UserEmail' => $request->candidate_email,
                        'lastInsertId' => Session::get('lastInsertId'),
                    ]);
    }
}
