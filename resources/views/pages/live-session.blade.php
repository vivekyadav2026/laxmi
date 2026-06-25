@extends('layouts.app')

@section('title', '₹99 Live Business Setup Session | Foundida')

@section('content')
<div x-data="{ showBookingModal: {{ (session('booking_success') || $errors->any()) ? 'true' : 'false' }} }">
    <!-- HERO SECTION -->
    <x-inner-hero>
        <div class="flex flex-col items-center justify-center text-center">
            <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none animate-pulse">
                <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                    <i class="fas fa-video mr-1"></i> LIVE 1-ON-1 EXPERT SESSION
                </span>
            </div>
            <h1 class="font-serif text-[36px] md:text-[52px] font-bold text-white leading-tight mb-4">
                Complete Business Guide <br/> For Just <span class="text-[#f5a623]">₹99</span>
            </h1>
            <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed max-w-[600px] mx-auto mb-8">
                Don\'t know where to start? Pay just ₹99 and get a 30-minute live session with our top business experts. We\'ll give you a complete roadmap for registration, GST, and compliances.
            </p>
            <button @click="showBookingModal = true" class="bg-[#f5a623] text-[#0d1b3e] px-8 py-4 rounded-xl font-bold text-lg hover:bg-[#c09435] transition-all shadow-lg hover:-translate-y-1 flex items-center gap-2">
                Book Live Session Now - ₹99 <i class="fas fa-arrow-right text-sm"></i>
            </button>
        </div>
    </x-inner-hero>

    <!-- WHAT HAPPENS IN SESSION -->
    <div class="bg-white py-20 relative z-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center gap-12">
                <!-- Left Side Image/Graphic -->
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-[#f5a623]/20 to-transparent rounded-2xl transform translate-x-4 translate-y-4"></div>
                    <div class="bg-[#0B1F3A] p-8 rounded-2xl relative z-10 text-white shadow-2xl flex flex-col items-center justify-center text-center h-[350px]">
                        <div class="w-20 h-20 bg-[#f5a623] rounded-full flex items-center justify-center mb-6 shadow-lg shadow-[#f5a623]/30">
                            <i class="fas fa-headset text-3xl text-[#0B1F3A]"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">1-on-1 Guidance</h3>
                        <p class="text-gray-300 text-sm">Speak directly to our experts on a video call. No bots, no generic advice.</p>
                    </div>
                </div>

                <!-- Right Side Content -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-3xl font-bold text-[#0B1F3A] mb-2 font-serif">₹99 में क्या मिलेगा?</h2>
                    <p class="text-sm font-bold text-[#D4A843] uppercase tracking-wider mb-8">What You Get in 30 Minutes</p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                                <i class="fas fa-map-signs"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Business Roadmap</h4>
                                <p class="text-sm text-gray-500">आपके बिज़नेस के लिए कौन सी कंपनी (PVT, LLP, Proprietorship) सही है, इसकी पूरी जानकारी।</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                                <i class="fas fa-file-signature"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Licensing & GST</h4>
                                <p class="text-sm text-gray-500">आपको किन-किन लाइसेंस (GST, FSSAI, Trademark) की जरूरत होगी, उसका पूरा खाका।</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 rounded-full bg-[#D4A843]/10 flex items-center justify-center text-[#D4A843] mr-4 shrink-0">
                                <i class="fas fa-comments"></i>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-[#0B1F3A] mb-1">Doubt Clearing</h4>
                                <p class="text-sm text-gray-500">आपके सभी सवालों और शंकाओं का लाइव समाधान।</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 pt-8 border-t border-gray-100">
                        <p class="text-xs text-gray-400 italic">"यह ₹99 का निवेश आपको भविष्य में हजारों रुपये और कई कानूनी झंझटों से बचा सकता है।"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BOOKING MODAL -->
    <div x-show="showBookingModal" class="fixed inset-0 z-[200] overflow-y-auto" style="display: none;" x-cloak>
        <!-- Backdrop -->
        <div x-show="showBookingModal" x-transition.opacity @click="showBookingModal = false" class="fixed inset-0 bg-black/60 backdrop-blur-sm"></div>

        <!-- Modal Wrapper -->
        <div class="flex items-center justify-center min-h-screen p-4">
            <div x-show="showBookingModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="bg-white rounded-3xl overflow-hidden shadow-2xl max-w-md w-full relative z-30 border border-gray-100 p-6 md:p-8">
                
                <!-- Close Button -->
                <button @click="showBookingModal = false" class="absolute top-5 right-5 text-gray-400 hover:text-gray-600 transition-colors w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center">
                    <i class="fas fa-times"></i>
                </button>

                @if(session('booking_success'))
                    <div class="text-center py-4">
                        <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl font-bold">
                            ✓
                        </div>
                        <h3 class="text-xl font-bold text-navy mb-1 font-serif">बुकिंग का अनुरोध सफल!</h3>
                        <p class="text-xs font-bold text-gold uppercase tracking-wider mb-3">Request Successful</p>
                        <p class="text-gray-600 text-xs leading-relaxed mb-6">{{ session('booking_success') }}</p>
                        <button @click="showBookingModal = false" class="bg-navy text-white px-8 py-2.5 rounded-xl font-bold hover:bg-navy-800 transition-colors text-sm w-full">
                            Close
                        </button>
                    </div>
                @else
                    <div class="flex flex-col mb-6">
                        <h3 class="text-lg font-bold text-navy mb-0.5 font-serif">लाइव सेशन बुक करें (₹99)</h3>
                        <span class="text-[10px] font-bold text-gold uppercase tracking-wider">Book Live Expert Session</span>
                    </div>

                    <form action="{{ route('live-session.book') }}" method="POST" class="space-y-4">
                        @csrf
                        
                        <!-- Name -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">पूरा नाम <span class="text-red-500">*</span></span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">Full Name</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                    <i class="fas fa-user text-sm"></i>
                                </div>
                                <input type="text" name="name" value="{{ old('name') }}" required placeholder="Ex: Amit Patel" class="w-full pr-4 py-2.5 bg-gray-50/50 border border-gray-200 @error('name') border-red-500 @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.5rem;">
                            </div>
                            @error('name')
                                <p class="text-red-500 text-[10px] mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">फ़ोन नंबर (WhatsApp) <span class="text-red-500">*</span></span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">WhatsApp Number</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                    <i class="fab fa-whatsapp text-base"></i>
                                </div>
                                <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="10-digit number" class="w-full pr-4 py-2.5 bg-gray-50/50 border border-gray-200 @error('phone') border-red-500 @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.5rem;">
                            </div>
                            @error('phone')
                                <p class="text-red-500 text-[10px] mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">ईमेल पता</span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">Email Address (Optional)</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                    <i class="fas fa-envelope text-sm"></i>
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Ex: amit@gmail.com" class="w-full pr-4 py-2.5 bg-gray-50/50 border border-gray-200 @error('email') border-red-500 @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.5rem;">
                            </div>
                            @error('email')
                                <p class="text-red-500 text-[10px] mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Preferred Date -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">पसंदीदा तारीख <span class="text-red-500">*</span></span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">Preferred Date</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                    <i class="fas fa-calendar-alt text-sm"></i>
                                </div>
                                <input type="date" name="preferred_date" value="{{ old('preferred_date') ?? date('Y-m-d') }}" required min="{{ date('Y-m-d') }}" class="w-full pr-4 py-2.5 bg-gray-50/50 border border-gray-200 @error('preferred_date') border-red-500 @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.5rem;">
                            </div>
                            @error('preferred_date')
                                <p class="text-red-500 text-[10px] mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Preferred Time Slot -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">पसंदीदा समय <span class="text-red-500">*</span></span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">Preferred Time Slot</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-gold transition-colors">
                                    <i class="fas fa-clock text-sm"></i>
                                </div>
                                <select name="preferred_time" required class="w-full pr-4 py-2.5 bg-gray-50/50 border border-gray-200 @error('preferred_time') border-red-500 @enderror rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none" style="padding-left: 2.5rem; appearance: none;">
                                    <option value="">समय स्लॉट चुनें / Select Slot</option>
                                    <option value="10:00 AM - 12:00 PM" {{ old('preferred_time') === '10:00 AM - 12:00 PM' ? 'selected' : '' }}>10:00 AM - 12:00 PM</option>
                                    <option value="12:00 PM - 02:00 PM" {{ old('preferred_time') === '12:00 PM - 02:00 PM' ? 'selected' : '' }}>12:00 PM - 02:00 PM</option>
                                    <option value="02:00 PM - 04:00 PM" {{ old('preferred_time') === '02:00 PM - 04:00 PM' ? 'selected' : '' }}>02:00 PM - 04:00 PM</option>
                                    <option value="04:00 PM - 06:00 PM" {{ old('preferred_time') === '04:00 PM - 06:00 PM' ? 'selected' : '' }}>04:00 PM - 06:00 PM</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                            @error('preferred_time')
                                <p class="text-red-500 text-[10px] mt-1 font-semibold">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Notes -->
                        <div class="group">
                            <label class="flex flex-col mb-1.5 text-navy">
                                <span class="font-bold text-xs">अतिरिक्त जानकारी / नोट्स</span>
                                <span class="text-[9px] uppercase text-gray-400 font-bold tracking-wider">Any message or specific questions (Optional)</span>
                            </label>
                            <textarea name="notes" rows="2" placeholder="Describe what you want to discuss..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl shadow-sm text-navy placeholder-gray-400 text-sm font-medium transition-all focus:bg-white focus:shadow-md outline-none">{{ old('notes') }}</textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full bg-gold text-navy hover:bg-[#e2961d] active:scale-[0.99] py-3.5 rounded-xl font-bold transition-all shadow-lg shadow-gold/20 flex flex-col items-center justify-center">
                                <span class="text-base font-extrabold">बुक करें (₹99 का भुगतान करें)</span>
                                <span class="text-[10px] uppercase tracking-widest mt-0.5">Pay & Book Live Session</span>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
