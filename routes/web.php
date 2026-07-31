<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

// ─── Payment / Checkout Routes ─────────────────────────────────────────────
Route::get('/checkout/{type}/{slug}', [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');
Route::post('/payment/create-order', [\App\Http\Controllers\PaymentController::class, 'createOrder'])->name('payment.create-order');
Route::post('/payment/verify', [\App\Http\Controllers\PaymentController::class, 'verify'])->name('payment.verify');
Route::get('/payment/success/{orderNumber}', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
Route::get('/payment/failed', [\App\Http\Controllers\PaymentController::class, 'failed'])->name('payment.failed');

Route::get('/vakeel-search', function () {
    $lawyers = collect([
        (object)[
            'name' => 'Aditya Sharma',
            'designation' => 'Senior Advocate',
            'city' => 'Varanasi',
            'experience' => 12,
            'specializations' => ['GST', 'Property', 'Company Law'],
            'languages' => ['हिंदी', 'English'],
            'rating' => 4.8,
            'reviews' => 156,
            'cases' => 240,
            'fee' => 399,
            'verified' => true,
            'image' => 'https://ui-avatars.com/api/?name=Aditya+Sharma&background=C9933A&color=fff&size=150'
        ],
        (object)[
            'name' => 'Priya Patel',
            'designation' => 'Advocate',
            'city' => 'Surat',
            'experience' => 5,
            'specializations' => ['Family', 'Consumer', 'Civil'],
            'languages' => ['हिंदी', 'English', 'Gujarati'],
            'rating' => 4.5,
            'reviews' => 84,
            'cases' => 110,
            'fee' => 299,
            'verified' => true,
            'image' => 'https://ui-avatars.com/api/?name=Priya+Patel&background=0A1628&color=fff&size=150'
        ],
        (object)[
            'name' => 'Rajesh Kumar',
            'designation' => 'Senior Advocate',
            'city' => 'Patna',
            'experience' => 15,
            'specializations' => ['Labour', 'Criminal', 'Property'],
            'languages' => ['हिंदी'],
            'rating' => 4.9,
            'reviews' => 320,
            'cases' => 500,
            'fee' => 499,
            'verified' => true,
            'image' => 'https://ui-avatars.com/api/?name=Rajesh+Kumar&background=C9933A&color=fff&size=150'
        ]
    ]);

    return view('pages.vakeel-search', compact('lawyers'));
});

Route::get('/lawyer-profile', function () {
    $lawyer = (object)[
        'name' => 'Aditya Sharma',
        'designation' => 'Senior Advocate',
        'court' => 'High Court of Allahabad',
        'city' => 'Varanasi',
        'experience' => 12,
        'languages' => ['हिंदी', 'English'],
        'rating' => 4.3,
        'reviews' => 89,
        'cases' => 240,
        'fee' => 399,
        'response_rate' => 98,
        'verified' => true,
        'image' => 'https://ui-avatars.com/api/?name=Aditya+Sharma&background=C9933A&color=fff&size=200',
        'about_hi' => 'मैं पिछले 12 वर्षों से उच्च न्यायालय और जिला अदालतों में कॉर्पोरेट और सिविल मामलों को संभाल रहा हूं। मेरी प्राथमिकता हमेशा अपने ग्राहकों को सर्वोत्तम और पारदर्शी कानूनी सलाह प्रदान करना है।',
        'about_en' => 'I have been handling corporate and civil cases across High Courts and District Courts for the last 12 years. My priority is always to provide the best and transparent legal advice to my clients.',
        'education' => [
            ['year' => '2012', 'degree' => 'LLM (Corporate Law)', 'inst' => 'National Law University, Delhi'],
            ['year' => '2010', 'degree' => 'LLB (Hons)', 'inst' => 'Banaras Hindu University']
        ],
        'expertise' => [
            ['name_hi' => 'जीएसटी और टैक्स', 'name_en' => 'GST & Tax', 'rate' => 95],
            ['name_hi' => 'संपत्ति विवाद', 'name_en' => 'Property Disputes', 'rate' => 88],
            ['name_hi' => 'कंपनी कानून', 'name_en' => 'Company Law', 'rate' => 92]
        ],
        'recent_reviews' => [
            ['name' => 'Ramesh Patel', 'city' => 'Surat', 'stars' => 5, 'text_hi' => 'बहुत ही स्पष्ट और सही सलाह मिली।', 'text_en' => 'Received very clear and correct advice.', 'date' => '12 Oct 2025'],
            ['name' => 'Neha Gupta', 'city' => 'Delhi', 'stars' => 4, 'text_hi' => 'अच्छा अनुभव रहा, लेकिन शुरू में जवाब देने में थोड़ा समय लगा।', 'text_en' => 'Good experience, but took a bit long to reply initially.', 'date' => '05 Nov 2025']
        ],
        'cases_won' => [
            ['title_hi' => 'जीएसटी ट्रिब्यूनल अपील', 'title_en' => 'GST Tribunal Appeals'],
            ['title_hi' => 'ट्रेडमार्क उल्लंघन मामले', 'title_en' => 'Trademark Infringement'],
            ['title_hi' => 'वाणिज्यिक पट्टा विवाद', 'title_en' => 'Commercial Lease Disputes']
        ]
    ];
    return view('pages.lawyer-profile', compact('lawyer'));
});

Route::get('/diy-documents', function () {
    $documents = [
        ['category' => 'Property', 'name_hi' => 'रेंट एग्रीमेंट', 'name_en' => 'Rent Agreement', 'pages' => 3, 'old_price' => 1500, 'new_price' => 99],
        ['category' => 'Business', 'name_hi' => 'साझेदारी डीड', 'name_en' => 'Partnership Deed', 'pages' => 5, 'old_price' => 3000, 'new_price' => 199],
        ['category' => 'Employment', 'name_hi' => 'रोजगार समझौता', 'name_en' => 'Employment Agreement', 'pages' => 4, 'old_price' => 2000, 'new_price' => 149],
        ['category' => 'Agreements', 'name_hi' => 'गैर-प्रकटीकरण समझौता', 'name_en' => 'NDA', 'pages' => 3, 'old_price' => 2000, 'new_price' => 99],
        ['category' => 'GST & Tax', 'name_hi' => 'जीएसटी उत्तर पत्र', 'name_en' => 'GST Reply Letter', 'pages' => 2, 'old_price' => 1500, 'new_price' => 99],
        ['category' => 'Personal', 'name_hi' => 'लीगल नोटिस', 'name_en' => 'Legal Notice', 'pages' => 3, 'old_price' => 2000, 'new_price' => 149],
        ['category' => 'Business', 'name_hi' => 'समझौता ज्ञापन', 'name_en' => 'Memorandum of Understanding', 'pages' => 4, 'old_price' => 2500, 'new_price' => 199],
        ['category' => 'Personal', 'name_hi' => 'पावर ऑफ अटॉर्नी', 'name_en' => 'Power of Attorney', 'pages' => 5, 'old_price' => 1500, 'new_price' => 149],
        ['category' => 'Personal', 'name_hi' => 'हलफनामा', 'name_en' => 'Affidavit', 'pages' => 2, 'old_price' => 1000, 'new_price' => 49],
        ['category' => 'Personal', 'name_hi' => 'वसीयतनामा', 'name_en' => 'Will / Vasiyatnama', 'pages' => 4, 'old_price' => 3000, 'new_price' => 199],
        ['category' => 'Property', 'name_hi' => 'बिक्री समझौता', 'name_en' => 'Sale Agreement', 'pages' => 6, 'old_price' => 4000, 'new_price' => 299],
        ['category' => 'Agreements', 'name_hi' => 'ऋण समझौता', 'name_en' => 'Loan Agreement', 'pages' => 3, 'old_price' => 2000, 'new_price' => 149],
        ['category' => 'Employment', 'name_hi' => 'फ्रीलांसर अनुबंध', 'name_en' => 'Freelancer Contract', 'pages' => 3, 'old_price' => 1500, 'new_price' => 99],
        ['category' => 'Business', 'name_hi' => 'शॉप एक्ट लाइसेंस आवेदन', 'name_en' => 'Shop Act License Application', 'pages' => 2, 'old_price' => 1000, 'new_price' => 99],
    ];
    return view('pages.diy-documents', compact('documents'));
});

Route::get('/pricing', function () {
    $packages = \App\Models\Package::where('is_active', true)->orderBy('sort_order')->get();

    $comparisons = [
        ['service_hi' => 'जीएसटी नोटिस उत्तर', 'service_en' => 'GST Notice Reply', 'market' => 5000, 'our' => 499],
        ['service_hi' => 'ट्रेडमार्क पंजीकरण', 'service_en' => 'Trademark Filing', 'market' => 15000, 'our' => 2999],
        ['service_hi' => 'रेंट एग्रीमेंट ड्राफ्टिंग', 'service_en' => 'Rent Agreement Drafting', 'market' => 2500, 'our' => 299],
        ['service_hi' => 'कंपनी पंजीकरण (प्राइवेट लिमिटेड)', 'service_en' => 'Company Registration (Pvt Ltd)', 'market' => 20000, 'our' => 4999],
        ['service_hi' => 'साझेदारी डीड', 'service_en' => 'Partnership Deed', 'market' => 5000, 'our' => 999],
    ];
    
    $faqs = [
        [
            'q_hi' => 'क्या कोई छिपे हुए शुल्क हैं?', 
            'q_en' => 'Are there any hidden charges?', 
            'a_hi' => 'नहीं, हमारी कीमतें पूरी तरह से पारदर्शी हैं। जो कीमत आप वेबसाइट पर देखते हैं, वही अंतिम कीमत है (जीएसटी को छोड़कर जो भुगतान पृष्ठ पर स्पष्ट रूप से दिखाया जाता है)।',
            'a_en' => 'No, our pricing is completely transparent. The price you see on the website is the final price (excluding GST which is clearly shown on the payment page).'
        ],
        [
            'q_hi' => 'पैसे वापस करने की नीति क्या है?', 
            'q_en' => 'What is the refund policy?', 
            'a_hi' => 'यदि हम समय सीमा के भीतर सेवा प्रदान करने में विफल रहते हैं, तो हम 100% रिफंड की गारंटी देते हैं। यदि आप कानूनी सलाह से असंतुष्ट हैं, तो हम बिना किसी अतिरिक्त लागत के एक अलग वकील प्रदान करेंगे।',
            'a_en' => 'We guarantee a 100% refund if we fail to deliver the service within the timeline. If you are unsatisfied with the legal advice, we will assign a different lawyer at no extra cost.'
        ],
        [
            'q_hi' => 'क्या मैं बाद में अपना प्लान अपग्रेड कर सकता हूँ?', 
            'q_en' => 'Can I upgrade my plan later?', 
            'a_hi' => 'हाँ, आप कभी भी बेस प्लान से प्रीमियम प्लान में अपग्रेड कर सकते हैं। आपको केवल कीमतों के बीच का अंतर चुकाना होगा।',
            'a_en' => 'Yes, you can upgrade from a Basic plan to a Premium plan at any time. You will only need to pay the difference in pricing.'
        ],
        [
            'q_hi' => 'डिलीवरी का समय क्या है?', 
            'q_en' => 'What is the delivery time?', 
            'a_hi' => 'ज़्यादातर दस्तावेज़ 24-48 घंटों के भीतर डिलीवर कर दिए जाते हैं। प्रीमियम प्लान के लिए, हम 12 घंटे की एक्सप्रेस डिलीवरी प्रदान करते हैं।',
            'a_en' => 'Most documents are delivered within 24-48 hours. For premium plans, we offer 12-hour express delivery.'
        ],
    ];
    
    return view('pages.pricing', compact('packages', 'comparisons', 'faqs'));
});

Route::redirect('/services/gst', '/services/gst-services', 301);
Route::redirect('/services/trademark', '/services/trademark-ip', 301);

Route::get('/about', function () {
    $milestones = [
        ['year' => '2020', 'title_hi' => 'स्थापित', 'title_en' => 'Founded'],
        ['year' => '2021', 'title_hi' => '10,000 ग्राहक', 'title_en' => '10,000 Clients'],
        ['year' => '2022', 'title_hi' => '10,000+ मामले', 'title_en' => '10,000+ Cases Resolved'],
        ['year' => '2023', 'title_hi' => '1 लाख+ ग्राहक', 'title_en' => '1L+ Clients'],
        ['year' => '2024', 'title_hi' => '100+ शहर', 'title_en' => '100+ Cities'],
        ['year' => '2025', 'title_hi' => '10 लाख+ ग्राहक', 'title_en' => '10L+ Clients'],
    ];

    $stats = [
        ['number' => '10L+', 'title_hi' => 'ग्राहक', 'title_en' => 'Clients'],
        ['number' => '500+', 'title_hi' => 'विशेषज्ञ वकील', 'title_en' => 'Expert Lawyers'],
        ['number' => '100+', 'title_hi' => 'शहर', 'title_en' => 'Cities'],
        ['number' => '4.8★', 'title_hi' => 'रेटिंग', 'title_en' => 'Rating'],
    ];

    $team = [
        ['name_hi' => 'राजेश कुमार', 'name_en' => 'Rajesh Kumar', 'role_hi' => 'मुख्य कार्यकारी अधिकारी (CEO)', 'role_en' => 'Chief Executive Officer', 'linkedin' => 'https://www.linkedin.com/company/foundida'],
        ['name_hi' => 'प्रिया शर्मा', 'name_en' => 'Priya Sharma', 'role_hi' => 'मुख्य कानूनी अधिकारी (CLO)', 'role_en' => 'Chief Legal Officer', 'linkedin' => 'https://www.linkedin.com/company/foundida'],
        ['name_hi' => 'अमित सिंह', 'name_en' => 'Amit Singh', 'role_hi' => 'तकनीकी प्रमुख (CTO)', 'role_en' => 'Chief Technology Officer', 'linkedin' => 'https://www.linkedin.com/company/foundida'],
        ['name_hi' => 'नेहा गुप्ता', 'name_en' => 'Neha Gupta', 'role_hi' => 'ग्राहक सफलता प्रमुख', 'role_en' => 'Head of Customer Success', 'linkedin' => 'https://www.linkedin.com/company/foundida'],
    ];

    $media = [
        ['name_hi' => 'दैनिक भास्कर', 'name_en' => 'Dainik Bhaskar'],
        ['name_hi' => 'अमर उजाला', 'name_en' => 'Amar Ujala'],
        ['name_hi' => 'ज़ी बिज़नेस', 'name_en' => 'Zee Business'],
        ['name_hi' => 'इकोनॉमिक टाइम्स', 'name_en' => 'Economic Times'],
        ['name_hi' => 'एनडीटीवी प्रॉफिट', 'name_en' => 'NDTV Profit'],
    ];

    $certs = [
        ['name_hi' => 'स्टार्टअप इंडिया मान्यता', 'name_en' => 'Startup India Recognized', 'icon' => 'badge-check'],
        ['name_hi' => 'बार काउंसिल पार्टनर', 'name_en' => 'Bar Council Partner', 'icon' => 'scale'],
        ['name_hi' => 'एमसीए पंजीकृत', 'name_en' => 'MCA Registered', 'icon' => 'office-building'],
        ['name_hi' => 'एमएसएमई प्रमाणित', 'name_en' => 'MSME Certified', 'icon' => 'document-check'],
    ];

    return view('pages.about', compact('milestones', 'stats', 'team', 'media', 'certs'));
});

Route::get('/contact', function () {
    $faqs = [
        [
            'q_hi' => 'क्या आपके वकील Bar Council से verified हैं?',
            'q_en' => 'Are your lawyers verified by Bar Council?',
            'a_hi' => 'हाँ, हमारे प्लेटफ़ॉर्म पर मौजूद सभी वकील बार काउंसिल ऑफ इंडिया (BCI) द्वारा पूरी तरह से सत्यापित और पंजीकृत हैं। हम आपको जोड़ने से पहले उनके लाइसेंस की जांच करते हैं।',
            'a_en' => 'Yes, all lawyers on our platform are fully verified and registered with the Bar Council of India (BCI). We check their licenses before connecting them with you.'
        ],
        [
            'q_hi' => 'Consultation की fees कितनी है?',
            'q_en' => 'What is the consultation fee?',
            'a_hi' => 'हमारी शुरुआती फोन परामर्श फीस मात्र ₹499 से शुरू होती है। फीस मामले की जटिलता और वकील के अनुभव के आधार पर भिन्न हो सकती है।',
            'a_en' => 'Our initial phone consultation starts at just ₹499. The fee may vary depending on the complexity of the case and the experience of the lawyer.'
        ],
        [
            'q_hi' => 'Documents कितने समय में मिलते हैं?',
            'q_en' => 'How long does it take to get documents?',
            'a_hi' => 'ज़्यादातर दस्तावेज़ (जैसे रेंट एग्रीमेंट या एनडीए) केवल 5 मिनट में तैयार हो जाते हैं। जटिल कानूनी नोटिस या अनुबंधों में 24-48 घंटे का समय लग सकता है।',
            'a_en' => 'Most DIY documents (like Rent Agreements or NDAs) are ready in just 5 minutes. Complex legal notices or contracts may take 24-48 hours.'
        ],
        [
            'q_hi' => 'क्या Hindi में help मिलेगी?',
            'q_en' => 'Will I get help in Hindi?',
            'a_hi' => 'बिल्कुल! हमारी पूरी टीम और वकील हिंदी में बात करने में सहज हैं। आप बिना किसी परेशानी के अपनी मातृभाषा में कानूनी सलाह ले सकते हैं।',
            'a_en' => 'Absolutely! Our entire team and lawyers are comfortable speaking in Hindi. You can seek legal advice in your native language without any hassle.'
        ],
        [
            'q_hi' => 'Refund policy क्या है?',
            'q_en' => 'What is the refund policy?',
            'a_hi' => 'हम 100% संतुष्टि की गारंटी देते हैं। यदि सेवा शुरू नहीं हुई है या दस्तावेज़ गलत है, तो हम 24 घंटे के भीतर आपका पूरा पैसा वापस कर देंगे।',
            'a_en' => 'We offer a 100% satisfaction guarantee. If the service hasn\'t started or the document is incorrect, we will issue a full refund within 24 hours.'
        ],
        [
            'q_hi' => 'मेरे शहर में service available है?',
            'q_en' => 'Is service available in my city?',
            'a_hi' => 'हाँ, हमारी अधिकांश सेवाएँ (GST, ट्रेडमार्क, दस्तावेज़) पूरी तरह से ऑनलाइन हैं और पूरे भारत में उपलब्ध हैं। अदालत में पेशी के लिए, हम 100+ टियर-1 और टियर-2 शहरों को कवर करते हैं।',
            'a_en' => 'Yes, most of our services (GST, Trademark, Documents) are fully online and available across India. For court appearances, we cover 100+ Tier-1 and Tier-2 cities.'
        ],
    ];

    return view('pages.contact', compact('faqs'));
});

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

// Guest Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/send-otp', [AuthController::class, 'sendOtp'])->name('auth.send-otp');

    // Google Authentication redirect & callback
    Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('auth.google');
    Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback'])->name('auth.google.callback');

    // Password Reset Routes
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard/user', [UserController::class, 'dashboard'])->name('dashboard.user');
    Route::get('/dashboard/profile', [UserController::class, 'profile'])->name('dashboard.profile');
    Route::post('/dashboard/profile', [UserController::class, 'updateProfile'])->name('dashboard.profile.update');
    
    // User Funding Applications Tracker
    Route::get('/dashboard/funding-applications', [\App\Http\Controllers\FundingApplicationController::class, 'userApplications'])->name('dashboard.funding-applications');
});

// Funding Opportunities Marketplace Routes
Route::get('/funding-opportunities', [\App\Http\Controllers\FundingProgramController::class, 'index'])->name('funding.index');
Route::get('/funding-opportunities/{slug}', [\App\Http\Controllers\FundingProgramController::class, 'show'])->name('funding.show');
Route::post('/funding-opportunities/{id}/save', [\App\Http\Controllers\FundingProgramController::class, 'toggleSave'])->name('funding.save');
Route::post('/funding-opportunities/{id}/report', [\App\Http\Controllers\FundingProgramController::class, 'reportExpired'])->name('funding.report');

// Foundida Assisted Application & Checkout
Route::post('/funding-assisted/submit', [\App\Http\Controllers\FundingApplicationController::class, 'submitAssisted'])->name('funding.assisted.submit');
Route::get('/funding-assisted/checkout/{id}', [\App\Http\Controllers\FundingApplicationController::class, 'checkout'])->name('funding.checkout');
Route::post('/funding-assisted/process-payment/{id}', [\App\Http\Controllers\FundingApplicationController::class, 'processPayment'])->name('funding.process-payment');
Route::get('/funding-assisted/invoice/{id}', [\App\Http\Controllers\FundingApplicationController::class, 'invoice'])->name('funding.invoice');


// Static Policy Pages
Route::get('/privacy-policy', function () {
    return view('pages.privacy');
});
Route::get('/terms', function () {
    return view('pages.terms');
});
Route::get('/refund-policy', function () {
    return view('pages.refund');
});
Route::get('/disclaimer', function () {
    return view('pages.disclaimer');
});

Route::get('/dashboard/lawyer', function () {
    $stats = [
        ['title_hi' => 'कुल ग्राहक', 'title_en' => 'Total Clients', 'value' => '48', 'icon' => 'users'],
        ['title_hi' => 'इस महीने की कमाई', 'title_en' => 'This Month Earnings', 'value' => '₹12,400', 'icon' => 'currency-rupee'],
        ['title_hi' => 'लंबित परामर्श', 'title_en' => 'Pending Consultations', 'value' => '3', 'icon' => 'clock'],
        ['title_hi' => 'रेटिंग', 'title_en' => 'Rating', 'value' => '4.7★', 'icon' => 'star'],
    ];

    $schedule = [
        ['time' => '09:00 AM', 'client_hi' => 'अमित पटेल', 'client_en' => 'Amit Patel', 'service_hi' => 'व्यापार पंजीकरण', 'service_en' => 'Business Registration', 'type_hi' => 'वीडियो कॉल', 'type_en' => 'Video Call', 'action' => 'join'],
        ['time' => '11:30 AM', 'client_hi' => 'स्नेहा गुप्ता', 'client_en' => 'Sneha Gupta', 'service_hi' => 'जीएसटी नोटिस', 'service_en' => 'GST Notice', 'type_hi' => 'फ़ोन कॉल', 'type_en' => 'Phone Call', 'action' => 'join'],
        ['time' => '02:00 PM', 'client_hi' => 'रोहित वर्मा', 'client_en' => 'Rohit Verma', 'service_hi' => 'रेंट एग्रीमेंट', 'service_en' => 'Rent Agreement', 'type_hi' => 'कार्यालय', 'type_en' => 'In-person', 'action' => 'done'],
    ];

    $requests = [
        ['client_hi' => 'विकास सिंह', 'client_en' => 'Vikas Singh', 'issue_hi' => 'ट्रेडमार्क विरोध', 'issue_en' => 'Trademark Opposition', 'budget' => '₹5,000'],
        ['client_hi' => 'अंजली जैन', 'client_en' => 'Anjali Jain', 'issue_hi' => 'दुकान पंजीकरण', 'issue_en' => 'Shop Act Registration', 'budget' => '₹1,500'],
    ];

    $chartData = [
        'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        'gross' => [15000, 18000, 16500, 22000, 24000, 28000],
        'net' => [12750, 15300, 14025, 18700, 20400, 23800]
    ];

    $profile = [
        'completion' => 80,
        'steps' => [
            ['name_hi' => 'प्रोफ़ाइल फ़ोटो', 'name_en' => 'Photo', 'done' => true],
            ['name_hi' => 'परिचय', 'name_en' => 'Bio', 'done' => true],
            ['name_hi' => 'प्रमाण पत्र', 'name_en' => 'Certificates', 'done' => true],
            ['name_hi' => 'विशेषज्ञता', 'name_en' => 'Specializations', 'done' => true],
            ['name_hi' => 'बैंक विवरण', 'name_en' => 'Bank Details', 'done' => false],
        ]
    ];

    return view('dashboard.lawyer', compact('stats', 'schedule', 'requests', 'chartData', 'profile'));
});

Route::get('/admin/dashboard', function () {
    $kpis = [
        ['title_hi' => 'कुल उपयोगकर्ता', 'title_en' => 'Total Users', 'value' => '1,04,230', 'icon' => 'users'],
        ['title_hi' => 'कुल वकील', 'title_en' => 'Total Lawyers', 'value' => '5,420', 'icon' => 'academic-cap'],
        ['title_hi' => 'आज के ऑर्डर', 'title_en' => 'Today\'s Orders', 'value' => '342', 'icon' => 'shopping-cart'],
        ['title_hi' => 'मासिक राजस्व', 'title_en' => 'Monthly Revenue', 'value' => '₹45.2L', 'icon' => 'currency-rupee'],
        ['title_hi' => 'लंबित सत्यापन', 'title_en' => 'Pending Verifications', 'value' => '84', 'icon' => 'shield-check'],
        ['title_hi' => 'सपोर्ट टिकट', 'title_en' => 'Support Tickets', 'value' => '12', 'icon' => 'ticket'],
    ];

    $recentOrders = [
        ['id' => '#ORD-4021', 'user' => 'Rajesh Kumar', 'service' => 'GST Registration', 'amount' => '₹999', 'status' => 'Pending', 'date' => '19 Jun, 10:20 AM'],
        ['id' => '#ORD-4020', 'user' => 'Sneha Tech Pvt Ltd', 'service' => 'Company Registration', 'amount' => '₹6,999', 'status' => 'Processing', 'date' => '19 Jun, 09:45 AM'],
        ['id' => '#ORD-4019', 'user' => 'Amit Patel', 'service' => 'Trademark Filing', 'amount' => '₹2,999', 'status' => 'Completed', 'date' => '18 Jun, 04:30 PM'],
    ];

    $verifications = [
        ['name' => 'Adv. Priya Singh', 'city' => 'Pune', 'reg' => 'MAH/5432/2015', 'docs' => 3],
        ['name' => 'Adv. Rahul Sharma', 'city' => 'Jaipur', 'reg' => 'RAJ/124/2018', 'docs' => 4],
    ];

    $lineChart = [
        'labels' => ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        'data' => [2.1, 2.4, 2.8, 3.1, 3.5, 3.2, 3.8, 4.0, 4.2, 4.5, 4.1, 4.5] // In Lakhs
    ];

    $pieChart = [
        'labels' => ['GST', 'Company Reg', 'Trademark', 'Rent Agreement', 'Other'],
        'data' => [35, 25, 20, 15, 5]
    ];

    return view('admin.dashboard', compact('kpis', 'recentOrders', 'verifications', 'lineChart', 'pieChart'));
});

Route::get('/services', function () {
    $categories = \App\Models\ServiceCategory::with('services')->get();
    return view('pages.services.index', compact('categories'));
});

Route::get('/services/{category_slug}', function ($category_slug) {
    $category = \App\Models\ServiceCategory::with('services')->where('slug', $category_slug)->firstOrFail();
    
    // Check if we need to show a custom category page or just a generic category list.
    // Right now, all category pages will route to pages.services.category
    return view('pages.services.category', compact('category'));
});

Route::get('/services/{category_slug}/{service_slug}', function ($category_slug, $service_slug) {
    $category = \App\Models\ServiceCategory::where('slug', $category_slug)->firstOrFail();
    $service = \App\Models\Service::where('service_category_id', $category->id)->where('slug', $service_slug)->firstOrFail();
    
    return view('pages.service-generic', compact('category', 'service'));
})->name('service.generic');

// =========================================
// PACKAGES PAGE
// =========================================
Route::get('/packages', [\App\Http\Controllers\PackageController::class, 'index']);

// =========================================
// BLOG LISTING PAGE
// =========================================
Route::get('/blog', function () {
    $posts = \App\Models\Post::orderBy('created_at', 'desc')->get();
    return view('pages.blog', compact('posts'));
});

// =========================================
// INDIVIDUAL BLOG ARTICLE
// =========================================
Route::get('/blog/{slug}', function ($slug) {
    $post = \App\Models\Post::where('slug', $slug)->firstOrFail();

    $related = \App\Models\Post::where('slug', '!=', $slug)
        ->take(3)
        ->get()
        ->map(function ($p) {
            return [
                'slug' => $p->slug,
                'title_hi' => $p->title_hi,
                'read_time' => $p->read_time,
            ];
        })
        ->toArray();

    return view('pages.blog-single', compact('post', 'related'));
});

// Funding & Mentor Subscription
Route::get('/funding', [\App\Http\Controllers\SubscriptionController::class, 'showFundingPage']);
Route::post('/funding/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'store'])->name('funding.subscribe');

// Live Session Guide
Route::get('/live-session', function () {
    return view('pages.live-session');
});
Route::post('/live-session/book', [\App\Http\Controllers\LiveSessionBookingController::class, 'store'])->name('live-session.book');

// Submit Callback Request (Public)
Route::post('/callback-requests', [\App\Http\Controllers\CallbackRequestController::class, 'store'])->name('callback.store');
Route::post('/package-inquiries', [\App\Http\Controllers\PackageInquiryController::class, 'store'])->name('package-inquiries.store');

// =========================================
// SITEMAP ROUTE
// =========================================
Route::get('/sitemap.xml', function () {
    $baseUrl = url('/');
    $xml = '<?xml version="1.0" encoding="UTF-8"?>';
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

    // Static Pages
    $pages = [
        '/', '/about', '/contact', '/pricing', '/packages', '/diy-documents', '/vakeel-search'
    ];
    foreach ($pages as $page) {
        $xml .= '<url><loc>' . $baseUrl . $page . '</loc><changefreq>weekly</changefreq><priority>' . ($page === '/' ? '1.0' : '0.8') . '</priority></url>';
    }

    // Dynamic Services Categories
    try {
        $categories = \App\Models\ServiceCategory::all();
        foreach ($categories as $cat) {
            $xml .= '<url><loc>' . $baseUrl . '/services/' . $cat->slug . '</loc><changefreq>weekly</changefreq><priority>0.9</priority></url>';
        }
        
        $services = \App\Models\Service::with('category')->get();
        foreach ($services as $svc) {
            if ($svc->category) {
                $xml .= '<url><loc>' . $baseUrl . '/services/' . $svc->category->slug . '/' . $svc->slug . '</loc><changefreq>monthly</changefreq><priority>0.8</priority></url>';
            }
        }
        
        $posts = \App\Models\Post::all();
        foreach ($posts as $post) {
            $xml .= '<url><loc>' . $baseUrl . '/blog/' . $post->slug . '</loc><changefreq>monthly</changefreq><priority>0.7</priority></url>';
        }
    } catch (\Exception $e) {
        // Fallback if DB fails during early setup
    }

    $xml .= '</urlset>';
    return response($xml, 200)->header('Content-Type', 'text/xml');
});

// =========================================
// ADMIN PANEL ROUTES
// =========================================
Route::prefix('admin')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\AdminAuthController::class, 'showLogin'])->name('admin.login');
        Route::post('/login', [\App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login.submit');
        Route::get('/register', [\App\Http\Controllers\AdminAuthController::class, 'showRegister'])->name('admin.register');
        Route::post('/register', [\App\Http\Controllers\AdminAuthController::class, 'register'])->name('admin.register.submit');
    });

    // Authenticated Logout Route
    Route::post('/logout', [\App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

    // Protected Admin Routes
    Route::middleware('admin')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/dashboard');
        });

        Route::get('/dashboard', function () {
            $totalUsers = \App\Models\User::count();
            $totalCallbacks = \App\Models\CallbackRequest::count();
            $totalPackageInquiries = \App\Models\PackageInquiry::count();
            $totalLiveSessions = \App\Models\LiveSessionBooking::count();
            $totalSubscriptions = \App\Models\Subscription::count();
            $totalPackages = \App\Models\Package::where('is_active', true)->count();

            $kpis = [
                ['title_hi' => 'कुल उपयोगकर्ता', 'title_en' => 'Total Users', 'value' => number_format($totalUsers), 'icon' => 'users'],
                ['title_hi' => 'कॉलबैक अनुरोध', 'title_en' => 'Callback Requests', 'value' => number_format($totalCallbacks), 'icon' => 'phone'],
                ['title_hi' => 'पैकेज पूछताछ', 'title_en' => 'Package Inquiries', 'value' => number_format($totalPackageInquiries), 'icon' => 'box'],
                ['title_hi' => 'लाइव सेशंस', 'title_en' => 'Live Sessions', 'value' => number_format($totalLiveSessions), 'icon' => 'headset'],
                ['title_hi' => 'फंडिंग प्लान्स', 'title_en' => 'Funding Plans', 'value' => number_format($totalSubscriptions), 'icon' => 'rocket'],
                ['title_hi' => 'सक्रिय पैकेज', 'title_en' => 'Active Packages', 'value' => number_format($totalPackages), 'icon' => 'check-circle'],
            ];

            $recentCallbacks = \App\Models\CallbackRequest::orderBy('created_at', 'desc')->take(5)->get();
            $recentPackageInquiries = \App\Models\PackageInquiry::orderBy('created_at', 'desc')->take(5)->get();

            return view('admin.dashboard', compact('kpis', 'recentCallbacks', 'recentPackageInquiries'));
        })->name('admin.dashboard');

        Route::get('/users', function () {
            $users = \App\Models\User::orderBy('created_at', 'desc')->paginate(15);
            return view('admin.users', compact('users'));
        });

        Route::resource('services', \App\Http\Controllers\AdminServiceController::class)->names([
            'index' => 'admin.services.index',
            'create' => 'admin.services.create',
            'store' => 'admin.services.store',
            'edit' => 'admin.services.edit',
            'update' => 'admin.services.update',
            'destroy' => 'admin.services.destroy',
        ]);

        Route::get('/funding', [\App\Http\Controllers\SubscriptionController::class, 'index'])->name('admin.funding.index');
        Route::patch('/funding/{id}/status', [\App\Http\Controllers\SubscriptionController::class, 'updateStatus'])->name('admin.funding.updateStatus');
        Route::delete('/funding/{id}', [\App\Http\Controllers\SubscriptionController::class, 'destroy'])->name('admin.funding.destroy');

        Route::resource('subscription-plans', \App\Http\Controllers\AdminSubscriptionPlanController::class)->except(['show'])->names([
            'index' => 'admin.subscription_plans.index',
            'create' => 'admin.subscription_plans.create',
            'store' => 'admin.subscription_plans.store',
            'edit' => 'admin.subscription_plans.edit',
            'update' => 'admin.subscription_plans.update',
            'destroy' => 'admin.subscription_plans.destroy',
        ]);

        Route::resource('packages', \App\Http\Controllers\AdminPackageController::class)->except(['show'])->names([
            'index' => 'admin.packages.index',
            'create' => 'admin.packages.create',
            'store' => 'admin.packages.store',
            'edit' => 'admin.packages.edit',
            'update' => 'admin.packages.update',
            'destroy' => 'admin.packages.destroy',
        ]);

        Route::get('/settings', [\App\Http\Controllers\AdminSettingsController::class, 'index'])->name('admin.settings');
        Route::put('/settings/general', [\App\Http\Controllers\AdminSettingsController::class, 'updateGeneral'])->name('admin.settings.general');
        Route::put('/settings/profile', [\App\Http\Controllers\AdminSettingsController::class, 'updateProfile'])->name('admin.profile.update');
        Route::put('/settings/password', [\App\Http\Controllers\AdminSettingsController::class, 'updatePassword'])->name('admin.password.update');
        Route::put('/settings/gateways', [\App\Http\Controllers\AdminSettingsController::class, 'updateGateways'])->name('admin.settings.gateways');
        Route::put('/settings/emails', [\App\Http\Controllers\AdminSettingsController::class, 'updateEmails'])->name('admin.settings.emails');

        // Admin Callback / Lead Routes
        Route::get('/callbacks', [\App\Http\Controllers\CallbackRequestController::class, 'index'])->name('admin.callbacks.index');
        Route::patch('/callbacks/{id}/status', [\App\Http\Controllers\CallbackRequestController::class, 'updateStatus'])->name('admin.callbacks.updateStatus');
        Route::delete('/callbacks/{id}', [\App\Http\Controllers\CallbackRequestController::class, 'destroy'])->name('admin.callbacks.destroy');

        // Admin Package Inquiries Routes
        Route::get('/package-inquiries', [\App\Http\Controllers\PackageInquiryController::class, 'index'])->name('admin.package-inquiries.index');
        Route::patch('/package-inquiries/{id}/status', [\App\Http\Controllers\PackageInquiryController::class, 'updateStatus'])->name('admin.package-inquiries.updateStatus');
        Route::delete('/package-inquiries/{id}', [\App\Http\Controllers\PackageInquiryController::class, 'destroy'])->name('admin.package-inquiries.destroy');

        // Admin Live Session Bookings Routes
        Route::get('/live-sessions', [\App\Http\Controllers\LiveSessionBookingController::class, 'index'])->name('admin.live-sessions.index');
        Route::patch('/live-sessions/{id}/status', [\App\Http\Controllers\LiveSessionBookingController::class, 'updateStatus'])->name('admin.live-sessions.updateStatus');
        Route::delete('/live-sessions/{id}', [\App\Http\Controllers\LiveSessionBookingController::class, 'destroy'])->name('admin.live-sessions.destroy');

        // Admin Blogs CRUD
        Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->names('admin.blogs');

        // Admin Funding Programs Directory Management
        Route::resource('funding-programs', \App\Http\Controllers\AdminFundingProgramController::class)->names([
            'index' => 'admin.funding-programs.index',
            'create' => 'admin.funding-programs.create',
            'store' => 'admin.funding-programs.store',
            'edit' => 'admin.funding-programs.edit',
            'update' => 'admin.funding-programs.update',
            'destroy' => 'admin.funding-programs.destroy',
        ]);
        Route::post('/funding-programs/{id}/duplicate', [\App\Http\Controllers\AdminFundingProgramController::class, 'duplicate'])->name('admin.funding-programs.duplicate');

        // Admin Paid Application Management
        Route::get('/funding-applications', [\App\Http\Controllers\AdminFundingApplicationController::class, 'index'])->name('admin.funding-applications.index');
        Route::get('/funding-applications/{id}', [\App\Http\Controllers\AdminFundingApplicationController::class, 'show'])->name('admin.funding-applications.show');
        Route::post('/funding-applications/{id}/status', [\App\Http\Controllers\AdminFundingApplicationController::class, 'updateStatus'])->name('admin.funding-applications.updateStatus');
        Route::post('/funding-applications/{id}/message', [\App\Http\Controllers\AdminFundingApplicationController::class, 'addMessage'])->name('admin.funding-applications.message');
        Route::post('/funding-applications/{id}/upload', [\App\Http\Controllers\AdminFundingApplicationController::class, 'uploadDocument'])->name('admin.funding-applications.upload');

        // Admin Payments
        Route::get('/payments', [\App\Http\Controllers\AdminPaymentController::class, 'index'])->name('admin.payments.index');
    });
});