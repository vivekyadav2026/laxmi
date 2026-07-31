<?php

namespace App\Http\Controllers;

use App\Models\FundingApplication;
use App\Models\FundingApplicationLog;
use Illuminate\Http\Request;

class AdminFundingApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = FundingApplication::with('program')->orderBy('created_at', 'desc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        $applications = $query->paginate(15);

        return view('admin.funding_applications.index', compact('applications'));
    }

    public function show($id)
    {
        $application = FundingApplication::with(['program', 'logs'])->findOrFail($id);
        return view('admin.funding_applications.show', compact('application'));
    }

    public function updateStatus(Request $request, $id)
    {
        $application = FundingApplication::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Pending Documents,Under Review,Assigned Executive,Application Submitted,Waiting for Response,Interview,Approved,Rejected',
            'assigned_executive' => 'nullable|string|max:255',
            'admin_notes' => 'nullable|string',
            'internal_comments' => 'nullable|string',
        ]);

        $oldStatus = $application->status;
        $newStatus = $request->status;

        $application->status = $newStatus;
        if ($request->filled('assigned_executive')) {
            $application->assigned_executive = $request->assigned_executive;
        }
        if ($request->filled('admin_notes')) {
            $application->admin_notes = $request->admin_notes;
        }
        if ($request->filled('internal_comments')) {
            $application->internal_comments = $request->internal_comments;
        }
        $application->save();

        if ($oldStatus !== $newStatus) {
            FundingApplicationLog::create([
                'funding_application_id' => $application->id,
                'type' => 'status_change',
                'sender' => 'admin',
                'message' => "Application status updated from '{$oldStatus}' to '{$newStatus}'.",
            ]);
        }

        return redirect()->back()->with('success', 'Application details updated successfully.');
    }

    public function addMessage(Request $request, $id)
    {
        $application = FundingApplication::findOrFail($id);

        $request->validate([
            'message' => 'required|string',
            'channel' => 'required|in:email,whatsapp,admin_note',
        ]);

        FundingApplicationLog::create([
            'funding_application_id' => $application->id,
            'type' => $request->channel,
            'sender' => 'admin',
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Communication log added successfully.');
    }

    public function uploadDocument(Request $request, $id)
    {
        $application = FundingApplication::findOrFail($id);

        $request->validate([
            'document_file' => 'required|file|max:10240',
            'document_title' => 'required|string|max:255',
        ]);

        $path = $request->file('document_file')->store('funding-docs/admin-uploads', 'public');

        FundingApplicationLog::create([
            'funding_application_id' => $application->id,
            'type' => 'document_upload',
            'sender' => 'admin',
            'message' => "Uploaded Document: {$request->document_title}",
            'attachment_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Document uploaded and logged.');
    }
}
