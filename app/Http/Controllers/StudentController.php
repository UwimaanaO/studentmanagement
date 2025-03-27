<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get the student index from the views under the student foldeer.
    public function index(): View
    {
        //get all the students data from the database.
        $students = Student::all();
        return view('students.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return a view for creation of student details
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //add the students details to the database
    public function store(Request $request)
    {
        $incomingField=$request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'email'=>['required','email', Rule::unique('students','email')]
        ]);
        $user=Student::create($incomingField);
        return redirect('students')->with('flash_message','Student Added');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //finds details of a particular student with the ID
        $students = Student::find($id);
        return view('students.show')->with('students', $students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
