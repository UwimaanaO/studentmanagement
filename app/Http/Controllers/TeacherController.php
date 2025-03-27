<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get the Teacher index from the views under the Teacher foldeer.
    public function index(): View
    {
        //get all the teachers data from the database.
        $teachers = Teacher::all();
        return view('teachers.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return a view for creation of Teacher details
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //add the teachers details to the database
    public function store(Request $request)
    {
        $incomingField=$request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'email'=>['required','email', Rule::unique('teachers','email')]
        ]);
        $user=Teacher::create($incomingField);
        return redirect('teachers')->with('flash_message','Teacher Added');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //finds details of a particular Teacher with the ID
        $teachers = Teacher::find($id);
        return view('teachers.show')->with('teachers', $teachers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teachers = Teacher::find($id); // Retrieve the specific Teacher by ID
        return view('teachers.edit', compact('teachers'))->with('flash_message', 'Teacher Updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update code to the database
        $Teacher=Teacher::find($id);
        $incomingField=$request->validate([
            'name'=>['required'],
            'address'=>['required'],
            'phone'=>['required'],
            'email'=>['required','email', Rule::unique('teachers','email')]
        ]);
        $Teacher->update($incomingField);
        return redirect('teachers')->with('flash_message','teachers Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Teacher::destroy($id);
        return redirect('teachers')->with('flash_message','Teacher deleted!');
    }
}
