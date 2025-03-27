@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">Add Teachers</div>
    <div class="card-body">
        <form action="{{url('teachers')}}" method="POST">
            @csrf
            <label for="">Name</label><br>
            <input type="text" name="name" id="name" class="form-control" required><br>
            <label for="">Address</label><br>
            <input type="text" name="address" id="address" class="form-control" required><br>
            <label for="">Phone</label><br>
            <input type="text" name="phone" id="phone" class="form-control" required><br>
            <label for="">Email</label><br>
            <input type="email" name="email" id="email" class="form-control" required><br>
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>

</div>

@endsection