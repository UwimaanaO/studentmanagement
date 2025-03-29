<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all payments data from the database
        //$payments = Payment::all();
        //return view('payments.index')->with('payments', $payments);
        $payments = Payment::with('enrollment')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
        // Return the view with enrollment data
        $enrollments = Enrollment::pluck('enroll_no', 'id');

        return view('payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$incomingField = $request->all();
        //Payment::create($incomingField);
        //return redirect('payments')->with('flash_message', 'Payment Added');
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('flash_message', 'Payment Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        //$payments = Payment::find($id); // Retrieve the specific Enrollment by ID
        //$enrollments = Enrollment::pluck('enroll_no', 'id');
        //return view('payments.edit', compact('payments', 'enrollments'));
        $payments = Payment::findOrFail($id); // ✅ Fetch single payment
        $enrollments = Enrollment::pluck('enroll_no', 'id'); // ✅ Fetch enrollments for dropdown
        return view('payments.edit', compact('payments', 'enrollments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //Update code to the database
        //$payments = Payment::find($id);
        //$incomingField = $request->request->all();
        //$payments->update($incomingField);
        //return redirect('payments')->with('flash_message', 'Paymentss Updated!');
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('payments.index')->with('error', 'Payment not found!');
        }
    
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);
    
        $payment->update($request->all());
    
        return redirect()->route('payments.index')->with('flash_message', 'Payment Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Payment::destroy($id);
        //return redirect('payments')->with('flash_message', 'Payments deleted!');
        $payment = Payment::find($id);

    if (!$payment) {
        return redirect()->route('payments.index')->with('error', 'Payment not found!');
    }

    $payment->delete();
    
    return redirect()->route('payments.index')->with('flash_message', 'Payment deleted!');
    }
}
