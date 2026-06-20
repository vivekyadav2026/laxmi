@extends('layouts.admin')

@section('title', 'System Settings - Admin Panel')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-navy font-serif mb-1">System Settings</h1>
            <p class="text-sm text-gray-500">Configure global application preferences.</p>
        </div>
        <button class="bg-navy text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#1a365d] transition-colors shadow-sm">
            <i class="fas fa-save mr-2"></i> Save Changes
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Settings Sidebar -->
        <div class="col-span-1 bg-white rounded-2xl shadow-sm border border-gray-100 p-4">
            <nav class="space-y-1">
                <a href="#" class="block px-4 py-3 rounded-lg bg-gray-50 text-navy font-bold text-sm border-l-4 border-gold">General</a>
                <a href="#" class="block px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 text-sm font-medium transition-colors">Payment Gateways</a>
                <a href="#" class="block px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 text-sm font-medium transition-colors">Email Templates</a>
                <a href="#" class="block px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 text-sm font-medium transition-colors">Security</a>
            </nav>
        </div>

        <!-- Settings Content -->
        <div class="col-span-1 md:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h3 class="text-lg font-bold text-gray-700 mb-6 border-b border-gray-100 pb-4">General Preferences</h3>
            
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Site Name</label>
                    <input type="text" value="Foundida" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                </div>
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Contact Email</label>
                    <input type="email" value="support@foundida.com" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Support Phone Number</label>
                    <input type="text" value="+91 87505 30252" class="w-full border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gold/50 focus:border-gold">
                </div>

                <div class="pt-4 flex items-center gap-3 border-t border-gray-100">
                    <div class="w-10 h-6 bg-green-500 rounded-full relative cursor-pointer">
                        <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform translate-x-4"></div>
                    </div>
                    <span class="text-sm font-semibold text-gray-700">Maintenance Mode</span>
                </div>
            </div>
        </div>
    </div>
@endsection
