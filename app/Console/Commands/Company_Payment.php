<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use DB;

class Company_Payment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Company:Payment_Availability';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Ensure The Company Packages Availability';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $info=DB::table('company_availed_packages')->join('company_advertised_logo','company_availed_packages.company_id', '=','company_advertised_logo.company_id')->join('advertised_logos','company_availed_packages.company_id', '=','advertised_logos.company_id')->select('company_availed_packages.*','company_advertised_logo.*','advertised_logos.*')->where(['company_package_status'=>'1'])->get();

        if($info){

         foreach ($info as $key){

        // echo $key->package_end_date;
        // echo "<br/>";
            $date = $key->display_start_date; 
            $date=str_replace(".","-",$date);    
            $now= Carbon::now();
            $dat=Carbon::parse($date);
            $days= $dat->diffInDays($now);
            $months= $dat->diffInMonths($now);
            $years= $dat->diffInYears($now);
            if($months > 0)
            { 

                //echo "Month is over <br/>";

                $current_date = date("Y.m.d h:i:s");
                $user_response12 = array(
                    'company_id' => $key->company_id,
                    'package_id' => $key->package_id,
                    'subscription_email' => $key->subscription_email,
                    'company_package_number' => $key->company_package_number,
                    'package_start_date' => $key->package_start_date,
                    'package_end_date' => $key->package_end_date,
                    'company_logo' => $key->company_logo,
                    'created_at' => $current_date,
                );

                DB::table('availed_package_records')->insert($user_response12);

                $user_response123 = array(
                    'company_logo' => Null,
                    'company_logo_status' => '0',
                    'company_logo_submitted' => '0',
                    'updated_at' => $current_date,
                );

                 DB::table('company_availed_packages')->where(['company_id'=>$key->company_id])->update(['company_package_status'=>'0']);

                
                DB::table('company_advertised_logo')->where(['company_id'=>$key->company_id])->update($user_response123);
                
            }else{
            //$days=$days-3;
                 $d=date("d",strtotime('+1 days'));
                //echo "<br/>";
                 $o=date('d', strtotime($date)); 
                //echo "<br/><br/><br/><br/>";

                if($d > $o){
                    $day=($d-$o);
                    $day=30-$day;

                }else if($d == $o){
                    $cm=date("m",strtotime('+1 days'));
                    $sm=date('m', strtotime($date)); 
                    if($cm == $sm){
                        $day=30;
                    }else{
                        $day=$d-$o;
                    }

                }
                else{     
                    $day=($o-$d);
                }

                //echo "abi ha time ".$day." days <br/>";
                echo "Cron Automatically Handel All Your Companies Payment Package Availability";
            }
        }
    }
    else{

        echo "No Company Found Who Availed The Package Yet";
    }

}
}
