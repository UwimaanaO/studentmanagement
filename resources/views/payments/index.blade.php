@extends('welcome')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Payments Details</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/payments/create') }}" class="btn btn-success" title="Add new payment">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New
        </a>
        <br><br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Enrollment Number</th>
                        <th>Paid Date</th>
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $item)
                        <tr>
                            <!-- Helps to create sequential numbers -->
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($item->enrollment)->enroll_no }}</td>
                            <td>{{ $item->paid_date }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <a href="{{ url('/payments/' . $item->id) }}" title="View payment">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i> View
                                    </button>
                                </a>
                                <a href="{{ url('/payments/' . $item->id . '/edit') }}" title="Edit payment">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit
                                    </button>
                                </a>
                                <form action="{{ url('/payments/' . $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete payment"
                                        onclick="return confirm('Confirm delete?')">
                                        <i class="fas fa-trash-alt" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                                <a href="{{url('/report/report1/'. $item->id)}}" title="Print Payment" class="btn btn-success"><i class="fa fa-print" aria-hidden="true"></i>Print</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
