<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
use App\Models\Lamar; // Import the necessary model

class MelamarController extends Controller
{
    public function showModal($id)
    {
        $loker = Lamar::findOrFail($id); // Replace 'Loker' with the appropriate model name
        return view('lamar.view', compact('loker'));
    }

    public function apply(Request $request)
    {
        // Validate the form data
        $request->validate([
            // Add validation rules here
        ]);

        // Create a new job application record
        $lamar = new Lamar([
            // Assign form data to model attributes
            // For example:
            'id_loker' => $request->input('job_id'),
            'id_pencari_kerja' => auth()->user()->profile->id,
            // ... other attributes ...
        ]);

        // Save the job application
        $lamar->save();

        // Redirect or return a response as needed
    }
}

=======

class MelamarController extends Controller
{
    //
}
>>>>>>> Stashed changes
