<?php

namespace App\Http\Controllers;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get the Enrollment index from the views under the Enrollment foldeer.
    public function index(): View
    {
        //get all the enrollments data from the database.
        $enrollments = Enrollment::all();
        return view('enrollments.index')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return a view for creation of Enrollment details
        return view('enrollments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //add the enrollments details to the database
    public function store(Request $request)
    {
        $incomingField=$request->validate([
            'enroll_no'=>['required'],
            'batch_id'=>['required'],
            'student_id'=>['required'],
            'join_date'=>['required'],
            'fee'=>['required']
        ]);
        $user=Enrollment::create($incomingField);
        return redirect('enrollments')->with('flash_message','Enrollment Added');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //finds details of a particular Enrollment with the ID
        $enrollments = Enrollment::find($id);
        return view('enrollments.show')->with('enrollments', $enrollments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $enrollments = Enrollment::find($id); // Retrieve the specific Enrollment by ID
        return view('enrollments.edit', compact('enrollments'))->with('flash_message', 'Enrollment Updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update code to the database
        $Enrollment=Enrollment::find($id);
        $incomingField=$request->validate([
            'enroll_no'=>['required'],
            'batch_id'=>['required'],
            'student_id'=>['required'],
            'join_date'=>['required'],
            'fee'=>['required']
        ]);
        $Enrollment->update($incomingField);
        return redirect('enrollments')->with('flash_message','enrollments Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Enrollment::destroy($id);
        return redirect('enrollments')->with('flash_message','Enrollment deleted!');
    }
}
