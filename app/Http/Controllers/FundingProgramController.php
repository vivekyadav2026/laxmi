<?php

namespace App\Http\Controllers;

use App\Models\FundingProgram;
use App\Models\SavedFundingOpportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundingProgramController extends Controller
{
    // Directory Page
    public function index(Request $request)
    {
        $query = FundingProgram::where('status', '!=', 'inactive');

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('organization_name', 'like', "%{$search}%")
                  ->orWhere('short_description', 'like', "%{$search}%")
                  ->orWhere('industry', 'like', "%{$search}%");
            });
        }

        // Country Filter
        if ($request->filled('country')) {
            $query->where('country', $request->country);
        }

        // Industry Filter
        if ($request->filled('industry')) {
            $query->where('industry', 'like', "%{$request->industry}%");
        }

        // Startup Stage Filter
        if ($request->filled('startup_stage')) {
            $query->where('startup_stage', $request->startup_stage);
        }

        // Funding Type Filter
        if ($request->filled('funding_type')) {
            $query->where('funding_type', $request->funding_type);
        }

        // Status Filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Sorting
        if ($request->get('sort') == 'deadline_asc') {
            $query->orderBy('application_deadline', 'asc');
        } elseif ($request->get('sort') == 'amount_desc') {
            $query->orderBy('funding_amount_numeric', 'desc');
        } else {
            $query->orderBy('is_featured', 'desc')->orderBy('priority', 'desc')->orderBy('created_at', 'desc');
        }

        $programs = $query->paginate(12)->withQueryString();

        // Get filter options dropdown lists
        $countries = ['India', 'Global', 'USA', 'Singapore', 'UK'];
        $industries = ['Fintech', 'AgriTech', 'SaaS', 'Healthcare', 'BioTech', 'EdTech', 'CleanTech', 'AI', 'Consumer', 'Women-Led Startups'];
        $stages = ['Idea', 'MVP', 'Early Stage', 'Growth', 'Scaling'];
        $types = ['Grant', 'Equity', 'Accelerator', 'Incubator', 'Government', 'Private', 'Angel', 'VC'];

        // Get user's saved program IDs if logged in
        $savedIds = [];
        if (Auth::check()) {
            $savedIds = SavedFundingOpportunity::where('user_id', Auth::id())->pluck('funding_program_id')->toArray();
        }

        return view('pages.funding.index', compact('programs', 'countries', 'industries', 'stages', 'types', 'savedIds'));
    }

    // Detail Page
    public function show($slug)
    {
        $program = FundingProgram::where('slug', $slug)->firstOrFail();
        
        $relatedPrograms = FundingProgram::where('id', '!=', $program->id)
            ->where('status', 'active')
            ->where(function($q) use ($program) {
                $q->where('funding_type', $program->funding_type)
                  ->orWhere('startup_stage', $program->startup_stage);
            })
            ->take(3)
            ->get();

        $isSaved = false;
        if (Auth::check()) {
            $isSaved = SavedFundingOpportunity::where('user_id', Auth::id())
                ->where('funding_program_id', $program->id)
                ->exists();
        }

        return view('pages.funding.show', compact('program', 'relatedPrograms', 'isSaved'));
    }

    // Toggle Save Opportunity
    public function toggleSave(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Please login to save opportunities.'], 401);
        }

        $existing = SavedFundingOpportunity::where('user_id', Auth::id())
            ->where('funding_program_id', $id)
            ->first();

        if ($existing) {
            $existing->delete();
            return response()->json(['status' => 'removed', 'message' => 'Opportunity removed from saved list.']);
        } else {
            SavedFundingOpportunity::create([
                'user_id' => Auth::id(),
                'funding_program_id' => $id,
            ]);
            return response()->json(['status' => 'saved', 'message' => 'Opportunity saved successfully!']);
        }
    }

    // Report Expired Opportunity
    public function reportExpired(Request $request, $id)
    {
        $program = FundingProgram::findOrFail($id);
        // Can optionally log report or alert admin
        return response()->json(['status' => 'success', 'message' => 'Thank you for reporting. Our team will verify and update this program.']);
    }
}
