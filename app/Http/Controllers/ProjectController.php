<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'region' => 'required|string',
            'officeType' => 'required|string',
            'office' => 'required|string',
            'projectName' => 'required|string',
            'activities' => 'required|array',
            // Removed 'projectFiles' validation
            'uploadedBy' => 'required|array',
        ]);

        // Save the project data to the database
        // Assuming you have a Project model
        $project = new Project();
        $project->region = $request->region;
        $project->office_type = $request->officeType;
        $project->office = $request->office;
        $project->name = $request->projectName;
        $project->activities = json_encode($request->activities);
        // Removed file path assignment
        $project->uploaded_by = json_encode($request->uploadedBy);
        $project->save();

        return response()->json(['success' => true, 'message' => 'Project created successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
