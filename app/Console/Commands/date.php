<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use DB;

class date extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dele:company';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $date=date("Y-m-d");
         DB::table('company_availed_packages')->where('package_end_date','=',$date)->where(['company_id'=>Session::get('company_id')])->delete();
    }
}
