<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
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
        $this->validate($request, [
            'admission' => 'required',
            'idNumber' => 'required',
        ]);
        $admission = $request->input('admission');
        $idNumber = $request->input('idNumber');

        $auth = Student::where('admissionNo', '=', $admission)->where('idNo', '=', $idNumber);

        if ($auth){
            return response()->json([
                'success'=> true,
                ]);
        }else{
           return response()->json('error');
        }
    }

    /*GET
     */
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/admin');
}
}