<?php

namespace dbtiPortal\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use dbtiPortal\Http\Requests;

class MailController extends Controller
{
    static function sendEmailConfirmation($reservation){
        
        Mail::send('email.elecConfirmation',['reservation' =>$reservation], function ($m) {
            $m->from(env('MAIL_USERNAME'), 'Don Bosco Portal');
            //$m->to('vincent@nephilaweb.com.ph',  \Auth::User()->lastname." ,".\Auth::User()->firstname)->subject('We have received your request');
            $m->to(\Auth::User()->email, \Auth::User()->lastname." ,".\Auth::User()->firstname)->subject('We have received your request');
        });
    }
    
    static function sendTempPassword($info,$password){
        Mail::queue('auth.emails.temppassword',['info'=>$info,'password'=>$password], function ($m)use($info) {
            $m->from(env('MAIL_USERNAME'), 'Don Bosco Portal');
            //$m->to('vincent@nephilaweb.com.ph', 'John Vincent')->subject('Temporary Password');
            $m->to($info->email, $info->lastname." ,".$info->firstname)->subject('Welcome to your new account');
        });
    }    
}
