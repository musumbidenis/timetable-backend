<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use DB;
class SessionsController extends Controller
{
    /*POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'day' => 'required',
            'start' => 'required',
            'stop' => 'required',
            'course' => 'required',
            'unit' => 'required',
            'year' => 'required',
         ]);
        
        $session = new Session();
        $session->sessionStart = $request->input('start');
        $session->sessionStop = $request->input('stop');
        $session->dayId = $request->input('day');
        $session->unitCode = $request->input('unit');
        $session->courseCode = $request->input('course');
        $session->yosId = $request->input('year');

        $session->save();

        return redirect('/session')->with('success','Session added successfully!');;
    }
    public function getSessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;
        $dayid = $request->dayId;
        

        $data = DB::table('units')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('sessions.courseCode', '=', $courseCode)
          ->where('sessions.yosId', '=', $yosId)
          ->where('sessions.dayId', '=', $dayid)
          ->orderBy('sessions.dayId', 'asc')
          ->orderBy('sessions.sessionStart', 'asc')
          ->distinct()
          ->get();

        if($data){
            return response()->json(
                $data
            );
        }else{
            return response()->json('error');
        }
    }
}
