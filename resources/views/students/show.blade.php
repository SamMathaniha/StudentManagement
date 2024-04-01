@extends('students.layout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 mt-5"> <!-- Add margin-top of 20px -->
            <!-- back button -->
        <div class="text-right mb-3">
            <a href="{{ url('/dashboard/students') }}" class="btn btn-danger">Back to View</a>
        </div>

        <div class="card">
                <div class="card-header">
                    <h2>Student Details</h2>
                </div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $student->name }}</p>
                    <p><strong>Image:</strong> <img src="{{ asset($student->image) }}" alt="{{ $student->name }}'s Image" style="width: 200px;"></p>
                    <p><strong>Age:</strong> {{ $student->age }}</p>
                    <p><strong>Status:</strong> {{ $student->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
