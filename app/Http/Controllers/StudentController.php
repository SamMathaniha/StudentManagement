<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{

    public function index(): View
    {
        $students = Student::all();
        return view ('students.index')->with('students', $students);
    }

 
    public function create(): View
    {
        return view('students.create');
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        $input = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $input['image'] = 'images/' . $imageName;
        }

        Student::create($input);

        return redirect('dashboard/students')->with('flash_message', 'Student Added!');
    }

    public function show(string $id): View
    {
        $student = Student::find($id);
        return view('students.show')->with('student', $student);
    }

    public function edit(string $id): View
    {
        $student = Student::find($id);
    return view('students.edit')->with('students', $student); 
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer',
            'status' => 'required|in:Active,Inactive',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image file
        ]);
    
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->age = $request->age;
        $student->status = $request->status;
    
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Move the image to the ./images directory
            $student->image = 'images/' . $imageName; // Store the path in the database
        }
    
        $student->save();
    
        return redirect('dashboard/students')->with('flash_message', 'Student updated!');
    }

    
    public function destroy(string $id): RedirectResponse
    {
        Student::destroy($id);
        return redirect('dashboard\students')->with('flash_message', 'Student deleted!'); 
    }
}