@extends('layouts.admin')

@section('title', 'Manage Application #' . $application->application_number . ' - Admin Panel')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">
    
    <div class="flex items-center justify-between">
        <div>
            <span class="text-xs font-mono text-gold font-bold">#{{ $application->application_number }}</span>
            <h1 class="text-3xl font-extrabold text-white font-serif">Application Management</h1>
        </div>
        <a href="{{ route('admin.funding-applications.index') }}" class="text-gray-400 hover:text-white text-xs font-bold">← Back to Applications</a>
    </div>

    <!-- Overview Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left 2 Cols: Details & Timeline -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Founder Details -->
            <div class="bg-white/5 backdrop-blur-xl p-6 rounded-3xl border border-white/10 shadow-lg space-y-4">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/10 pb-3">Founder & Startup Info</h3>
                
                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Founder Name</span>
                        <span class="text-white text-sm font-bold">{{ $application->founder_name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Startup Name</span>
                        <span class="text-white text-sm font-bold">{{ $application->startup_name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Contact Email</span>
                        <span class="text-gray-300">{{ $application->email }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Mobile Number</span>
                        <span class="text-gray-300">{{ $application->mobile }}</span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Industry & Stage</span>
                        <span class="text-gray-300">{{ $application->industry }} ({{ $application->startup_stage }})</span>
                    </div>
                    <div>
                        <span class="text-gray-400 font-bold block uppercase">Funding Required</span>
                        <span class="text-gold font-extrabold text-sm">{{ $application->funding_required }}</span>
                    </div>
                </div>

                <div class="pt-2 border-t border-white/10">
                    <span class="text-gray-400 font-bold uppercase block text-xs mb-1">Startup Description</span>
                    <p class="text-xs text-gray-300 leading-relaxed">{{ $application->startup_description }}</p>
                </div>

                @if($application->pitch_deck_path || $application->business_plan_path || $application->financial_projection_path)
                <div class="pt-2 border-t border-white/10">
                    <span class="text-gray-400 font-bold uppercase block text-xs mb-2">Uploaded Documents</span>
                    <div class="flex flex-wrap gap-2 text-xs">
                        @if($application->pitch_deck_path)
                            <a href="{{ asset('storage/'.$application->pitch_deck_path) }}" target="_blank" class="bg-white/10 hover:bg-white/20 text-gold px-3 py-1.5 rounded-xl border border-white/10 font-bold">
                                📄 Pitch Deck
                            </a>
                        @endif
                        @if($application->business_plan_path)
                            <a href="{{ asset('storage/'.$application->business_plan_path) }}" target="_blank" class="bg-white/10 hover:bg-white/20 text-gold px-3 py-1.5 rounded-xl border border-white/10 font-bold">
                                📘 Business Plan
                            </a>
                        @endif
                        @if($application->financial_projection_path)
                            <a href="{{ asset('storage/'.$application->financial_projection_path) }}" target="_blank" class="bg-white/10 hover:bg-white/20 text-gold px-3 py-1.5 rounded-xl border border-white/10 font-bold">
                                📊 Financials
                            </a>
                        @endif
                    </div>
                </div>
                @endif
            </div>

            <!-- Communication & Workflow Logs -->
            <div class="bg-white/5 backdrop-blur-xl p-6 rounded-3xl border border-white/10 shadow-lg space-y-4">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/10 pb-3">Email & WhatsApp Logs</h3>

                <form action="{{ route('admin.funding-applications.message', $application->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <div class="grid grid-cols-2 gap-3">
                        <select name="channel" class="bg-navy/60 border border-white/10 rounded-xl px-3 py-2 text-xs text-white">
                            <option value="email">Send Email Notification</option>
                            <option value="whatsapp">Send WhatsApp Notification</option>
                            <option value="admin_note">Internal Admin Note</option>
                        </select>
                    </div>
                    <textarea name="message" rows="2" placeholder="Type notification message..." required class="w-full bg-navy/60 border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white"></textarea>
                    <button type="submit" class="bg-gold text-navy font-bold px-4 py-2 rounded-xl text-xs hover:bg-gold-light transition-all">
                        Log & Send Notification
                    </button>
                </form>

                <div class="space-y-3 pt-4 border-t border-white/10 max-h-60 overflow-y-auto">
                    @foreach($application->logs as $log)
                    <div class="bg-black/20 p-3 rounded-xl border border-white/5 text-xs">
                        <div class="flex justify-between items-center text-gray-400 text-[10px] mb-1">
                            <span class="font-bold uppercase text-gold">[{{ $log->type }}] by {{ $log->sender }}</span>
                            <span>{{ $log->created_at->format('d M, h:i A') }}</span>
                        </div>
                        <p class="text-gray-200">{{ $log->message }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- Right Col: Controls & Actions -->
        <div class="space-y-6">
            
            <div class="bg-white/5 backdrop-blur-xl p-6 rounded-3xl border border-white/10 shadow-lg space-y-4">
                <h3 class="text-lg font-bold text-white font-serif border-b border-white/10 pb-3">Update Application</h3>

                <form action="{{ route('admin.funding-applications.updateStatus', $application->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Application Stage Status</label>
                        <select name="status" class="w-full bg-navy/60 border border-white/10 rounded-xl px-3 py-2 text-xs text-white font-bold">
                            @foreach([
                                'Pending Documents',
                                'Under Review',
                                'Assigned Executive',
                                'Application Submitted',
                                'Waiting for Response',
                                'Interview',
                                'Approved',
                                'Rejected'
                            ] as $st)
                                <option value="{{ $st }}" {{ $application->status == $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Assign Team Executive</label>
                        <input type="text" name="assigned_executive" value="{{ old('assigned_executive', $application->assigned_executive ?? '') }}" placeholder="e.g. Vikram Sharma" class="w-full bg-navy/60 border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-1">Internal Comments</label>
                        <textarea name="internal_comments" rows="3" placeholder="Notes for internal team..." class="w-full bg-navy/60 border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white">{{ old('internal_comments', $application->internal_comments ?? '') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-gold text-navy font-bold py-2.5 rounded-xl text-xs hover:bg-gold-light transition-all shadow-md">
                        Save Status Changes
                    </button>
                </form>
            </div>

            <!-- Upload Verified Document -->
            <div class="bg-white/5 backdrop-blur-xl p-6 rounded-3xl border border-white/10 shadow-lg space-y-4">
                <h3 class="text-sm font-bold text-white uppercase tracking-wider">Upload Prepared File</h3>

                <form action="{{ route('admin.funding-applications.upload', $application->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    <input type="text" name="document_title" placeholder="Document Title (e.g. Final Submission Receipt)" required class="w-full bg-navy/60 border border-white/10 rounded-xl px-3.5 py-2 text-xs text-white">
                    <input type="file" name="document_file" required class="w-full text-xs text-gray-400">
                    <button type="submit" class="w-full bg-white/10 hover:bg-white/20 text-white font-bold py-2 rounded-xl text-xs transition-all">
                        Upload to Client Case File
                    </button>
                </form>
            </div>

        </div>

    </div>
</div>
@endsection
