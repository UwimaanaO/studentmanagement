@extends('welcome')
@section('content')
                <div class="card">
                    <div class="card-header">
                        <h2>
                            Courses Details
                        </h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/courses/create')}}" class="btn btn-success" title="Add new course"><i
                                class="fa fa-plus" aria-hidden="true"></i>Add New</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Name</th>
                                        <th>Syllabus</th>
                                        <th>Duration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courses as $item)
                                        <tr>
                                            <!--Helps to create Sequential S/N numbers-->
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->syllabus}}</td>
                                            <td>{{$item->duration()}}</td>
                                            <td>
                                                <a href="{{url('/courses/' . $item->id)}}" title="View course"><button
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>View</button></a>
                                                <a href="{{url('/courses/' . $item->id . '/edit')}}"
                                                    title="Edit course"><button class="btn btn-primary btn btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i>Edit</button></a>

                                                <form action="{{url('/courses' . '/' . $item->id)}}" method="POST"
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