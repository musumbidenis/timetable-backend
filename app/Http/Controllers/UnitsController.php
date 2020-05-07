<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use App\User;
use Session;
usE DB;

class UnitsController extends Controller
{

    /**POST
     */
    public function store(Request $request)
    {

        /**Get the admission number of user stored in session &&
         * fetch the study year and study course for the user
        */
        $value = $request->session()->get('admissionKey');
        $details = User::select('courseCode','yosId')->where('admissionNo', $value)->get()->first();

        $unit = new Unit();
        $unit->unitCode = $request->unitCode;
        $unit->unitTitle = $request->unitTitle;
        $unit->courseCode = $details->courseCode;
        $unit->yosId = $details->yosId;
        
        $unit->save();

        return redirect('/unit')->with('success','Unit added successfully!');
    }

    public function destroy($id)
    {
        Unit::where('unitCode', $id)->delete();
        
        return redirect('/unit')->with('success','Unit delete successfully!');
    }
}
