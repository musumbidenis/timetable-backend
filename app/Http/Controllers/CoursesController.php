<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Alert;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCourses()
    {
        $courses = Course::select('courseCode', 'courseTitle')->get();

        if($courses){
            return response()->json(
                $courses 
            );
        }else{
            return response()->json('Error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /*POST
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'courseCode' => 'required',
            'courseTitle' => 'required',
         ]);
        
        $course = new Course();
        $course->courseCode = $request->input('courseCode');
        $course->courseTitle = $request->input('courseTitle');

        $course->save();

        return redirect('/course')->withSuccess('Uploaded successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
