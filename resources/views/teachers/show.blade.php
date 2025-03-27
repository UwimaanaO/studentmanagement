@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">
            Teachers Page
        </div>
        <div class="card-body">
            <h5 class="card-title">Name : {{$teachers->name}}</h5>
            <p class="card-text">Address : {{$teachers->address}}</p>
            <p class="card-text">Phone : {{$teachers->phone}}</p>
            <p class="card-text">Email : {{$teachers->email}}</p>
        </div>
        </hr>
    </div>
@endsection