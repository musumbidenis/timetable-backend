<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use DB;
class SessionsController extends Controller
{

    public function mondaySessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;

        $data = DB::table('users')
          ->join('units', 'units.courseCode', '=', 'users.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('users.courseCode', '=', $courseCode)
          ->where('users.yosId', '=', $yosId)
          ->where('sessions.dayId', '=', '1')
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

    public function tuesdaySessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;

        $data = DB::table('users')
          ->join('units', 'units.courseCode', '=', 'users.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('users.courseCode', '=', $courseCode)
          ->where('users.yosId', '=', $yosId) 
          ->where('sessions.dayId', '=', '2')
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

    public function wednesdaySessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;

        $data = DB::table('users')
          ->join('units', 'units.courseCode', '=', 'users.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('users.courseCode', '=', $courseCode)
          ->where('users.yosId', '=', $yosId)
          ->where('sessions.dayId', '=', '3')
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

    public function thursdaySessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;

        $data = DB::table('users')
          ->join('units', 'units.courseCode', '=', 'users.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('users.courseCode', '=', $courseCode)
          ->where('users.yosId', '=', $yosId) 
          ->where('sessions.dayId', '=', '4')
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

    public function fridaySessions(Request $request)
    {
        $courseCode = $request->course;
        $yosId = $request->year;


        $data = DB::table('users')
          ->join('units', 'units.courseCode', '=', 'users.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('users.courseCode', '=', $courseCode)
          ->where('users.yosId', '=', $yosId) 
          ->where('sessions.dayId', '=', '5')
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
