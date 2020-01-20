<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Alert;
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
        $this->validate($request, [
            'admission' => 'required',
            'name' => 'required',
            'email' => 'required',
            'idNumber' => 'required',
            'phone' => 'required',
            'course' => 'required',
            'year' => 'required',
        ]);

        $student = new Student();
        $student->admissionNo = $request->admission;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->idNo = $request->idNumber;
        $student->phoneNo = $request->phone;
        $student->yosId = $request->year;
        $student->courseCode = $request->course;

        if($student->save()){
        return response()->json([
            'success' => true,
            ]);
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
        if (Auth::attempt([
            'admissionNo' => $request->admission,
            'password' => $request->idNumber,
            ])
        ){
           // Authentication passed...
           return response()->json('success');
        }
           return response()->json('error');
    }

    /*GET
     */
    public function logout()
    {

    }
}
