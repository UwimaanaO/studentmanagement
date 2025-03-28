@extends('welcome')
@section('content')
    <div class="card">
        <div class="card-header">Add Batches</div>
        <div class="card-body">
            <form action="{{url('batches')}}" method="POST">
                @csrf
                <label for="">Batch Name</label><br>
                <input type="text" name="name" id="name" class="form-control" required><br>
                <label for="">Course Name</label><br>
                <!--<input type="text" name="course_id" id="course_id" class="form-control" required><br>-->
                <select name="course_id" id="course_id" class="form-control">
                @foreach ($courses as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
                </select>
                <label for="">Start Date</label><br>
                <input type="text" name="start_date" id="start_date" class="form-control" required><br>
                <input type="submit" value="Save" class="btn btn-success"><br>
            </form>

        </div>

    </div>

@endsection