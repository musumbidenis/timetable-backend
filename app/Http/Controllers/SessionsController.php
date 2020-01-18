<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use DB;
class SessionsController extends Controller
{

    public function mondaySessions(Request $request)
    {
        $admission = $request->admission;

        $data = DB::table('students')
          ->join('units', 'units.courseCode', '=', 'students.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('students.admissionNo', '=', $admission) 
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
            return response()->json('Error');
        }
    }

    public function tuesdaySessions(Request $request)
    {

        $admission = $request->admission;


        $data = DB::table('students')
          ->join('units', 'units.courseCode', '=', 'students.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('students.admissionNo', '=', $admission) 
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
            return response()->json('Error');
        }
    }

    public function wednesdaySessions(Request $request)
    {

        $admission = $request->admission;


        $data = DB::table('students')
          ->join('units', 'units.courseCode', '=', 'students.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('students.admissionNo', '=', $admission) 
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
            return response()->json('Error');
        }
    }

    public function thursdaySessions(Request $request)
    {

        $admission = $request->admission;


        $data = DB::table('students')
          ->join('units', 'units.courseCode', '=', 'students.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('students.admissionNo', '=', $admission) 
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
            return response()->json('Error');
        }
    }

    public function fridaySessions(Request $request)
    {

        $admission = $request->admission;


        $data = DB::table('students')
          ->join('units', 'units.courseCode', '=', 'students.courseCode')
          ->join('sessions', 'sessions.unitCode', '=', 'units.unitCode')
          ->join('days', 'days.dayId', '=', 'sessions.dayId')
          ->select('sessions.dayId','units.unitCode', 'units.unitTitle', 'sessions.sessionStart', 'sessions.sessionStop')
          ->where('students.admissionNo', '=', $admission) 
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
            return response()->json('Error');
        }
    }
}
