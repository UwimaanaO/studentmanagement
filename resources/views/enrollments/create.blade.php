@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">Add Enrollment</div>
    <div class="card-body">
        <form action="{{url('enrollments')}}" method="POST">
            @csrf
            <label for="">Enrollments Number</label><br>
            <input type="text" name="enroll_no" id="enroll_no" class="form-control" required><br>
            <label for="">Batch</label><br>
            <select name="batch_id" id="batch_id" class="form-control">
                @foreach ($batches as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label for="">Student</label><br>
            <select name="student_id" id="student_id" class="form-control">
                @foreach ($students as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <label for="">Join Date </label><br>
            <input type="date" name="join_date" id="join_date" class="form-control" required><br>
            <label for="">Fee</label><br>
            <input type="text" name="fee" id="fee" class="form-control" required><br>
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>

</div>

@endsection