@extends('layouts.admin')

@section('title', 'Funding Programs Directory - Admin Panel')

@section('content')
<div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
    <div>
        <h1 class="text-3xl font-extrabold text-white font-serif mb-1">Funding Programs Directory</h1>
        <p class="text-sm text-gray-400">Manage startup funding programs, grants, VCs, and accelerators.</p>
    </div>
    <a href="{{ route('admin.funding-programs.create') }}" class="bg-gradient-to-r from-gold to-[#a88d30] text-navy px-5 py-2.5 rounded-xl text-sm font-bold shadow-lg hover:shadow-gold/30 transition-all">
        + Add Funding Program
    </a>
</div>

<div class="bg-white/5 backdrop-blur-xl rounded-3xl border border-white/10 shadow-lg overflow-hidden relative z-10">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-black/20 border-b border-white/10 text-xs font-bold text-gray-400 uppercase tracking-wider">
                    <th class="py-4 px-6">Program Name</th>
                    <th class="py-4 px-6">Organization</th>
                    <th class="py-4 px-6">Amount</th>
                    <th class="py-4 px-6">Type & Stage</th>
                    <th class="py-4 px-6">Deadline</th>
                    <th class="py-4 px-6">Status</th>
                    <th class="py-4 px-6 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                @foreach($programs as $prog)
                <tr class="hover:bg-white/5 transition-colors">
                    <td class="py-4 px-6 font-bold text-white">
                        {{ $prog->name }}
                        @if($prog->is_featured)
                            <span class="ml-2 bg-gold/20 text-gold border border-gold/30 text-[9px] font-bold px-2 py-0.5 rounded-full">Featured</span>
                        @endif
                    </td>
                    <td class="py-4 px-6 text-gray-300">{{ $prog->organization_name }}</td>
                    <td class="py-4 px-6 font-bold text-emerald-400">{{ $prog->funding_amount }}</td>
                    <td class="py-4 px-6 text-xs">
                        <span class="bg-white/10 text-white px-2 py-1 rounded">{{ $prog->funding_type }}</span>
                        <span class="text-gray-400 ml-1">({{ $prog->startup_stage }})</span>
                    </td>
                    <td class="py-4 px-6 text-xs text-gray-400">
                        {{ $prog->application_deadline ? $prog->application_deadline->format('d M Y') : 'Open' }}
                    </td>
                    <td class="py-4 px-6">
                        <span class="text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider {{ $prog->status == 'active' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-red-500/20 text-red-400 border border-red-500/30' }}">
                            {{ $prog->status }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-right space-x-2">
                        <a href="{{ route('admin.funding-programs.edit', $prog->id) }}" class="text-gold hover:underline font-semibold text-xs">Edit</a>
                        
                        <form action="{{ route('admin.funding-programs.duplicate', $prog->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="text-blue-400 hover:underline font-semibold text-xs">Duplicate</button>
                        </form>

                        <form action="{{ route('admin.funding-programs.destroy', $prog->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this program?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:underline font-semibold text-xs">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="p-4 border-t border-white/10">
        {{ $programs->links() }}
    </div>
</div>
@endsection
