<?php

namespace App\Mail\Admin_Mail\User_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class Reply_Contact_Us extends Mailable
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
        $request->msg=str_ireplace('<p>','',$request->msg);
        $request->msg=str_ireplace('</p>','',$request->msg);
        return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->y,'to '.$request->z)->subject('CareerSpoons')->markdown('admin_views/mail_views/reply_contact_us_admin')->with([
                        'UserName' => $request->z,
                        'UserEmail' => $request->y,
                        'Reply' => $request->msg,
                    ]);

        // return $this->markdown('admin_views/mail_views/reply_contact_us_admin');
    }
}
