@extends('layouts.app')

@section('title', 'हमारे बारे में | About Us - Foundida')

@section('content')
<!-- BREADCRUMB -->
<div class="bg-navy py-4 border-b border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="flex flex-col text-gray-300 hover:text-gold transition">
                        <span class="font-bold leading-tight">होम</span>
                        <span class="text-[10px] uppercase">Home</span>
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-gray-500 mx-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        <div class="flex flex-col text-gold ml-1 md:ml-2">
                            <span class="font-bold leading-tight">हमारे बारे में</span>
                            <span class="text-[10px] uppercase">About Us</span>
                        </div>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<x-inner-hero>
    <div class="flex flex-col items-center justify-center text-center">
        <div class="inline-flex items-center gap-2 bg-[#f5a623]/10 border border-[#f5a623]/30 rounded-full px-3 py-1.5 mb-5 w-fit select-none">
            <span class="text-[10px] font-bold text-[#f5a623] uppercase tracking-widest flex items-center gap-1">
                ABOUT FOUNDIDA
            </span>
        </div>
        <h1 class="font-serif text-[36px] md:text-[56px] font-bold text-white leading-tight">
            <span class="text-[#f5a623]">भारत</span> का सबसे भरोसेमंद लीगल प्लेटफॉर्म
        </h1>
        <p class="text-[14px] md:text-[16px] text-gray-300 font-medium leading-relaxed mt-4 max-w-[600px] mx-auto">
            India's Most Trusted Legal Platform
        </p>
    </div>
</x-inner-hero>

<!-- STATS ROW -->
<div class="bg-gold py-12 relative z-20 shadow-lg border-y border-gold-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($stats as $stat)
            <div class="flex flex-col items-center text-center p-4 bg-white rounded-2xl shadow hover:-translate-y-1 transition-transform group">
                <span class="text-3xl md:text-4xl font-extrabold text-navy mb-2">{{ $stat['number'] }}</span>
                <div class="flex flex-col">
                    <span class="font-bold text-sm text-gray-700 leading-tight mb-1">{{ $stat['title_hi'] }}</span>
                    <span class="text-[10px] uppercase font-bold tracking-widest text-gray-400">{{ $stat['title_en'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- MISSION SECTION -->
<div class="bg-offwhite py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-16 items-center">
            
            <!-- Left: Our Story -->
            <div class="w-full lg:w-3/5">
                <div class="flex flex-col mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-navy font-serif mb-1">हमारी कहानी</h2>
                    <span class="text-sm font-bold text-gold uppercase tracking-wider">Our Story</span>
                </div>
                
                <div class="space-y-6 text-gray-700">
                    <div class="flex flex-col">
                        <p class="font-medium text-lg text-navy mb-2">"हमने इस प्लेटफॉर्म की शुरुआत एक सरल सोच के साथ की थी: भारत में हर किसी के लिए कानूनी और अनुपालन सेवाओं को आसान, पारदर्शी और किफायती बनाना।"</p>
                        <p class="text-sm text-gray-500">"We started this platform with a simple vision: to make legal and compliance services easy, transparent, and affordable for everyone in India."</p>
                    </div>
                    
                    <div class="flex flex-col">
                        <p class="font-medium text-lg text-navy mb-2">व्यापार मालिकों और आम नागरिकों को अक्सर जटिल कानूनी प्रक्रियाओं और छिपे हुए शुल्कों का सामना करना पड़ता है। हमारा मिशन इस अंतर को पाटना है और विशेषज्ञ वकीलों को सीधे आप तक लाना है।</p>
                        <p class="text-sm text-gray-500">Business owners and common citizens often face complex legal procedures and hidden fees. Our mission is to bridge this gap and bring expert lawyers directly to you.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Founder -->
            <div class="w-full lg:w-2/5">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:-translate-y-1 transition-transform duration-300">
                    <div class="w-full h-80 bg-gray-200 flex flex-col items-center justify-center text-gray-400 relative">
                        <svg class="w-20 h-20 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <div class="flex flex-col items-center text-center">
                            <span class="text-xs font-bold leading-tight mb-0.5">संस्थापक की तस्वीर</span>
                            <span class="text-[9px] uppercase font-bold tracking-widest">Founder Photo</span>
                        </div>
                    </div>
                    <div class="p-6 text-center border-t-4 border-gold bg-navy text-white">
                        <div class="flex flex-col mb-1">
                            <span class="text-xl font-bold font-serif">{{ $team[0]['name_hi'] }}</span>
                            <span class="text-xs text-gold">{{ $team[0]['name_en'] }}</span>
                        </div>
                        <div class="flex flex-col mt-2">
                            <span class="text-sm font-semibold text-gray-300">{{ $team[0]['role_hi'] }}</span>
                            <span class="text-[10px] uppercase tracking-wider text-gray-500">{{ $team[0]['role_en'] }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- KEY MILESTONES -->
<div class="bg-navy py-20 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-white mb-2 font-serif">हमारी यात्रा</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider">Our Journey (Milestones)</p>
        </div>

        <div class="relative">
            <!-- Horizontal Line -->
            <div class="absolute top-1/2 left-0 right-0 h-1 bg-navy-600 -translate-y-1/2 hidden md:block"></div>
            
            <div class="flex flex-col md:flex-row justify-between items-center gap-8 md:gap-4 relative z-10 overflow-x-auto pb-8 md:pb-0 scrollbar-hide">
                @foreach($milestones as $milestone)
                <div class="flex flex-col items-center text-center group hover:-translate-y-1 transition-transform min-w-[150px]">
                    <div class="bg-gold text-navy font-black text-xl px-4 py-2 rounded-xl mb-4 shadow-lg border-2 border-white group-hover:scale-110 transition-transform">
                        {{ $milestone['year'] }}
                    </div>
                    <div class="flex flex-col bg-navy-800 p-4 rounded-xl border border-navy-600 w-full">
                        <span class="font-bold text-sm text-white mb-1">{{ $milestone['title_hi'] }}</span>
                        <span class="text-[10px] uppercase tracking-widest text-gold">{{ $milestone['title_en'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- TEAM SECTION -->
<div class="bg-white py-20 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 flex flex-col items-center">
            <h2 class="text-3xl font-bold text-navy mb-2 font-serif">हमारी नेतृत्व टीम</h2>
            <p class="text-sm font-bold text-gold uppercase tracking-wider">Our Leadership Team</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($team as $member)
            <div class="bg-offwhite rounded-2xl overflow-hidden shadow-sm border border-gray-200 hover:-translate-y-1 transition-transform duration-300 group">
                <div class="w-full h-64 bg-gray-200 flex flex-col items-center justify-center text-gray-400 group-hover:bg-gray-300 transition-colors">
                    <svg class="w-16 h-16 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <div class="flex flex-col items-center text-center">
                        <span class="text-[11px] font-bold leading-tight mb-0.5">तस्वीर</span>
                        <span class="text-[9px] uppercase font-bold tracking-widest">Photo</span>
                    </div>
                </div>
                <div class="p-6 text-center relative">
                    <a href="{{ $member['linkedin'] ?? 'https://www.linkedin.com/company/foundida' }}" target="_blank" rel="noopener noreferrer" class="absolute -top-5 right-6 w-10 h-10 bg-[#0077b5] text-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <div class="flex flex-col mb-2">
                        <span class="text-xl font-bold text-navy mb-0.5">{{ $member['name_hi'] }}</span>
                        <span class="text-[11px] uppercase tracking-widest font-semibold text-gray-500">{{ $member['name_en'] }}</span>
                    </div>
                    <div class="flex flex-col mt-3 pt-3 border-t border-gray-200">
                        <span class="text-sm font-semibold text-gold mb-0.5">{{ $member['role_hi'] }}</span>
                        <span class="text-[9px] uppercase tracking-wider text-gray-400">{{ $member['role_en'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- MEDIA COVERAGE -->
<div class="bg-offwhite py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 flex flex-col items-center">
            <h2 class="text-2xl font-bold text-navy mb-1 font-serif">जैसा देखा गया</h2>
            <p class="text-xs font-bold text-gold uppercase tracking-wider">As Seen In (Media Coverage)</p>
        </div>

        <div class="flex flex-wrap justify-center gap-6 md:gap-10 opacity-70 grayscale hover:grayscale-0 transition-all duration-500">
            @foreach($media as $m)
            <div class="flex flex-col items-center justify-center bg-white border border-gray-200 rounded-xl px-6 py-4 min-w-[160px] shadow-sm hover:border-gold hover:shadow-md transition-all hover:-translate-y-1">
                <span class="font-black text-navy text-lg leading-none">{{ $m['name_hi'] }}</span>
                <span class="text-[10px] uppercase font-bold text-gray-400 mt-1">{{ $m['name_en'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- CERTIFICATIONS -->
<div class="bg-navy py-16 border-t border-navy-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($certs as $cert)
            <div class="flex flex-col items-center text-center group">
                <div class="w-12 h-12 rounded-full bg-navy-800 border border-navy-600 flex items-center justify-center mb-3 group-hover:border-gold group-hover:bg-navy transition-all duration-300">
                    @if($cert['icon'] == 'badge-check')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    @elseif($cert['icon'] == 'scale')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path></svg>
                    @elseif($cert['icon'] == 'office-building')
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    @else
                        <svg class="w-6 h-6 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    @endif
                </div>
                <div class="flex flex-col">
                    <span class="text-white font-bold text-sm mb-0.5">{{ $cert['name_hi'] }}</span>
                    <span class="text-gray-400 text-[9px] uppercase tracking-widest">{{ $cert['name_en'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
