@extends('students.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel Crud</h2>
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
