<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Day;
use DB;
use Session;

class PagesController extends Controller
{
  /*GET
  */
  public function home(Request $request){

    /**Get the admission number of user stored in session &&
     * fetch the study year and study course for the user
     */
    $value = $request->session()->get('admissionKey');
    $details = User::select('yosId', 'courseCode')->where('admissionNo', $value)->get()->first();

    /**Fetch the units in respect to logged in user
     */
    $units = DB::table('users')
                  ->join('courses', 'courses.courseCode', '=', 'users.courseCode')
                  ->join('units', 'units.courseCode', '=', 'courses.courseCode')
                  ->where('units.courseCode', '=', $details->courseCode)
                  ->where('units.yosId', '=', $details->yosId)
                  ->distinct()
                  ->count();
                  
    /**Return the view */
    return view('pages.dashboard')->with('units', $units)->with('value', $request->session()->get('admissionKey'));
  }

  /*GET
  */
  public function unit(Request $request){

    /**Get the admission number of user stored in session &&
     * fetch the study year and study course for the user
     */
    $value = $request->session()->get('admissionKey');
    $details = User::select('yosId', 'courseCode')->where('admissionNo', $value)->get()->first();

    /**Fetch the units in respect to logged in user
     */
    $units = DB::table('users')
                  ->join('courses', 'courses.courseCode', '=', 'users.courseCode')
                  ->join('units', 'units.courseCode', '=', 'courses.courseCode')
                  ->select('units.unitCode', 'units.unitTitle', 'courses.courseCode', 'courses.courseTitle')
                  ->where('units.courseCode', '=', $details->courseCode)
                  ->where('units.yosId', '=', $details->yosId)
                  ->distinct()
                  ->get();
                
    /**Return the view */
    return view('pages.unit')->with('units', $units)->with('value', $request->session()->get('admissionKey'));
  }

  /*GET
  */
  public function session(request $request){

    /**Get the admission number of user stored in session &&
     * fetch the study year and study course for the user
     */
    $value = $request->session()->get('admissionKey');
    $details = User::select('yosId', 'courseCode')->where('admissionNo', $value)->get()->first();

    /**Get the days from the db &&
     * the units in respect to logged in user &&
     * also get the sessions that exist
     */
    $units = DB::table('users')
                  ->join('courses', 'courses.courseCode', '=', 'users.courseCode')
                  ->join('units', 'units.courseCode', '=', 'courses.courseCode')
                  ->where('units.courseCode', '=', $details->courseCode)
                  ->where('units.yosId', '=', $details->yosId)
                  ->distinct()
                  ->get();
                  
    $sessions = DB::table('session1s')
                  ->join('units', 'units.unitCode', '=', 'session1s.unitCode')
                  ->join('courses', 'courses.courseCode', '=', 'units.courseCode')
                  ->join('users', 'users.courseCode', '=', 'units.courseCode')
                  ->select('units.unitCode','units.unitTitle', 'session1s.sessionId', 'session1s.day', 'session1s.sessionStart', 'session1s.sessionStop')
                  ->where('session1s.courseCode', '=', $details->courseCode)
                  ->where('session1s.yosId', '=', $details->yosId)
                  ->distinct()
                  ->get();

    /**Return the view */
    return view('pages.session')->with('units', $units)->with('sessions', $sessions)->with('value', $request->session()->get('admissionKey'));

  }
    
}
