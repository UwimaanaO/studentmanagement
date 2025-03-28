<?php

namespace App\Http\Controllers;
use App\Models\Batch;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    //Get the batch index from the views under the batch foldeer.
    public function index(): View
    {
        //get all the batches data from the database.
        $batches = Batch::all();
        return view('batches.index')->with('batches', $batches);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Return a view for creation of batch details
        return view('batches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //add the batches details to the database
    public function store(Request $request)
    {
        $incomingField=$request->validate([
            'name'=>['required'],
            'course_id'=>['required'],
            'start_date'=>['required']
        ]);
        $user=batch::create($incomingField);
        return redirect('batches')->with('flash_message','batch Added');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        //finds details of a particular batch with the ID
        $batches = batch::find($id);
        return view('batches.show')->with('batches', $batches);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $batches = batch::find($id); // Retrieve the specific batch by ID
        return view('batches.edit', compact('batches'))->with('flash_message', 'batch Updated!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update code to the database
        $batch=batch::find($id);
        $incomingField=$request->validate([
            'name'=>['required'],
            'course_id'=>['required'],
            'start_date'=>['required']
        ]);
        $batch->update($incomingField);
        return redirect('batches')->with('flash_message','batches Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        batch::destroy($id);
        return redirect('batches')->with('flash_message','batch deleted!');
    }
}
