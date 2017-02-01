<?php

namespace dbtiPortal\Http\Controllers;

use Illuminate\Http\Request;

use dbtiPortal\Http\Requests;
use dbtiPortal\Http\Controllers\MailController;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    function saveReservation(Request $request){
        if($request->strand == "STEM"){
        $elective = \dbtiPortal\CtrElective::where('elecode',$request->elective)->first();
        $reservation = new \dbtiPortal\SlotReservation;
        $reservation->idno = \Auth::User()->idno;
        $reservation->strand = $request->strand;
        $reservation->elective = $elective->elective;
        $reservation->elecode = $request->elective;
        $reservation->semester = $elective->semester;
        $reservation->schoolyear = $elective->schoolyear;
        $reservation->save();            
        }else{
        $reservation = new \dbtiPortal\SlotReservation;
        $reservation->idno = \Auth::User()->idno;
        $reservation->strand = $request->strand;
        $reservation->elective = "";
        $reservation->elecode = "";
        $reservation->semester = $elective->semester;
        $reservation->schoolyear = $elective->schoolyear;
        $reservation->save(); 
        }

        MailController::sendEmailConfirmation($reservation);
        
        return Redirect::back();
    }
}
