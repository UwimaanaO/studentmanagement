<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::find($pid);

        // Handle missing payment record
        if (!$payment) {
            return abort(404, "Payment not found");
        }

        $pdf = App::make("dompdf.wrapper");
        $print = "<div style='margin:20px; padding:20px'>";
        $print .= "<h1 align='center'>Payment Receipt</h1>";
        $print .= "<hr/>";
        $print .= "<p>Receipt No : <b>" . $pid . "</b> </p>";
        $print .= "<p> Date : <b> " . $payment->paid_date . "</b> </p>";
        $print .= "<p> Enrollment No : <b> " . $payment->enrollment->enroll_no . "</b> </p>";
        $print .= "<p> Student Name : <b> " . ($payment->student->name ?? 'N/A') . "</b> </p>";
        $print .= "<hr/>";

        // Corrected table syntax
        $print .= "<table style='width:100%'>";
        $print .= "<tr><td>Batch Number</td><td>Amount</td></tr>";
        $print .= "<tr>";
        $print .= "<td><h3>" . ($payment->enrollment->batch->name ?? 'N/A') . "</h3></td>";
        $print .= "<td><h3>" . $payment->amount . "</h3></td>";
        $print .= "</tr>";
        $print .= "</table>";
        $print .= "<hr/>";

        // Safe Auth check for username
        $username = Auth::check() ? Auth::user()->name : 'Guest';
        $print .= "<span>Printed By: <b>" . $username . "</b></span>";
        $print .= "<br>";
        $print .= "<span>Print Date: <b>" . date("Y-m-d") . "</b></span>";
        $print .= "</div>";

        $pdf->loadHTML($print);
        return $pdf->stream();
    }
}
?>
