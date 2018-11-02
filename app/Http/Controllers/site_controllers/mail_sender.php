<?php

namespace App\Http\Controllers\site_controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Site_Mail\User_Mail\User_Registeration;
use Mail;
class mail_sender extends Controller
{
    // public function send(){

    // 	Mail::send(['text'=>'client_views.user_related_pages.main'],['name'=>'CareerSpoons'],function($message){

    // 		$message->to('asadshiekh9@gmail.com','To Asad Shiekh')->subject('CareerSpoons');
    // 		$message->from('careerspoons@gmail.com','CareerSpoons');
    // 	});
    // }

	public function send(){

    	Mail::send(new User_Registeration());
    }

    public function hello(){

    	echo "yahoo";
    }

}
