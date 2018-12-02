<?php

namespace App\Mail\Site_Mail\Company_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;

class Company_Registeration extends Mailable
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
         return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->company_email,'to '.$request->company_name)->subject('Registeration Process')->markdown('client_views/mails/companymails/company_register_mail')->with([
                        'CompanyName' => $request->company_name,
                        'CompanyEmail' => $request->company_email,
                    ]);;
    }
}
