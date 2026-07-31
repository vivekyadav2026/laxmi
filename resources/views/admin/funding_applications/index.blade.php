@extends('layouts.admin')

@section('title', 'Paid Application Management - Admin Panel')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
    <div>
        <h1 class="text-3xl font-extrabold text-white font-serif mb-1">Paid Funding Applications</h1>
        <p class="text-sm text-gray-400">Review founder pitch decks, track progress, assign team members, and process client applications.</p>
    </div>
</div>

<div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 shadow-lg overflow-hidden relative z-10">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-black/20 border-b border-white/10 text-xs font-bold text-gray-400 uppercase tracking-wider">
                    <th class="py-4 px-6">App #</th>
                    <th class="py-4 px-6">Founder & Startup</th>
                    <th class="py-4 px-6">Program</th>
                    <th class="py-4 px-6">Package</th>
                    <th class="py-4 px-6">Executive</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @foreach($applications as $app)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="py-4 px-6 font-mono text-xs font-bold text-gold">#{{ $app->application_number }}</td>
                    <td class="py-4 px-6 font-bold text-white">
                        {{ $app->founder_name }}
                        <span class="block text-xs text-gray-400 font-normal">{{ $app->startup_name }} ({{ $app->industry }})</span>
                    </td>
                    <td class="py-4 px-6 text-gray-300 text-xs">{{ $app->program->name }}</td>
                    <td class="py-4 px-6 text-xs">
                        <span class="bg-gold/20 text-gold border border-gold/30 px-2.5 py-1 rounded-full font-bold">
                            {{ $app->package_name }} (₹{{ number_format($app->package_price) }})
                        </span>
                    </td>
                    <td class="py-4 px-6 text-xs text-gray-300">
                        {{ $app->assigned_executive ?: 'Unassigned' }}
                    </td>
                    <td class="py-4 px-6">
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider bg-blue-500/20 text-blue-400 border border-blue-500/30">
                            {{ $app->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="{{ route('admin.funding-applications.show', $app->id) }}" class="bg-gold text-navy px-3 py-1.5 rounded-lg text-xs font-bold hover:bg-gold-light transition-all">
                            Manage & Process ➔
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-white/10">
        {{ $applications->links() }}
    </div>
</div>
@endsection
