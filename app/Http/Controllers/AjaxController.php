<?php

namespace dbtiPortal\Http\Controllers;

use Illuminate\Http\Request;

use dbtiPortal\Http\Requests;
use dbtiPortal\Http\Controllers\MailController;

class AjaxController extends Controller
{
 function getoption($strand){
     $data = "";
     if($strand == "STEM"){
         $strands = \dbtiPortal\CtrElective::where('strand','STEM')->get();
         $sy = \dbtiPortal\CtrRegistrationSchoolyear::where('department','Senior High School')->first();
         $data = $data."<table border='1' class='table table-bordered' cellspacing='0' width='100%'>";
         foreach($strands as $strnd){
             $reserved = \dbtiPortal\SlotReservation::where('elecode',$strnd->elecode)->where('schoolyear',$sy->schoolyear)->count();
             $data = $data."<tr>"
                     . "<td><input type='radio' name='elective' value='".$strnd->elecode."'></td>"
                     . "<td>".$strnd->elective."</td>"
                     . "<td>".($strnd->slots - $reserved)."</td></tr>";
         }
         $data = $data."</table>";
     }else{
         
     }
     
     return $data;
 }
 
 function blastmail(){
     $students = \dbtiPortal\Status::where('level','Grade 10')->where('status',2)->get();
     ignore_user_abort(true);
     foreach($students as $student){
         $password = $this->getRandomCode();
         $info = \dbtiPortal\User::where('idno',$student->idno)->where('status',0)->first();
         if($info->email != "" || $info->email != NULL){
            $info->password = bcrypt($password);
            $info->status = 1;
            $info->update();
            MailController::sendTempPassword($info,$password);
         }
         
         
     }
     return null;
 }
 
function getRandomCode(){
    $an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $su = strlen($an) - 1;
    return substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1) .
            substr($an, rand(0, $su), 1);
} 

function getview($elec){
    $students = \dbtiPortal\SlotReservation::where('elecode',$elec)->get();
    return view("report.elecStudentList",compact('students'));
}

}
