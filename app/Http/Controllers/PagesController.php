<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Year;
use App\Day;
use App\Course;
use App\Unit;


use Auth;

class PagesController extends Controller
{
  public function home(){
    $courses = Course::count();
    $units = Unit::count();

    return view('pages.dashboard')->with('courses', $courses)->with('units', $units);
  }

  public function music(){
    $years = Year::select('yosId', 'year')->get();
    $courses = Course::select('courseCode', 'courseTitle')->get();
    $units = Unit::select('unitCode', 'unitTitle', 'courseCode')->get();

    return view('pages.course')->with('courses', $courses)->with('units', $units)->with('years', $years);

  }

    
  public function session(request $request){
    $days = Day::select('dayId', 'dayName')->get();
    $years = Year::select('yosId', 'year')->get();
    $courses = Course::select('courseCode', 'courseTitle')->get();
    $units = Unit::select('unitCode', 'unitTitle')->get();
    $years = Year::select('yosId', 'year')->get();

    return view('pages.session')->with('courses', $courses)->with('units', $units)->with('years', $years)->with('days', $days);

  }
    
}
