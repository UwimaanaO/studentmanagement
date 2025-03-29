@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            Payments Page
        </div>
        <div class="card-body">
            <h5 class="card-title">Enrollment Number: {{ $payments->enrollment->enroll_no ?? 'N/A' }}</h5>
            <p class="card-text">Paid Date: {{ $payments->paid_date }}</p>
            <p class="card-text">Amount: {{ $payments->amount }}</p>
        </div>
    </div>
@endsection
