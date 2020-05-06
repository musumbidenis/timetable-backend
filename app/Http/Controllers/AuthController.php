<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;
use DB;
use Auth;
use Session;

class AuthController extends Controller
{
    /*GET
     */
    public function registrationForm()
    {
        return view('auth.register');
    }

    /*POST
     */
    public function registerUser(Request $request)
    {

        $courseCode = $request->courseCode;
        $yosId = $request->year;
        
        /*Details of the user */
        $user = new User();
        $user->admissionNo = $request->admissionNumber;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phoneNo = $request->phoneNumber;
        $user->idNo = $request->idNumber;
        $user->yosId = $request->year;
        $user->courseCode = $request->courseCode;


        /*New Course details*/
        $course = new Course();
        $course->courseCode = $request->courseCode;
        $course->courseTitle = $request->courseTitle;

        /**Check if the course code exists for that particular year &&  
         * Course code exists
        */
        $verifyYear = User::where('courseCode', $courseCode)->where('yosId', $yosId)->count();
        $verifyCourse = Course::where('courseCode', $courseCode)->count();


        /**If year in relation to course code does not exist &&
         * Course code does not exist
         * Save the user details and New Course details
        */
        if($verifyYear == 0 && $verifyCourse == 0){
            $user->save();
            $course->save();

            /*Redirect to login page */
            return redirect('/')->with('success','Registration successfull');
 
        /**If year in relation to course code exists
         * Return error message to the user
        */
        }elseif($verifyYear != 0){
            return redirect('/register')->with('error','Course Code already exists. Choose a unique Course Code and Course Title e.g MSU-CIT, MSU-Bsc. IT');

        /**If year in relation to course  does not exist &&
         * Course code exists 
         * Only save the user details
        */
        }elseif($verifyYear == 0 && $verifyCourse != 0){
            $user->save();

            /*Redirect to login page */
            return redirect('/')->with('success','Registration successfull');
        }


    }

    /*GET
     */
    public function loginForm()
    {
        return view('auth.login');
    }

    /*POST
     */
    public function login(Request $request)
    {      
        $admission = $request->admissionNumber;
        $id = $request->idNumber;

        /**Verify if the user exists */
        $credentials = User::where('admissionNo', $admission)->where('idNo', $id)->count();

        /**If user does not exist throw error
         * else navigate to home page && 
         * Store the user's admission in session
         */
        if($credentials == 0){
            return redirect('/')->with('error','Incorrect details. Please try again!');
        }else{
            $request->session()->put('admissionKey', $admission);
            return redirect('/home');
        }
    }

    /*GET
     */
    public function logout()
    {
        /**Logout the user
         * Clear the session
         */
        Auth::logout();
        Session::flush();

        /**Return to the login page */
        return redirect('/');
    }
}
