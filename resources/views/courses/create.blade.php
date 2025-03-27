@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">Add courses</div>
    <div class="card-body">
        <form action="{{url('courses')}}" method="POST">
            @csrf
            <label for="">Course Name</label><br>
            <input type="text" name="name" id="name" class="form-control" required><br>
            <label for="">Syllabus</label><br>
            <input type="text" name="syllabus" id="syllabus" class="form-control" required><br>
            <label for="">Duration</label><br>
            <input type="text" name="duration" id="duration" class="form-control" required><br>
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>

</div>

@endsection