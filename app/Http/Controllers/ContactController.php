<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Storage;


class ContactController extends Controller
{
    // display
    public function index(){
        $contacts = Contact::all();
        return view('contacts.index', ['contacts' => $contacts]);
    }

    // add contact
    public function create(){
        return view('contacts.create');
    }

    // store contact details
    public function store(Request $request){
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
        $newContact = Contact::create($data);

        if ($newContact) {
            return redirect()->route('contacts.index')
                ->with('success', 'Contact created successfully.');
        } else {
            return redirect()->back()
                ->with('error', 'Contact creation failed. Please try again.');
        }
    }

    //edit contact
    public function edit(Contact $contacts){
        return view('contacts.edit', ['contacts' => $contacts]);
    }

    //update contact
    public function update(Contact $contacts, Request $request){
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
            if ($contacts->image) {
                Storage::delete('public/' . $contacts->image);
            }
        }

        $contacts->update($data);

        return redirect(route('contacts.index'));
    }

    public function destroy(Contact $contacts){
        $contacts->delete();
        return redirect(route('contacts.index'));
    }
    
}

