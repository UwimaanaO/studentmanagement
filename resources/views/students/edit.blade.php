@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Page
    </div>
    <div class="card-body">
        <form action="{{url('students/' .$students->id)}}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$students->id}}">
            <label for="">Name</label><br>
            <input type="text" name="name" id="name" value="{{$students->name}}" class="form-control"><br>
            <label for="">Address</label><br>
            <input type="text" name="address" id="address" value="{{$students->address}}" class="form-control"><br>
            <label for="">Phone</label><br>
            <input type="text" name="phone" id="phone" value="{{$students->phone}}" class="form-control"><br>
            <label for="">Email</label>
            <input type="text" name="email" id="email" value="{{$students->email}}" class="form-control"><br>
            <input type="submit" value="Update" class="btn btn-success">
        </form>

    </div>
</div>

@endsection