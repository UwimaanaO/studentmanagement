@extends('welcome')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>
                            Batches Details
                        </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/batches/create')}}" class="btn btn-success" title="Add new course"><i
                                class="fa fa plus" aria-hidden="true"></i>Add New</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Batch Name</th>
                                        <th>Course Name</th>
                                        <th>Start Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($batches as $item)
                                        <tr>
                                            <!--Helps to create Sequential S/N numbers-->
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <!--course->name enables the function to return name-->
                                            <td>{{$item->course->name}}</td>
                                            <td>{{$item->start_date}}</td>
                                            <td>
                                                <a href="{{url('/batches/' . $item->id)}}" title="View course"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{url('/batches/' . $item->id . '/edit')}}"
                                                    title="Edit course"><button class="btn btn-primary btn btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i>Edit</button></a>

                                                <form action="{{url('/batches' . '/' . $item->id)}}" method="POST"
                                                    accept-charset="UTF-8" style="display: inline">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete course"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fas fa-trash-alt" aria-hidden="true"></i>Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    </div>
@endsection