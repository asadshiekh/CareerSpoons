<?php

namespace App\Mail\Site_Mail\Company_Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\request;
use DB;


class Company_Payment extends Mailable
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
        //return $this->markdown('client_views/mails/companymails/company_payment_mail');
         $company_id = $request->session()->get('company_id');
         $response = DB::table('company_availed_packages')->where('company_id',$company_id)->first();
    $response->package_start_date = date('d-F-Y',strtotime($response->package_start_date));
    $response->package_end_date = date('d-F-Y',strtotime($response->package_end_date));
        return $this->from('careerspoons@gmail.com','CareerSpoons')->to($request->session()->get('company_email'),'to ')->subject('Receipt')->markdown('client_views/mails/companymails/company_payment_mail')->with([
                        'StripeEmail' => $request->stripeEmail,
                        'Receipt_Number' => $response->company_package_number,
                        'Starting_Time' =>   $response->package_start_date,
                        'Ending_Time' =>   $response->package_end_date,
                    ]);
    }
}
