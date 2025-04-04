@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">Payments</div>
    <div class="card-body">
        <form action="{{url('payments')}}" method="POST">
            @csrf
            <label for="">Enrollments Number</label><br>
            <select name="enrollment_id" id="enrollment_id" class="form-control">
                @foreach ($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}">{{ $enroll_no }}</option>
                @endforeach
            </select>
            <label for="">Pay Date</label><br>
            <input type="date" name="paid_date" id="paid_date" class="form-control" required><br>
            <label for="">Amount</label><br>
            <input type="text" name="amount" id="amount" class="form-control" required><br>
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>

</div>

@endsection