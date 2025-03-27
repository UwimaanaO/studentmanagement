@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Page
    </div>
    <div class="card-body">
        <form action="{{url('teachers/' .$teachers->id)}}" method="POST">
            @csrf
            @method("PATCH")
            <input type="hidden" name="id" id="id" value="{{$teachers->id}}">
            <label for="">Name</label><br>
            <input type="text" name="name" id="name" value="{{$teachers->name}}" class="form-control"><br>
            <label for="">Address</label><br>
            <input type="text" name="address" id="address" value="{{$teachers->address}}" class="form-control"><br>
            <label for="">Phone</label><br>
            <input type="text" name="phone" id="phone" value="{{$teachers->phone}}" class="form-control"><br>
            <label for="">Email</label>
            <input type="text" name="email" id="email" value="{{$teachers->email}}" class="form-control"><br>
            <input type="submit" value="Update" class="btn btn-success">
        </form>

    </div>
</div>

@endsection