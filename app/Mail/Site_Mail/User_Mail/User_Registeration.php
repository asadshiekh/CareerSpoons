<?php

namespace App\Mail\Site_Mail\User_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;
class User_Registeration extends Mailable
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
        //return $this->markdown('client_views/mails/usermails/user_register_mail');
        //return $this->view('client_views.user_related_pages.main')->to('nayabzahira161@gmail.com');
        return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->user_email,'to '.$request->candidate_name)->subject('Registeration Process')->markdown('client_views/mails/usermails/user_register_mail')->with([
                        'UserName' => $request->candidate_name,
                        'UserEmail' => $request->user_email,
                    ]);;
    }
}
