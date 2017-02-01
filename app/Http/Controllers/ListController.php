<?php

namespace dbtiPortal\Http\Controllers;

use Illuminate\Http\Request;

use dbtiPortal\Http\Requests;

class ListController extends Controller
{
    function __construct(){
        if(\Auth::User()->accesslevel != env('USER_ADMIN')){
            return redirect('logout');
        }
    }
    
    function index(){
        $elective = \dbtiPortal\CtrElective::get();
        return view('admin.elecList',compact('elective'));
    }
}
