<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Funding Applications - Foundida</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f8f9fa; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .bg-navy { background-color: #0B1F3A; }
        .text-navy { color: #0B1F3A; }
        .bg-gold { background-color: #D4A843; }
        .text-gold { color: #D4A843; }
    </style>
</head>
<body class="text-gray-800 antialiased" x-data="{ sidebarOpen: false }">

<div class="min-h-screen flex">
    
    <!-- SIDEBAR -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" class="fixed inset-y-0 left-0 z-30 w-[240px] bg-navy text-white transition-transform duration-300 lg:translate-x-0 lg:static lg:inset-auto flex flex-col shadow-2xl">
        <div class="flex items-center justify-between p-6 border-b border-white/10">
            <a href="/" class="flex items-center group">
                <div class="w-8 h-8 bg-gold rounded flex items-center justify-center mr-2 shadow-sm">
                    <svg class="w-5 h-5 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                </div>
                <span class="font-serif text-lg font-bold text-white leading-tight">Foundida</span>
            </a>
        </div>

        <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
            <a href="{{ route('dashboard.user') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-colors">
                <i class="fas fa-home w-5 mr-3 text-gray-400"></i> Dashboard
            </a>
            
            <a href="{{ route('funding.index') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-colors">
                <i class="fas fa-search-dollar w-5 mr-3 text-gold"></i> Funding Opportunities
            </a>

            <a href="{{ route('dashboard.funding-applications') }}" class="flex items-center px-4 py-3 bg-gold/10 text-gold rounded-xl border border-gold/20 font-bold">
                <i class="fas fa-rocket w-5 mr-3 text-gold"></i> My Funding Applications
            </a>

            <a href="{{ route('dashboard.profile') }}" class="flex items-center px-4 py-3 text-gray-300 hover:bg-white/5 hover:text-white rounded-xl transition-colors">
                <i class="fas fa-user w-5 mr-3 text-gray-400"></i> My Profile
            </a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0 bg-gray-50 overflow-y-auto h-screen p-6 md:p-8">
        
        <div class="max-w-7xl mx-auto w-full space-y-8">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl md:text-3xl font-bold text-navy font-serif">My Funding Applications</h1>
                    <p class="text-xs text-gray-400">Track your assisted funding application timeline and documents</p>
                </div>
                <a href="{{ route('funding.index') }}" class="bg-gold text-navy px-5 py-2.5 rounded-xl font-bold text-xs hover:bg-gold-light transition-all shadow-sm">
                    + Explore Opportunities
                </a>
            </div>

            @if($applications->isEmpty())
                <div class="bg-white rounded-3xl p-12 text-center border border-gray-200 shadow-sm">
                    <div class="w-16 h-16 bg-navy/5 text-navy rounded-full flex items-center justify-center mx-auto mb-4 text-2xl">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <h3 class="text-lg font-bold text-navy font-serif mb-1">No Applications Submitted Yet</h3>
                    <p class="text-xs text-gray-400 max-w-sm mx-auto mb-6">Explore our curated marketplace to discover grants and VC programs, then submit assisted applications.</p>
                    <a href="{{ route('funding.index') }}" class="bg-navy text-white px-6 py-2.5 rounded-xl text-xs font-bold hover:bg-navy/90 transition-all">Browse Funding Directory</a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($applications as $app)
                    <div class="bg-white rounded-3xl border border-gray-200 p-6 shadow-sm space-y-6">
                        
                        <!-- Header -->
                        <div class="flex flex-col md:flex-row md:items-center justify-between border-b border-gray-100 pb-4 gap-4">
                            <div>
                                <div class="flex items-center gap-2">
                                    <span class="font-mono text-xs font-bold text-gray-400">#{{ $app->application_number }}</span>
                                    <span class="bg-gold/10 text-navy font-extrabold text-[10px] px-2.5 py-0.5 rounded-full border border-gold/30">{{ $app->package_name }} Package</span>
                                </div>
                                <h3 class="text-lg font-bold text-navy font-serif mt-1">{{ $app->program->name }}</h3>
                                <p class="text-xs text-gray-500">Organization: {{ $app->program->organization_name }}</p>
                            </div>

                            <div class="flex items-center gap-3">
                                <a href="{{ route('funding.invoice', $app->id) }}" target="_blank" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-xl text-xs font-bold transition-all">
                                    <i class="fas fa-file-invoice mr-1"></i> Invoice
                                </a>
                                <span class="px-3 py-1.5 rounded-xl text-xs font-bold {{ $app->payment_status == 'paid' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200' : 'bg-yellow-50 text-yellow-700 border border-yellow-200' }}">
                                    Payment: {{ ucfirst($app->payment_status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Status Timeline -->
                        <div>
                            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-3">Application Status Timeline</h4>
                            @php
                                $stages = [
                                    'Pending Documents',
                                    'Under Review',
                                    'Assigned Executive',
                                    'Application Submitted',
                                    'Waiting for Response',
                                    'Interview',
                                    'Approved'
                                ];
                                $currentIdx = array_search($app->status, $stages);
                                if ($currentIdx === false) $currentIdx = 1;
                            @endphp
                            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-7 gap-2 text-center">
                                @foreach($stages as $idx => $stg)
                                @php
                                    $isDone = $idx <= $currentIdx;
                                    $isCurrent = $idx === $currentIdx;
                                @endphp
                                <div class="p-2.5 rounded-xl text-xs flex flex-col items-center justify-center border transition-all {{ $isCurrent ? 'bg-navy text-gold border-navy shadow-md font-bold' : ($isDone ? 'bg-emerald-50 text-emerald-700 border-emerald-200 font-semibold' : 'bg-gray-50 text-gray-400 border-gray-100') }}">
                                    <div class="w-5 h-5 rounded-full flex items-center justify-center text-[10px] mb-1 {{ $isCurrent ? 'bg-gold text-navy' : ($isDone ? 'bg-emerald-500 text-white' : 'bg-gray-300 text-white') }}">
                                        {{ $isDone ? '✓' : ($idx + 1) }}
                                    </div>
                                    <span class="text-[10px] leading-tight">{{ $stg }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Exec & Documents Info -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-2 border-t border-gray-100 text-xs">
                            <div>
                                <span class="text-gray-400 font-bold uppercase block text-[10px]">Assigned Executive</span>
                                <span class="font-bold text-navy text-sm">{{ $app->assigned_executive ?: 'Foundida Senior Lead (Assigning...)' }}</span>
                            </div>

                            <div>
                                <span class="text-gray-400 font-bold uppercase block text-[10px]">Uploaded Files</span>
                                <div class="space-y-1 mt-1">
                                    @if($app->pitch_deck_path)
                                        <a href="{{ asset('storage/'.$app->pitch_deck_path) }}" target="_blank" class="text-blue-600 font-semibold hover:underline block">• Pitch Deck.pdf</a>
                                    @endif
                                    @if($app->business_plan_path)
                                        <a href="{{ asset('storage/'.$app->business_plan_path) }}" target="_blank" class="text-blue-600 font-semibold hover:underline block">• Business Plan.doc</a>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <span class="text-gray-400 font-bold uppercase block text-[10px]">Submission Date</span>
                                <span class="font-semibold text-navy">{{ $app->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </div>
            @endif
        </div>

    </main>
</div>

</body>
</html>
