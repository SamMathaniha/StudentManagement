@extends('students.layout')

@section('content')

<div class="container mt-5"> <!-- Add margin-top -->
    <div class="row justify-content-center"> <!-- Center the row horizontally -->
        <div class="col-md-9">
            <!-- back button -->
        <div class="text-right mb-3">
            <a href="{{ url('/dashboard/students') }}" class="btn btn-danger">Back to View</a>
        </div>
            <div class="card">
                <div class="card-header">
                    <h2>Add New Student Details</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('dashboard/students') }}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <label>Name</label><br>
                        <input type="text" name="name" id="name" class="form-control"><br>
                        <label>Image</label><br>
                        <input type="file" name="image" id="image" class="form-control"><br>
                        <label>Age</label><br>
                        <input type="text" name="age" id="age" class="form-control"><br>
                        <label>Status</label><br>
                        <select name="status" id="status" class="form-control">
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                        </select><br>
                        <input type="submit" value="Save" class="btn btn-success"><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
