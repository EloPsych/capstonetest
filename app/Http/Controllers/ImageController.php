<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function register(){
        $register = User::all();
        return view('register', ['register' => $register]);
    }

    public function store(Request $request)
    {
        // Validate the request.
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
    
        // Get the image file.
        $image = $request->file('image');
    
        // Generate a unique filename for the image.
        $filename = uniqid() . '.' . $image->extension();
    
        // Move the image to the storage folder.
        $image->move(public_path('images'), $filename);
    
        // Create the user record in the database.
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $filename,
        ]);
    
        // Redirect the user to the home page.
        return redirect()->route('home');
    }
    
    
}
