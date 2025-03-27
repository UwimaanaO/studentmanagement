@extends('welcome')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>
                            Teacher's Details
                        </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/teachers/create')}}" class="btn btn-success" title="Add new teacher"><i
                                class="fa fa plus" aria-hidden="true"></i>Add New</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $item)
                                        <tr>
                                            <!--Helps to create Sequential S/N numbers-->
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                <a href="{{url('/teachers/' . $item->id)}}" title="View teacher"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{url('/teachers/' . $item->id . '/edit')}}"
                                                    title="Edit teacher"><button class="btn btn-primary btn btn-sm"><i class="fa fa-pencil-sqaure-o" aria-hidden="true"></i>Edit</button></a>

                                                <form action="{{url('/teachers' . '/' . $item->id)}}" method="POST"
                                                    accept-charset="UTF-8" style="display: inline">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete teacher"
                                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
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