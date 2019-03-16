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
        $info=DB::table('company_availed_packages')->where(['company_package_status'=>'1'])->get();

        if($info){

         foreach ($info as $key){

        // echo $key->package_end_date;
        // echo "<br/>";
            $date = $key->package_start_date;       
            $now= Carbon::now();
            $dat=Carbon::parse($date);
            $days= $dat->diffInDays($now);
            $months= $dat->diffInMonths($now);
            $years= $dat->diffInYears($now);
            if($months > 0)
            { 
                //echo "Month is over <br/>";
                DB::table('company_availed_packages')->where(['company_id'=>$key->company_id])->update(['company_package_status'=>'0']);

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
