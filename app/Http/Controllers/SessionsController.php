<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session1;
use App\User;
use DB;
class SessionsController extends Controller
{
    /*POST
     */
    public function store(Request $request)
    {

    /**Get the admission number of user stored in session &&
     * fetch the study year and study course for the user
     */
    $value = $request->session()->get('admissionKey');
    $details = User::select('yosId', 'courseCode')->where('admissionNo', $value)->get()->first();

    /**Insert new session detail to db */
        $session = new Session1();
        $session->sessionStart = $request->start;
        $session->sessionStop = $request->stop;
        $session->day = $request->day;
        $session->unitCode = $request->unit;
        $session->courseCode = $details->courseCode;
        $session->yosId = $details->yosId;

        $session->save();

        return redirect('/session')->with('success','Session added successfully!');;
    }
    /*POST
     */
    public function destroy($id){
        Session1::where('sessionId', $id)->delete();

        return redirect('/session')->with('success', 'Session deleted succesfully!');
    }

    /*POST
     */
    public function getSessions(Request $request)
    {
        /**Fetch details of the user from android app &&
         * fetch sessions for each day
         */
        $courseCode = $request->course;
        $yosId = $request->year;
        $dayid = $request->dayId;

        /**Switch through the dayId to get the day value &&
         * querry the database
         */
        if ($dayid == 1){
            $day = 'Monday';
        }elseif($dayid == 2){
            $day = 'Tuesday';
        }elseif($dayid == 3){
            $day = 'Wednesday';
        }elseif($dayid == 4){
            $day = 'Thursday';
        }elseif($dayid == 5){
            $day = 'Friday';
        }
        
        /**Fetch session details from database &&
         * pass them to the android app via API
         */
        $data = DB::table('units')
          ->join('session1s', 'session1s.unitCode', '=', 'units.unitCode')
          ->select('units.unitCode', 'units.unitTitle', 'session1s.sessionStart', 'session1s.sessionStop')
          ->where('session1s.courseCode', '=', $courseCode)
          ->where('session1s.yosId', '=', $yosId)
          ->where('session1s.day', '=', $day)
          ->orderBy('session1s.sessionStart', 'asc')
          ->distinct()
          ->get();

        /**Return json response to the user */
        if($data){
            return response()->json($data);
        }else{
            return response()->json('error');
        }
    }
}
