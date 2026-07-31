@extends('layouts.admin')

@section('title', 'Users Management - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 relative z-10">
        <div>
            <h1 class="text-3xl font-extrabold text-white font-serif mb-1 drop-shadow-md">Users Management</h1>
            <p class="text-sm text-gray-400">Manage all registered accounts on the platform.</p>
        </div>
    </div>

    <div class="bg-white/5 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/10 overflow-hidden relative z-10">
        @if($users->isEmpty())
            <div class="p-16 flex flex-col items-center justify-center text-center">
                <div class="w-16 h-16 bg-navy/40 border border-white/5 rounded-full flex items-center justify-center text-gray-400 text-2xl mb-4 shadow-inner">
                    <i class="fas fa-users-slash"></i>
                </div>
                <h3 class="text-lg font-bold text-white mb-1 font-serif">No Registered Users Found</h3>
                <p class="text-xs text-gray-400 max-w-sm">No registered user records exist in the database.</p>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-white/5 bg-white/2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
                            <th class="px-6 py-5">User</th>
                            <th class="px-6 py-5">Email Address</th>
                            <th class="px-6 py-5">Role</th>
                            <th class="px-6 py-5">Joined On</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                        @foreach($users as $user)
                            <tr class="hover:bg-white/[0.02] transition-colors">
                                <td class="px-6 py-4.5 font-bold text-white flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gold/20 text-gold flex items-center justify-center font-bold text-sm">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <div>{{ $user->name }}</div>
                                </td>
                                <td class="px-6 py-4.5 font-medium text-gray-300">{{ $user->email }}</td>
                                <td class="px-6 py-4.5">
                                    @if($user->role === 'admin')
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gold/20 text-gold border border-gold/30">
                                            <i class="fas fa-shield-alt text-[10px]"></i> Administrator
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-blue-500/10 text-blue-400 border border-blue-500/20">
                                            User
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4.5 text-xs text-gray-400">
                                    {{ $user->created_at ? $user->created_at->format('d M Y, h:i A') : 'N/A' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="px-6 py-5 border-t border-white/5 flex items-center justify-between text-xs text-gray-400 bg-white/1">
                    <div>
                        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} results
                    </div>
                    <div class="flex items-center gap-1.5">
                        {{ $users->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
@endsection
