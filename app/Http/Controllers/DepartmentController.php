<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\Storage;


class DepartmentController extends Controller
{

    public function department(){
        $departments = Department::all();
        return view('contacts.department', ['departments' => $departments]);
    }

    // add contact
    public function create(){
        return view('contacts.createDept');
    }

    // store contact details
    public function store(Request $request)
{
    $data = $request->validate([
        'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Get the uploaded file
        $uploadedImage = $request->file('image');

        // Get the original file extension
        $extension = $uploadedImage->getClientOriginalExtension();

        // Generate a unique filename
        $filename = time() . '.' . $extension;

        // Move the uploaded file to the intended storage location
        $uploadedImage->storeAs('public/img', $filename);

        // Update the data array with the image path
        $data['image'] = 'img/' . $filename;
    }

    // Create a new contact with the validated data
    $newContact = Department::create($data);

    if ($newContact) {
        return redirect()->route('contacts.department')
            ->with('success', 'Contact created successfully.');
    } else {
        return redirect()->back()
            ->with('error', 'Contact creation failed. Please try again.');
    }
}


    //edit contact
    public function edit(Department $departments){
        return view('contacts.editDept', ['departments' => $departments]);
    }

    //update contact
    public function update(Department $departments, Request $request){
        $data = $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        if ($request->hasFile('image')) {
            // Get the uploaded file
            $uploadedImage = $request->file('image');

            // Get the original file extension
            $extension = $uploadedImage->getClientOriginalExtension();

            // Generate a unique filename
            $filename = time() . '.' . $extension;

            // Move the uploaded file to the intended storage location
            $uploadedImage->storeAs('public/img', $filename);

            // Update the data array with the image path
            $data['image'] = 'img/' . $filename;

            // Delete the previous image file if it exists
            if ($departments->image) {
                Storage::delete('public/' . $departments->image);
            }
        }

        $departments->update($data);

        return redirect(route('contacts.department'));
    }

    public function destroy(Department $departments){
        $departments->delete();
        return redirect(route('contacts.department'));
    }
}
