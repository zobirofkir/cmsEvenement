<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ressource;
use App\Http\Requests\RessourceRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RessourceController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $userId = Auth::id();
        $data = Project::where('user_id', $userId)->get();
        return view("dashboard.dashboard", compact('data'));
    }

    public function liveServer($projectId)
    {
        $project = Project::where('id', $projectId)->get();
        // You can use $project as needed in your view
        return view("results.results", compact('project'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
     
     
     public function store(RessourceRequest $request)
     {
         // Validate the request data
         $validatedData = $request->validated();
     
         // Handle file upload for button_one
         if ($request->hasFile('button_one')) {
             $validatedData['button_one'] = $this->storeFile($request->file('button_one'));
         }
     
         // Handle file upload for button_two
         if ($request->hasFile('button_two')) {
             $validatedData['button_two'] = $this->storeFile($request->file('button_two'));
         }
     
         // Handle file upload for button_three
         if ($request->hasFile('button_three')) {
             $validatedData['button_three'] = $this->storeFile($request->file('button_three'));
         }
     
         // Handle file upload for button_four
         if ($request->hasFile('button_four')) {
             $validatedData['button_four'] = $this->storeFile($request->file('button_four'));
         }
     
         // Handle background image upload
         if ($request->hasFile('background_image')) {
             $validatedData['background_image'] = $this->storeFile($request->file('background_image'));
         }
     
         // Handle background phone upload
         if ($request->hasFile('background_phone')) {
             $validatedData['background_phone'] = $this->storeFile($request->file('background_phone'));
         } else {
             // If background_phone is not provided, set it to null
             $validatedData['background_phone'] = null;
         }
     
         // Create the project with the validated data
         $project = Project::create($validatedData);
     
         // Redirect the user after successful creation
         return redirect("/users/dashboard");
     }
          
     public function update(RessourceRequest $request, string $id)
     {
         // Validate the request data
         $validatedData = $request->validated();
     
         // Find the resource by its ID
         $item = Project::findOrFail($id);
     
         // Handle file uploads if any
         foreach (['button_one', 'button_two', 'button_three', 'button_four', 'background_image', 'background_phone'] as $field) {
             if ($request->hasFile($field)) {
                 $validatedData[$field] = $this->storeFile($request->file($field));
             }
         }
     
         // Update the resource with the validated data
         $item->update($validatedData);
     
         // Redirect the user after successful update
         return redirect("/users/dashboard");
     }
     
     // Function to store file and return its path
     private function storeFile($file)
     {
         // Generate a unique filename for the file
         $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();
     
         // Store the uploaded file with the custom filename
         $filePath = $file->storeAs('', $fileName, 'public');
     
         return $filePath;
     }
         
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $dashboard)
    {
        Project::destroy($dashboard);
        return redirect('/users/dashboard');
    }
}
