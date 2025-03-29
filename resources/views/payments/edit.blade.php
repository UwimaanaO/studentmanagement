@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        Edit Payment
    </div>
    <div class="card-body">
        <form action="{{ url('payments/' . $payments->id) }}" method="POST">
            @csrf
            @method("PATCH")
            
            <input type="hidden" name="id" value="{{ $payments->id }}">
            
            <label for="enrollment_id">Enrollment Number</label>
            <select name="enrollment_id" id="enrollment_id" class="form-control">
                @foreach ($enrollments as $id => $enroll_no)
                    <option value="{{ $id }}" {{ $payments->enrollment_id == $id ? 'selected' : '' }}>
                        {{ $enroll_no }}
                    </option>
                @endforeach
            </select>

            <label for="paid_date">Paid Date</label>
            <input type="date" name="paid_date" id="paid_date" value="{{ $payments->paid_date }}" class="form-control"><br>

            <label for="amount">Amount</label>
            <input type="text" name="amount" id="amount" value="{{ $payments->amount }}" class="form-control"><br>

            <input type="submit" value="Update" class="btn btn-success">
        </form>
    </div>
</div>
@endsection
