@extends('students.layout')

@section('content')
    <div class="container col-md-9 mt-5">
        <!-- back button -->
        <div class="text-right mb-3">
            <a href="{{ url('/dashboard') }}" class="btn btn-danger">Back to Dashboard</a>
        </div>
        
        <div class="row justify-content-center"> <!-- Center the row horizontally -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h2>View Student Details</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('dashboard/students/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Age</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if($item->image)
                                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" style="max-width: 100px; max-height: 100px;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>{{ $item->age }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            <a href="{{ url('/dashboard/students/' . $item->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/dashboard/students/' . $item->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
 
                                            <form method="POST" action="{{ url('/dashboard/students' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
