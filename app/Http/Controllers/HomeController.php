<?php

namespace dbtiPortal\Http\Controllers;

use dbtiPortal\Http\Requests;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myaccess = \Auth::user()->accesslevel;
        switch($myaccess){
            case env('USER_ADMIN');
                $students = DB::select("select *,users.status as stat,users.idno as idnum from users join statuses on statuses.idno=users.idno where level='Grade 10' and statuses.status=2");
                return view('admin.home',compact('students'));
            break;
        
            case env('USER_STUDENT');
                if( \Auth::user()->status == 1){
                    return view('student.chooseElective');
                }else{
                    return view('student.currentlyInactive');
                }
            break;
        }
    }
    
}
