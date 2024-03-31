@extends('students.layout')
@section('content')
 
<div class="card">
  <div class="card-header">Contact Us Page</div>
  <div class="card-body">
      
      <form action="{{ url('dashboard/students/' . $students->id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" value="{{ $students->id }}" />
        <label>Name</label><br>
        <input type="text" name="name" value="{{ $students->name }}" class="form-control"><br>
        <label>Image</label><br>
        <input type="file" name="image" class="form-control"><br>
        @if($students->image)
            <img src="{{ asset($students->image) }}" alt="{{ $students->name }}" style="max-width: 200px; max-height: 200px;"><br>
        @endif
        <label>Age</label><br>
        <input type="text" name="age" value="{{ $students->age }}" class="form-control"><br>
        <label>Status</label><br>
        <select name="status" class="form-control">
            <option value="Active" {{ $students->status == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $students->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select><br>
        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

  </div>
</div>
 
@stop
