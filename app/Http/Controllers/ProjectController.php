<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Logic to retrieve and display projects
        return view('profile.myprojects');
    }

    public function create()
    {
        // Logic to show the form for creating a new project
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'region' => 'required|string',
            'officeType' => 'required|string',
            'office' => 'required|string',
            'projectName' => 'required|string',
            'activities' => 'array',
            'uploadedBy' => 'array',
            'projectFiles' => 'file|mimes:pdf,doc,docx,xls,xlsx,png,jpg,jpeg'
        ]);

        // Store the project details in the database
        $project = Project::create([
            'region' => $request->region,
            'office_type' => $request->officeType,
            'office_name' => $request->office,
            'project_name' => $request->projectName,
            'activities' => $request->activities,
            'uploaded_by' => $request->uploadedBy,
            'file_path' => $request->file('projectFiles')->store('projects')
        ]);

        // Create the folder structure
        $folderPath = public_path("projects/{$request->region}/{$request->officeType}/{$request->office}/{$request->projectName}");

        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }

        return redirect()->route('myprojects')->with('success', 'Project created successfully.');
    }

    public function show($id)
    {
        // Logic to display a specific project
        return view('projects.show', compact('id'));
    }

    public function edit($id)
    {
        // Logic to show the form for editing a project
        return view('projects.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // Logic to update a specific project
        // Validate and update the project data
    }

    public function destroy($id)
    {
        // Logic to delete a specific project
    }

    public function createFolder(Request $request)
    {
        $path = $request->input('path');
        $office = $request->input('office'); // Assuming office is passed in the request

        $fullPath = public_path("offices/{$office}/{$path}");

        if (!File::exists($fullPath)) {
            File::makeDirectory($fullPath, 0755, true);
        }

        return redirect()->back()->with('success', 'Project Created Successfully');
    }
}