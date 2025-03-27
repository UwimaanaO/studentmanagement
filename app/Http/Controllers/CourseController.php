<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get the course index from the views under the course foldeer.
    public function index(): View
    {
        //get all the courses data from the database.
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return a view for creation of course details
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //add the courses details to the database
    public function store(Request $request)
    {
        $incomingField=$request->validate([
            'name'=>['required'],
            'syllabus'=>['required'],
            'duration'=>['required'],
        ]);
        $user=course::create($incomingField);
        return redirect('courses')->with('flash_message','course Added');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //finds details of a particular course with the ID
        $courses = course::find($id);
        return view('courses.show')->with('courses', $courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $courses = course::find($id); // Retrieve the specific course by ID
        return view('courses.edit', compact('courses'))->with('flash_message', 'course Updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update code to the database
        $course=course::find($id);
        $incomingField=$request->validate([
            'name'=>['required'],
            'syllabus'=>['required'],
            'duration'=>['required'],
        ]);
        $course->update($incomingField);
        return redirect('courses')->with('flash_message','Courses Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        course::destroy($id);
        return redirect('courses')->with('flash_message','Course deleted!');
    }
}
