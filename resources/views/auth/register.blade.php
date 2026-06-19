@extends('layouts.app')

@section('title', 'रजिस्टर | Register - Foundida')

@section('content')
<div class="min-h-screen flex flex-col md:flex-row bg-white">
    <!-- LEFT SIDE (Navy 40%) -->
    <div class="w-full md:w-2/5 bg-navy text-white flex flex-col justify-between p-8 md:p-12 relative overflow-hidden hidden md:flex">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#C9933A 1px, transparent 1px); background-size: 24px 24px;"></div>
        
        <div class="relative z-10">
            <!-- Brand & Tagline -->
            <a href="/" class="inline-block mb-12 group">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-gold rounded-lg flex items-center justify-center mr-3 shadow-lg group-hover:-translate-y-1 transition-transform">
                        <svg class="w-6 h-6 text-navy" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-serif text-2xl font-bold text-white tracking-wide leading-tight">लॉ प्लेटफॉर्म</span>
                        <span class="text-[9px] uppercase tracking-widest text-gold font-bold">Legal Platform</span>
                    </div>
                </div>
            </a>

            <!-- Trust Points -->
            <div class="space-y-8 mt-10">
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">बार काउंसिल वेरिफाइड वकील</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Bar Council Verified Lawyers</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">₹499 से शुरू</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Starting at ₹499</span>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-navy-800 border border-gold flex items-center justify-center shrink-0 mr-4 text-gold">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-white text-base leading-tight mb-0.5">10 लाख+ का भरोसा</span>
                        <span class="text-[10px] text-gray-400 uppercase tracking-widest font-bold">Trusted by 10 Lakh+</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial -->
        <div class="relative z-10 mt-16 bg-navy-800/80 p-5 rounded-2xl border border-navy-600">
            <svg class="w-8 h-8 text-gold opacity-50 absolute -top-4 -left-2" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            <div class="flex flex-col italic text-gray-300 relative z-10 space-y-2">
                <span class="text-sm">"बेहतरीन सेवा! मेरी कंपनी का रजिस्ट्रेशन बिना किसी परेशानी के हो गया।"</span>
                <span class="text-[11px] text-gray-400">"Excellent service! My company registration was done without any hassle."</span>
            </div>
            <div class="mt-4 flex items-center">
                <div class="w-8 h-8 rounded-full bg-gray-500 mr-3"></div>
                <div class="flex flex-col">
                    <span class="font-bold text-white text-xs">अमित शर्मा</span>
                    <span class="text-[9px] text-gold uppercase tracking-widest">Amit Sharma</span>
                </div>
            </div>
        </div>
    </div>

    <!-- RIGHT SIDE (White 60%) -->
    <div class="w-full md:w-3/5 bg-white flex flex-col justify-center px-8 py-12 md:px-16 lg:px-24" x-data="{ userType: 'client' }">
        <div class="max-w-xl w-full mx-auto">
            
            <div class="flex flex-col mb-8 text-center md:text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">शुरू करें</h1>
                <span class="text-sm font-bold text-gold uppercase tracking-wider">Get Started</span>
            </div>

            <!-- User Type Toggle -->
            <div class="flex p-1 bg-gray-100 rounded-xl mb-8">
                <button @click="userType = 'client'" :class="userType === 'client' ? 'bg-white shadow text-navy border-gold border-b-2' : 'text-gray-500 hover:text-navy'" class="flex-1 py-3 px-4 rounded-lg font-bold transition-all duration-300 flex flex-col items-center justify-center min-h-[48px]">
                    <span class="text-sm">मैं Client हूं</span>
                    <span class="text-[9px] uppercase tracking-widest mt-0.5">I am a Client</span>
                </button>
                <button @click="userType = 'lawyer'" :class="userType === 'lawyer' ? 'bg-white shadow text-navy border-gold border-b-2' : 'text-gray-500 hover:text-navy'" class="flex-1 py-3 px-4 rounded-lg font-bold transition-all duration-300 flex flex-col items-center justify-center min-h-[48px]">
                    <span class="text-sm">मैं Lawyer/Vakeel हूं</span>
                    <span class="text-[9px] uppercase tracking-widest mt-0.5">I am a Lawyer</span>
                </button>
            </div>

            <form class="space-y-5">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Name -->
                    <div>
                        <label class="flex flex-col mb-1 text-navy">
                            <span class="font-bold text-sm">पूरा नाम <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Full Name</span>
                        </label>
                        <input type="text" required placeholder="उदा: अमित पटेल / Ex: Amit Patel" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                    <!-- Phone -->
                    <div>
                        <label class="flex flex-col mb-1 text-navy">
                            <span class="font-bold text-sm">फ़ोन नंबर <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Phone Number</span>
                        </label>
                        <div class="relative flex">
                            <div class="flex-shrink-0 z-10 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-navy bg-gray-100 border border-gray-300 rounded-l-lg">
                                +91
                            </div>
                            <input type="tel" required placeholder="10-अंकीय नंबर / 10-digit number" class="block w-full z-20 border-gray-300 rounded-r-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- Email -->
                    <div>
                        <label class="flex flex-col mb-1 text-navy">
                            <span class="font-bold text-sm">ईमेल <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Email</span>
                        </label>
                        <input type="email" required placeholder="उदा: user@email.com / Ex: user@email.com" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                    <!-- City -->
                    <div>
                        <label class="flex flex-col mb-1 text-navy">
                            <span class="font-bold text-sm">शहर <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">City</span>
                        </label>
                        <input type="text" required placeholder="उदा: दिल्ली / Ex: Delhi" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="flex flex-col mb-1 text-navy">
                        <span class="font-bold text-sm">पासवर्ड <span class="text-red-500">*</span></span>
                        <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Password</span>
                    </label>
                    <input type="password" required placeholder="••••••••" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm">
                </div>

                <!-- LAWYER SPECIFIC FIELDS -->
                <div x-show="userType === 'lawyer'" x-collapse x-cloak class="space-y-5 bg-navy-50 p-5 rounded-xl border border-navy-100 mt-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Bar Reg No -->
                        <div>
                            <label class="flex flex-col mb-1 text-navy">
                                <span class="font-bold text-sm">बार पंजीकरण संख्या <span class="text-red-500">*</span></span>
                                <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Bar Reg. No.</span>
                            </label>
                            <input type="text" :required="userType === 'lawyer'" placeholder="उदा: D/1234/2010 / Ex: D/1234/2010" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm bg-white">
                        </div>
                        <!-- State -->
                        <div>
                            <label class="flex flex-col mb-1 text-navy">
                                <span class="font-bold text-sm">नामांकन राज्य <span class="text-red-500">*</span></span>
                                <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Enrollment State</span>
                            </label>
                            <select :required="userType === 'lawyer'" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm bg-white">
                                <option value="" disabled selected>चुनें / Select</option>
                                <option value="delhi">दिल्ली / Delhi</option>
                                <option value="maharashtra">महाराष्ट्र / Maharashtra</option>
                                <option value="up">उत्तर प्रदेश / Uttar Pradesh</option>
                            </select>
                        </div>
                    </div>
                    <!-- Specialization -->
                    <div>
                        <label class="flex flex-col mb-1 text-navy">
                            <span class="font-bold text-sm">विशेषज्ञता <span class="text-red-500">*</span></span>
                            <span class="text-[10px] uppercase text-gray-500 font-bold tracking-wider">Specialization</span>
                        </label>
                        <select :required="userType === 'lawyer'" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-navy focus:border-navy text-navy min-h-[48px] px-4 text-sm bg-white">
                            <option value="" disabled selected>चुनें / Select</option>
                            <option value="corporate">कॉर्पोरेट कानून / Corporate Law</option>
                            <option value="criminal">आपराधिक कानून / Criminal Law</option>
                            <option value="family">पारिवारिक कानून / Family Law</option>
                            <option value="property">संपत्ति कानून / Property Law</option>
                            <option value="ipr">ट्रेडमार्क एवं पेटेंट / IPR</option>
                        </select>
                    </div>
                </div>

                <!-- Terms -->
                <div class="flex items-start mt-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" required class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-navy-300 text-navy">
                    </div>
                    <label for="terms" class="ml-2 text-sm font-medium text-gray-600 flex flex-col">
                        <span>मैं <a href="#" class="text-gold hover:underline">नियमों और शर्तों</a> से सहमत हूँ।</span>
                        <span class="text-[10px] uppercase tracking-widest mt-0.5">I agree to the <a href="#" class="text-gold hover:underline">Terms & Conditions</a>.</span>
                    </label>
                </div>

                <!-- Buttons -->
                <div class="pt-4">
                    <button type="submit" class="w-full bg-gold text-navy hover:bg-gold-light min-h-[56px] rounded-xl font-bold transition-all duration-300 shadow-md hover:-translate-y-1 flex flex-col items-center justify-center group">
                        <span class="text-[16px] font-extrabold group-hover:scale-105 transition-transform">अकाउंट बनाएं</span>
                        <span class="text-[10px] uppercase tracking-widest mt-0.5">Create Account</span>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center border-t border-gray-100 pt-6">
                <a href="/login" class="group flex flex-col items-center">
                    <span class="text-navy font-bold group-hover:text-gold transition-colors">पहले से अकाउंट है? लॉगिन करें</span>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-gray-500 group-hover:text-gold transition-colors">Already have an account? Login</span>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
