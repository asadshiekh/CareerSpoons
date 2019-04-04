<?php

namespace App\Mail\Admin_Mail\Custom_Email;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class CustomEmail extends Mailable
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
        
          $name = $request->session()->get('admin_name');
         //  $ad_email = $request->session()->get('admin_email');
       
   
        return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->to,'to ')->subject('CareerSpoons')->markdown('admin_views/mail_views/Custom_Email')->with([
                        'text' => $request->text,
                        'sender_name' => $name,
                    ]);
        // return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->y,'to '.$request->z)->subject('CareerSpoons')->markdown('admin_views/mail_views/Custom_Email')->with([
        //                 'UserName' => $request->z,
        //                 'UserEmail' => $request->y,
        //                 'Reply' => $request->msg,
        //             ]);
       
    }
}
