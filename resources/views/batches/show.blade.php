@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            Batches Page
        </div>
        <div class="card-body">
            <h5 class="card-title">Batch Name : {{$batches->name}}</h5>
            <p class="card-text">Course Name : {{$batches->course_id}}</p>
            <p class="card-text">Start Date: {{$batches->start_date}}</p>
        </div>
        </hr>
    </div>
@endsection