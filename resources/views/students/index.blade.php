@extends('welcome')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>
                            Students Details
                        </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/students/create')}}" class="btn btn-success" title="Add new Student"><i
                                class="fa fa-plus" aria-hidden="true"></i>Add New</a>
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
                                    @foreach ($students as $item)
                                        <tr>
                                            <!--Helps to create Sequential S/N numbers-->
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>
                                                <a href="{{url('/students/' . $item->id)}}" title="View Student"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{url('/students/' . $item->id . '/edit')}}"
                                                    title="Edit Student"><button class="btn btn-primary btn btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i>Edit</button></a>

                                                <form action="{{url('/students' . '/' . $item->id)}}" method="POST"
                                                    accept-charset="UTF-8" style="display: inline">
                                                    {{method_field('DELETE')}}
                                                    {{csrf_field()}}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
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