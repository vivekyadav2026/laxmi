<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'bio'          => 'nullable|string|max:300',
            'linkedin_url' => 'nullable|url|max:255',
            'sort_order'   => 'required|integer|min:0',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('team', 'public');
        }

        TeamMember::create([
            'name'         => $validated['name'],
            'role'         => $validated['role'],
            'bio'          => $validated['bio'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'sort_order'   => $validated['sort_order'],
            'photo'        => $photoPath,
            'is_active'    => $request->has('is_active'),
        ]);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully!');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, TeamMember $team)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'role'         => 'required|string|max:255',
            'bio'          => 'nullable|string|max:300',
            'linkedin_url' => 'nullable|url|max:255',
            'sort_order'   => 'required|integer|min:0',
            'photo'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($team->photo) Storage::disk('public')->delete($team->photo);
            $team->photo = $request->file('photo')->store('team', 'public');
        }

        $team->update([
            'name'         => $validated['name'],
            'role'         => $validated['role'],
            'bio'          => $validated['bio'] ?? null,
            'linkedin_url' => $validated['linkedin_url'] ?? null,
            'sort_order'   => $validated['sort_order'],
            'is_active'    => $request->has('is_active'),
        ]);

        if ($request->hasFile('photo')) {
            $team->save();
        }

        return redirect()->route('admin.team.index')->with('success', 'Team member updated!');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo) Storage::disk('public')->delete($team->photo);
        $team->delete();
        return redirect()->route('admin.team.index')->with('success', 'Team member deleted.');
    }
}
