<?php

namespace App\Http\Controllers;

use App\Models\FundingProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminFundingProgramController extends Controller
{
    public function index()
    {
        $programs = FundingProgram::orderBy('priority', 'desc')->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.funding_programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.funding_programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'organization_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'funding_amount' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'industry' => 'required|string|max:255',
            'funding_type' => 'required|string|max:100',
            'startup_stage' => 'required|string|max:100',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'required_documents' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'official_apply_url' => 'nullable|url',
            'priority' => 'nullable|integer',
            'status' => 'required|string|in:active,inactive,expired',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->except('organization_logo');
        $data['slug'] = Str::slug($request->name . '-' . rand(10, 99));
        $data['is_featured'] = $request->has('is_featured');
        
        // Extract numeric value from funding_amount if possible
        preg_match_all('/\d+/', $request->funding_amount, $matches);
        if (!empty($matches[0])) {
            $data['funding_amount_numeric'] = (float) implode('', $matches[0]);
        }

        // Handle logo upload
        if ($request->hasFile('organization_logo')) {
            $path = $request->file('organization_logo')->store('organization-logos', 'public');
            $data['organization_logo'] = Storage::url($path);
        }

        FundingProgram::create($data);

        return redirect()->route('admin.funding-programs.index')->with('success', 'Funding Program created successfully.');
    }

    public function edit($id)
    {
        $program = FundingProgram::findOrFail($id);
        return view('admin.funding_programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = FundingProgram::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'organization_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'funding_amount' => 'required|string|max:255',
            'country' => 'required|string|max:100',
            'industry' => 'required|string|max:255',
            'funding_type' => 'required|string|max:100',
            'startup_stage' => 'required|string|max:100',
            'short_description' => 'required|string',
            'description' => 'nullable|string',
            'eligibility' => 'nullable|string',
            'required_documents' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'official_apply_url' => 'nullable|url',
            'priority' => 'nullable|integer',
            'status' => 'required|string|in:active,inactive,expired',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $data = $request->except('organization_logo');
        $data['is_featured'] = $request->has('is_featured');

        // Extract numeric value from funding_amount if possible
        preg_match_all('/\d+/', $request->funding_amount, $matches);
        if (!empty($matches[0])) {
            $data['funding_amount_numeric'] = (float) implode('', $matches[0]);
        }

        // Handle logo upload
        if ($request->hasFile('organization_logo')) {
            // Delete old photo if exists
            if ($program->organization_logo && !str_starts_with($program->organization_logo, 'http')) {
                // Convert URL back to path
                $oldPath = str_replace('/storage/', '', $program->organization_logo);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('organization_logo')->store('organization-logos', 'public');
            $data['organization_logo'] = Storage::url($path);
        }

        $program->update($data);

        return redirect()->route('admin.funding-programs.index')->with('success', 'Funding Program updated successfully.');
    }

    public function destroy($id)
    {
        $program = FundingProgram::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.funding-programs.index')->with('success', 'Funding Program deleted successfully.');
    }

    public function duplicate($id)
    {
        $program = FundingProgram::findOrFail($id);
        $newProgram = $program->replicate();
        $newProgram->name = $program->name . ' (Copy)';
        $newProgram->slug = Str::slug($newProgram->name . '-' . rand(10, 99));
        $newProgram->save();

        return redirect()->route('admin.funding-programs.index')->with('success', 'Funding Program duplicated successfully.');
    }
}
