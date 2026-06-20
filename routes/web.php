<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});

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
    
    return view('pages.pricing', compact('comparisons', 'faqs'));
});

Route::get('/services/gst', function () {
    $services = [
        ['name_hi' => 'जीएसटी पंजीकरण', 'name_en' => 'GST Registration', 'price' => '999', 'period' => '', 'included_hi' => '3 दिन में पूरा, मुफ्त परामर्श, दस्तावेज़ सत्यापन', 'included_en' => 'Done in 3 days, Free Consultation, Document Verification'],
        ['name_hi' => 'जीएसटी रिटर्न फाइलिंग', 'name_en' => 'GST Return Filing', 'price' => '499', 'period' => '/ month', 'included_hi' => 'मासिक फाइलिंग, त्रुटि मुक्त, लेट फीस से बचाव', 'included_en' => 'Monthly filing, Error-free, Avoid late fees'],
        ['name_hi' => 'जीएसटी नोटिस उत्तर', 'name_en' => 'GST Notice Reply', 'price' => '499', 'period' => '', 'included_hi' => 'विशेषज्ञ विश्लेषण, सटीक उत्तर, 24 घंटे में ड्राफ्ट', 'included_en' => 'Expert Analysis, Precise Reply, Draft in 24hr'],
        ['name_hi' => 'जीएसटी वार्षिक रिटर्न', 'name_en' => 'GST Annual Return', 'price' => '1,499', 'period' => '', 'included_hi' => 'पूर्ण ऑडिट, GSTR-9 फाइलिंग, सीए द्वारा समीक्षा', 'included_en' => 'Full Audit, GSTR-9 Filing, CA Reviewed'],
        ['name_hi' => 'जीएसटी रद्दीकरण', 'name_en' => 'GST Cancellation', 'price' => '799', 'period' => '', 'included_hi' => 'नियमों का अनुपालन, कोई लंबित देय नहीं, तेज़ प्रक्रिया', 'included_en' => 'Regulatory Compliance, No pending dues, Fast process'],
        ['name_hi' => 'जीएसटी रिफंड क्लेम', 'name_en' => 'GST Refund Claim', 'price' => '1,499', 'period' => '', 'included_hi' => 'अधिकतम रिफंड, 100% अनुपालन, दस्तावेज़ अपलोड', 'included_en' => 'Maximum Refund, 100% Compliance, Document Upload'],
    ];

    $faqs = [
        [
            'q_hi' => 'जीएसटी नोटिस क्या होता है?', 
            'q_en' => 'What is a GST notice?', 
            'a_hi' => 'जीएसटी नोटिस कर विभाग द्वारा भेजा गया एक संचार है, जब उन्हें आपके रिटर्न, भुगतानों या डेटा में कोई विसंगति मिलती है। इसका समय पर उत्तर देना अनिवार्य है।',
            'a_en' => 'A GST notice is a communication sent by the tax department when they find discrepancies in your returns, payments, or data. It is mandatory to reply on time.'
        ],
        [
            'q_hi' => 'नोटिस का रिप्लाई कब तक देना होता है?', 
            'q_en' => 'By when do I need to reply to the notice?', 
            'a_hi' => 'आमतौर पर, जीएसटी नोटिस का जवाब देने के लिए 15 से 30 दिन का समय दिया जाता है (नोटिस के प्रकार पर निर्भर करता है)। देरी होने पर जुर्माना लग सकता है।',
            'a_en' => 'Usually, you get 15 to 30 days to reply to a GST notice (depending on the type of notice). Delay can lead to penalties.'
        ],
        [
            'q_hi' => 'क्या मैं खुद रिप्लाई कर सकता हूँ?', 
            'q_en' => 'Can I reply to it myself?', 
            'a_hi' => 'हाँ, आप खुद कर सकते हैं, लेकिन जीएसटी कानून जटिल हैं। गलत उत्तर से आपको भारी जुर्माना लग सकता है, इसलिए कर विशेषज्ञ (Tax Expert) से जवाब ड्राफ्ट करवाना सुरक्षित है।',
            'a_en' => 'Yes, you can, but GST laws are complex. An incorrect reply can attract heavy penalties, so it is safer to get it drafted by a Tax Expert.'
        ],
    ];

    return view('pages.services.gst', compact('services', 'faqs'));
});

Route::get('/services/business-registration', function () {
    $types = [
        ['icon' => 'office-building', 'name_hi' => 'प्राइवेट लिमिटेड कंपनी', 'name_en' => 'Private Limited Company', 'price' => '6,999', 'best_for_hi' => 'स्टार्टअप्स और निवेशकों को आकर्षित करने के लिए', 'best_for_en' => 'Startups seeking funding & trust'],
        ['icon' => 'user', 'name_hi' => 'वन पर्सन कंपनी', 'name_en' => 'One Person Company (OPC)', 'price' => '4,999', 'best_for_hi' => 'अकेले संस्थापकों के लिए प्राइवेट लिमिटेड के लाभ', 'best_for_en' => 'Solo founders wanting corporate status'],
        ['icon' => 'users', 'name_hi' => 'सीमित देयता भागीदारी', 'name_en' => 'LLP', 'price' => '3,999', 'best_for_hi' => 'कम अनुपालन के साथ पेशेवर और साझेदार', 'best_for_en' => 'Professionals wanting low compliance'],
        ['icon' => 'user-circle', 'name_hi' => 'एकल स्वामित्व', 'name_en' => 'Sole Proprietorship', 'price' => '1,499', 'best_for_hi' => 'छोटे व्यवसायों और फ्रीलांसरों के लिए', 'best_for_en' => 'Small local businesses & freelancers'],
        ['icon' => 'heart', 'name_hi' => 'धारा 8 (एनजीओ)', 'name_en' => 'Section 8 (NGO)', 'price' => '7,999', 'best_for_hi' => 'गैर-लाभकारी सामाजिक कार्यों के लिए', 'best_for_en' => 'Non-profit social work'],
        ['icon' => 'user-group', 'name_hi' => 'साझेदारी फर्म', 'name_en' => 'Partnership Firm', 'price' => '2,499', 'best_for_hi' => 'मित्रों या परिवार के साथ व्यापार करने के लिए', 'best_for_en' => 'Simple business with friends/family'],
    ];

    $comparisons = [
        ['type_hi' => 'प्राइवेट लिमिटेड', 'type_en' => 'Pvt Ltd', 'members' => '2', 'liability' => 'Limited', 'liability_color' => 'green', 'tax' => '30% (Standard)', 'tax_color' => 'neutral', 'best_for_hi' => 'स्टार्टअप्स', 'best_for_en' => 'Startups', 'cost' => '₹6,999', 'cost_color' => 'red'],
        ['type_hi' => 'एलएलपी', 'type_en' => 'LLP', 'members' => '2', 'liability' => 'Limited', 'liability_color' => 'green', 'tax' => '30%', 'tax_color' => 'neutral', 'best_for_hi' => 'पेशेवर', 'best_for_en' => 'Professionals', 'cost' => '₹3,999', 'cost_color' => 'neutral'],
        ['type_hi' => 'एकल स्वामित्व', 'type_en' => 'Proprietorship', 'members' => '1', 'liability' => 'Unlimited', 'liability_color' => 'red', 'tax' => 'Slab Rate', 'tax_color' => 'green', 'best_for_hi' => 'छोटे व्यवसाय', 'best_for_en' => 'Small Business', 'cost' => '₹1,499', 'cost_color' => 'green'],
    ];

    return view('pages.services.business-registration', compact('types', 'comparisons'));
});

Route::get('/services/trademark', function () {
    $packages = [
        ['name_hi' => 'ट्रेडमार्क खोज', 'name_en' => 'Trademark Search', 'price' => 'मुफ़्त', 'price_text_en' => 'FREE', 'features_hi' => ['नाम की उपलब्धता की जाँच', 'क्लास चयन में मदद', 'त्वरित रिपोर्ट'], 'features_en' => ['Name Availability Check', 'Class Selection Help', 'Instant Report']],
        ['name_hi' => 'ट्रेडमार्क फाइलिंग', 'name_en' => 'Trademark Filing', 'price' => '₹2,999', 'price_text' => '(1 वर्ग)', 'price_text_en' => '(1 Class)', 'features_hi' => ['दस्तावेज़ की तैयारी', 'टीएम-ए फाइलिंग', 'आवेदन की ट्रैकिंग'], 'features_en' => ['Document Preparation', 'TM-A Filing', 'Application Tracking'], 'highlight' => true],
        ['name_hi' => 'फाइलिंग + रक्षा', 'name_en' => 'Filing + Opposition Defense', 'price' => '₹5,999', 'price_text' => '(संपूर्ण सुरक्षा)', 'price_text_en' => '(Complete Security)', 'features_hi' => ['आपत्ति का जवाब', 'सुनवाई में प्रतिनिधित्व', 'असीमित परामर्श'], 'features_en' => ['Reply to Objections', 'Hearing Representation', 'Unlimited Consultation']],
    ];

    $classes = [
        ['id' => 35, 'title_hi' => 'क्लास 35 (व्यापार)', 'title_en' => 'Class 35 (Business)', 'desc_hi' => 'विज्ञापन, व्यवसाय प्रबंधन, कार्यालय कार्य, ई-कॉमर्स', 'desc_en' => 'Advertising, business management, office functions, e-commerce', 'popular' => true],
        ['id' => 42, 'title_hi' => 'क्लास 42 (तकनीक)', 'title_en' => 'Class 42 (Tech)', 'desc_hi' => 'सॉफ्टवेयर सेवाएं, वैज्ञानिक और तकनीकी सेवाएं', 'desc_en' => 'Software services, scientific and technological services', 'popular' => true],
        ['id' => 25, 'title_hi' => 'क्लास 25 (कपड़े)', 'title_en' => 'Class 25 (Clothing)', 'desc_hi' => 'कपड़े, जूते, सिर के परिधान', 'desc_en' => 'Clothing, footwear, headgear', 'popular' => true],
        ['id' => 43, 'title_hi' => 'क्लास 43 (रेस्तरां)', 'title_en' => 'Class 43 (Restaurant)', 'desc_hi' => 'भोजन और पेय प्रदान करने के लिए सेवाएं', 'desc_en' => 'Services for providing food and drink', 'popular' => true],
        ['id' => 5, 'title_hi' => 'क्लास 5 (फार्मा)', 'title_en' => 'Class 5 (Pharma)', 'desc_hi' => 'दवाएं, आहार संबंधी पूरक', 'desc_en' => 'Pharmaceuticals, dietary supplements', 'popular' => false],
        ['id' => 9, 'title_hi' => 'क्लास 9 (इलेक्ट्रॉनिक्स)', 'title_en' => 'Class 9 (Electronics)', 'desc_hi' => 'कंप्यूटर हार्डवेयर, मोबाइल ऐप्स', 'desc_en' => 'Computer hardware, mobile apps', 'popular' => false],
    ];

    $timeline = [
        ['step_hi' => 'आवेदन फाइलिंग', 'step_en' => 'Application Filing', 'time_hi' => '1-3 दिन', 'time_en' => '1-3 Days'],
        ['step_hi' => 'वियना वर्गीकरण', 'step_en' => 'Vienna Codification', 'time_hi' => '1 महीना', 'time_en' => '1 Month'],
        ['step_hi' => 'औपचारिक जांच', 'step_en' => 'Formality Check', 'time_hi' => '1-2 महीने', 'time_en' => '1-2 Months'],
        ['step_hi' => 'परीक्षा रिपोर्ट', 'step_en' => 'Examination Report', 'time_hi' => '2-4 महीने', 'time_en' => '2-4 Months'],
        ['step_hi' => 'आपत्ति उत्तर', 'step_en' => 'Reply to Objection', 'time_hi' => '1 महीना (यदि हो)', 'time_en' => '1 Month (if any)'],
        ['step_hi' => 'सुनवाई', 'step_en' => 'Show Cause Hearing', 'time_hi' => '6-8 महीने', 'time_en' => '6-8 Months'],
        ['step_hi' => 'जर्नल प्रकाशन', 'step_en' => 'Journal Publication', 'time_hi' => '4 महीने', 'time_en' => '4 Months'],
        ['step_hi' => 'विरोध की प्रतीक्षा', 'step_en' => 'Opposition Wait', 'time_hi' => '4 महीने', 'time_en' => '4 Months'],
        ['step_hi' => 'प्रमाण पत्र', 'step_en' => 'Registration Certificate', 'time_hi' => '18-24 महीने', 'time_en' => '18-24 Months'],
    ];

    $benefits = [
        ['title_hi' => 'ब्रांड सुरक्षा', 'title_en' => 'Brand Protection', 'desc_hi' => 'नकल करने वालों से सुरक्षा', 'desc_en' => 'Protection from copycats', 'icon' => 'shield-check'],
        ['title_hi' => 'कानूनी अधिकार', 'title_en' => 'Legal Rights', 'desc_hi' => 'उल्लंघन करने वालों पर मुकदमा करने का अधिकार', 'desc_en' => 'Legal right to sue infringers', 'icon' => 'scale'],
        ['title_hi' => 'व्यापार मूल्यांकन', 'title_en' => 'Business Valuation', 'desc_hi' => 'संपत्ति मूल्य में वृद्धि', 'desc_en' => 'Boosts intangible asset value', 'icon' => 'trending-up'],
        ['title_hi' => 'ई-कॉमर्स के लिए आवश्यक', 'title_en' => 'E-Commerce Ready', 'desc_hi' => 'अमेज़ॅन/फ्लिपकार्ट ब्रांड रजिस्ट्री', 'desc_en' => 'Amazon/Flipkart brand registry', 'icon' => 'shopping-cart'],
    ];

    return view('pages.services.trademark', compact('packages', 'classes', 'timeline', 'benefits'));
});

Route::get('/about', function () {
    $milestones = [
        ['year' => '2020', 'title_hi' => 'स्थापित', 'title_en' => 'Founded'],
        ['year' => '2021', 'title_hi' => '10,000 ग्राहक', 'title_en' => '10,000 Clients'],
        ['year' => '2022', 'title_hi' => 'आईएसओ प्रमाणित', 'title_en' => 'ISO Certified'],
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
        ['name_hi' => 'आईएसओ 9001:2018', 'name_en' => 'ISO 9001:2018', 'icon' => 'badge-check'],
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

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard/user', function () {
    $stats = [
        ['title_hi' => 'सक्रिय मामले', 'title_en' => 'Active Cases', 'value' => '2', 'icon' => 'briefcase'],
        ['title_hi' => 'तैयार दस्तावेज़', 'title_en' => 'Documents Ready', 'value' => '5', 'icon' => 'document-text'],
        ['title_hi' => 'आगामी कॉल', 'title_en' => 'Upcoming Calls', 'value' => '1', 'icon' => 'phone'],
        ['title_hi' => 'बचत की गई राशि', 'title_en' => 'Amount Saved', 'value' => '₹12,400', 'icon' => 'currency-rupee'],
    ];

    $consultations = [
        ['lawyer_hi' => 'एडवोकेट रवि शर्मा', 'lawyer_en' => 'Adv. Ravi Sharma', 'service_hi' => 'जीएसटी नोटिस जवाब', 'service_en' => 'GST Notice Reply', 'date' => '24 Jun 2026', 'time' => '10:30 AM', 'status' => 'upcoming', 'status_hi' => 'आगामी', 'status_en' => 'Upcoming'],
        ['lawyer_hi' => 'एडवोकेट नेहा सिंह', 'lawyer_en' => 'Adv. Neha Singh', 'service_hi' => 'रेंट एग्रीमेंट समीक्षा', 'service_en' => 'Rent Agreement Review', 'date' => '20 Jun 2026', 'time' => '04:00 PM', 'status' => 'completed', 'status_hi' => 'पूरा हुआ', 'status_en' => 'Completed'],
        ['lawyer_hi' => 'सीए अमित पटेल', 'lawyer_en' => 'CA Amit Patel', 'service_hi' => 'व्यापार पंजीकरण', 'service_en' => 'Business Registration', 'date' => '18 Jun 2026', 'time' => '11:00 AM', 'status' => 'cancelled', 'status_hi' => 'रद्द', 'status_en' => 'Cancelled'],
    ];

    $documents = [
        ['name_hi' => 'किराया समझौता', 'name_en' => 'Rent Agreement', 'date' => '15 Jun 2026'],
        ['name_hi' => 'एनडीए (NDA)', 'name_en' => 'Non-Disclosure Agreement', 'date' => '10 Jun 2026'],
        ['name_hi' => 'साझेदारी विलेख', 'name_en' => 'Partnership Deed', 'date' => '05 Jun 2026'],
    ];

    $activities = [
        ['title_hi' => 'ऑर्डर दिया गया (ट्रेडमार्क)', 'title_en' => 'Order Placed (Trademark)', 'date' => 'Today, 09:30 AM', 'color' => 'gold'],
        ['title_hi' => 'दस्तावेज़ डाउनलोड किया गया', 'title_en' => 'Document Downloaded', 'date' => 'Yesterday, 04:15 PM', 'color' => 'blue'],
        ['title_hi' => 'परामर्श पूरा हुआ', 'title_en' => 'Consultation Completed', 'date' => '20 Jun, 04:30 PM', 'color' => 'green'],
        ['title_hi' => 'भुगतान सफल', 'title_en' => 'Payment Successful', 'date' => '19 Jun, 11:00 AM', 'color' => 'navy'],
    ];

    return view('dashboard.user', compact('stats', 'consultations', 'documents', 'activities'));
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
    $categories = config('services_data.categories');
    return view('pages.services.index', compact('categories'));
});

Route::get('/services/{category_slug}', function ($category_slug) {
    $categories = config('services_data.categories');
    $category = collect($categories)->firstWhere('slug', $category_slug);
    if (!$category) abort(404);
    
    // Check if we need to show a custom category page or just a generic category list.
    // Right now, all category pages will route to pages.services.category
    return view('pages.services.category', compact('category'));
});

Route::get('/services/{category_slug}/{service_slug}', function ($category_slug, $service_slug) {
    $categories = config('services_data.categories');
    
    $category = collect($categories)->firstWhere('slug', $category_slug);
    if (!$category) abort(404);
    
    $service = collect($category['services'])->firstWhere('slug', $service_slug);
    if (!$service) abort(404);
    
    return view('pages.service-generic', compact('category', 'service'));
})->name('service.generic');

// =========================================
// PACKAGES PAGE
// =========================================
Route::get('/packages', function () {
    return view('pages.packages');
});

// =========================================
// BLOG LISTING PAGE
// =========================================
Route::get('/blog', function () {
    $posts = [
        [
            'slug' => 'pvt-ltd-vs-llp-vs-opc',
            'title_hi' => 'Private Limited vs LLP vs OPC — 2026 में क्या सही है?',
            'title_en' => 'Private Limited vs LLP vs OPC Explained',
            'excerpt' => 'Registration cost, compliance burden, and fundraising potential compared for Indian startups in plain language.',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'author' => 'CA Amit Kumar',
            'author_initial' => 'A',
            'date' => 'Jun 15, 2026',
            'read_time' => '8 min',
        ],
        [
            'slug' => 'gst-registration-guide-2026',
            'title_hi' => 'GST Registration: किसे लेना ज़रूरी है? पूरी जानकारी',
            'title_en' => 'GST Registration: Who Needs It? Complete Guide',
            'excerpt' => 'Turnover limits, mandatory categories, and document checklist for GST registration in India.',
            'category' => 'gst',
            'category_label' => 'GST / TAX',
            'color' => 'yellow',
            'badge_class' => 'bg-gold/10 text-gold',
            'author' => 'CA Priya Verma',
            'author_initial' => 'P',
            'date' => 'Jun 10, 2026',
            'read_time' => '6 min',
        ],
        [
            'slug' => 'trademark-registration-india',
            'title_hi' => 'Trademark कैसे Register करें? Step-by-Step Guide 2026',
            'title_en' => 'How to Register a Trademark in India',
            'excerpt' => 'Complete process, fees, timelines, and TM classes explained. Protect your brand before someone else does.',
            'category' => 'trademark',
            'category_label' => 'TRADEMARK',
            'color' => 'purple',
            'badge_class' => 'bg-purple-50 text-purple-600',
            'author' => 'Adv. Sneha Patil',
            'author_initial' => 'S',
            'date' => 'Jun 5, 2026',
            'read_time' => '10 min',
        ],
        [
            'slug' => 'website-zaruri-hai-business-ke-liye',
            'title_hi' => 'बिज़नेस के लिए Website क्यों ज़रूरी है? (2026 Guide)',
            'title_en' => 'Why Every Business Needs a Website in 2026',
            'excerpt' => 'How a professional website acts as your 24/7 sales representative and builds credibility with customers.',
            'category' => 'tech',
            'category_label' => 'TECH',
            'color' => 'green',
            'badge_class' => 'bg-green-50 text-green-600',
            'author' => 'Rahul Verma',
            'author_initial' => 'R',
            'date' => 'May 28, 2026',
            'read_time' => '5 min',
        ],
        [
            'slug' => 'startup-india-registration-benefits',
            'title_hi' => 'Startup India में Register करने के 7 फायदे',
            'title_en' => '7 Benefits of Startup India Registration',
            'excerpt' => 'Tax exemptions, fast-track IP, fund access, and more. Every eligible startup should register under DPIIT.',
            'category' => 'startup',
            'category_label' => 'STARTUP',
            'color' => 'orange',
            'badge_class' => 'bg-orange-50 text-orange-600',
            'author' => 'CA Amit Kumar',
            'author_initial' => 'A',
            'date' => 'May 20, 2026',
            'read_time' => '7 min',
        ],
        [
            'slug' => 'annual-compliance-private-limited',
            'title_hi' => 'Private Limited Company की Annual Compliance क्या होती है?',
            'title_en' => 'Annual Compliance Checklist for Pvt Ltd Companies',
            'excerpt' => 'ROC filings, board meetings, audits, and ITR — a complete yearly compliance checklist to avoid penalties.',
            'category' => 'compliance',
            'category_label' => 'COMPLIANCE',
            'color' => 'red',
            'badge_class' => 'bg-red-50 text-red-600',
            'author' => 'CA Priya Verma',
            'author_initial' => 'P',
            'date' => 'May 12, 2026',
            'read_time' => '9 min',
        ],
        [
            'slug' => 'fssai-food-license-kaise-le',
            'title_hi' => 'FSSAI License कैसे लें? खाद्य व्यवसाय के लिए पूरी प्रक्रिया',
            'title_en' => 'How to Get FSSAI Food License in India',
            'excerpt' => 'Basic, State, and Central FSSAI registration explained with documents, fees, and timeline.',
            'category' => 'legal',
            'category_label' => 'LEGAL',
            'color' => 'blue',
            'badge_class' => 'bg-navy/5 text-navy',
            'author' => 'Adv. Sneha Patil',
            'author_initial' => 'S',
            'date' => 'May 5, 2026',
            'read_time' => '6 min',
        ],
        [
            'slug' => 'ecommerce-store-kaise-banaye',
            'title_hi' => 'ऑनलाइन Store कैसे शुरू करें? सिर्फ ₹4,999 में',
            'title_en' => 'How to Start an Online Store for Small Business',
            'excerpt' => 'Choosing the right platform, payment gateway setup, shipping integration, and getting your first order.',
            'category' => 'tech',
            'category_label' => 'TECH',
            'color' => 'green',
            'badge_class' => 'bg-green-50 text-green-600',
            'author' => 'Rahul Verma',
            'author_initial' => 'R',
            'date' => 'Apr 28, 2026',
            'read_time' => '8 min',
        ],
        [
            'slug' => 'itr-filing-business-guide',
            'title_hi' => 'Business ITR Filing — कौन सा Form भरना है?',
            'title_en' => 'ITR Filing for Businesses: Which Form to Use?',
            'excerpt' => 'ITR-3, ITR-4, ITR-5, ITR-6 — which income tax return form applies to your business type.',
            'category' => 'gst',
            'category_label' => 'GST / TAX',
            'color' => 'yellow',
            'badge_class' => 'bg-gold/10 text-gold',
            'author' => 'CA Amit Kumar',
            'author_initial' => 'A',
            'date' => 'Apr 15, 2026',
            'read_time' => '7 min',
        ],
    ];

    return view('pages.blog', compact('posts'));
});

// =========================================
// INDIVIDUAL BLOG ARTICLE
// =========================================
Route::get('/blog/{slug}', function ($slug) {
    $allPosts = [
        'pvt-ltd-vs-llp-vs-opc' => [
            'slug' => 'pvt-ltd-vs-llp-vs-opc',
            'title_hi' => 'Private Limited vs LLP vs OPC — 2026 में क्या सही है?',
            'title_en' => 'Private Limited vs LLP vs OPC Explained',
            'category_label' => 'LEGAL',
            'author' => 'CA Amit Kumar',
            'author_initial' => 'A',
            'author_role' => 'Tax & Startup Advisor',
            'author_bio' => 'CA Amit has 10+ years of experience helping Indian startups choose the right legal structure. He has helped 500+ founders register their companies.',
            'date' => 'June 15, 2026',
            'read_time' => '8 min read',
            'tags' => ['Company Registration', 'Pvt Ltd', 'LLP', 'OPC', 'Startup', 'Legal'],
            'takeaways' => [
                'Private Limited is best for startups seeking external funding.',
                'LLP is ideal for professionals with low compliance requirements.',
                'OPC is for solo founders who want corporate protection without partners.',
                'Compliance cost: Pvt Ltd > LLP > OPC > Proprietorship.',
            ],
            'sections' => [
                [
                    'heading_hi' => '1. प्राइवेट लिमिटेड कंपनी क्या है?',
                    'heading_en' => 'What is a Private Limited Company?',
                    'paragraphs' => [
                        'Private Limited Company (Pvt Ltd) भारत में सबसे लोकप्रिय business structure है, खासकर startups के लिए जो funding raise करना चाहते हैं।',
                        'इसमें minimum 2 directors और 2 shareholders की ज़रूरत होती है। Shareholders की देनदारी (liability) उनके shares तक सीमित होती है — यानी company का नुकसान आपकी personal संपत्ति को नहीं छू सकता।',
                        'Registration cost: ₹6,999 (Foundida) | Government fee + stamp duty अलग से। Time: 10-15 working days.',
                    ],
                    'table' => null,
                ],
                [
                    'heading_hi' => '2. LLP (Limited Liability Partnership)',
                    'heading_en' => 'What is LLP?',
                    'paragraphs' => [
                        'LLP (Limited Liability Partnership) professionals जैसे CA, Lawyers, Consultants के लिए ideal है। इसमें कम से कम 2 partners होने चाहिए।',
                        'LLP में annual compliance कम होती है — कोई mandatory board meeting नहीं, और Pvt Ltd जैसे strict ROC filings नहीं। Tax rate भी partnership के हिसाब से होती है।',
                        'हालांकि, LLP venture capital raise नहीं कर सकता, जो इसकी सबसे बड़ी limitation है।',
                    ],
                    'table' => null,
                ],
                [
                    'heading_hi' => '3. तुलना — कौन सा चुनें?',
                    'heading_en' => 'Comparison Table',
                    'paragraphs' => [
                        'नीचे दी गई तालिका आपको सही structure चुनने में मदद करेगी:',
                    ],
                    'table' => [
                        'headers' => ['Factor', 'Pvt Ltd', 'LLP', 'OPC'],
                        'rows' => [
                            ['Min Members', '2', '2', '1'],
                            ['Liability', 'Limited', 'Limited', 'Limited'],
                            ['Funding (VC/Angel)', '✓ Yes', '✗ No', '✗ No'],
                            ['Annual Compliance', 'High', 'Medium', 'Low'],
                            ['Tax Rate', '22% (Flat)', 'Slab', '22% (Flat)'],
                            ['Registration Cost', '₹6,999', '₹3,999', '₹4,999'],
                        ],
                    ],
                ],
            ],
            'conclusion' => 'अगर आप funding raise करना चाहते हैं या एक बड़ी team build करना चाहते हैं, तो Pvt Ltd सबसे best है। Professionals और small partners के लिए LLP better है। Solo founders के लिए OPC एक good option है। अगर अभी भी confused हैं, तो हमारे experts से free call पर बात करें।',
        ],
    ];

    $post = $allPosts[$slug] ?? null;
    if (!$post) {
        $post = [
            'slug' => $slug,
            'title_hi' => 'लेख लोड हो रहा है...',
            'title_en' => 'Article Coming Soon',
            'category_label' => 'BLOG',
            'author' => 'Foundida Team',
            'author_initial' => 'F',
            'author_role' => 'Content Team',
            'author_bio' => 'Expert writers covering legal and tech topics for Indian businesses.',
            'date' => 'June 2026',
            'read_time' => '5 min read',
            'tags' => ['Legal', 'Business', 'India'],
            'takeaways' => ['This article is being published soon. Check back shortly.'],
            'sections' => [
                ['heading_hi' => 'जल्द आ रहा है', 'heading_en' => 'Coming Soon', 'paragraphs' => ['हम इस विषय पर एक विस्तृत लेख तैयार कर रहे हैं। कृपया जल्द वापस देखें।', 'We are preparing a detailed article on this topic. Please check back soon.'], 'table' => null],
            ],
            'conclusion' => 'इस विषय के बारे में अभी expert से बात करने के लिए free consultation book करें।',
        ];
    }

    $related = [
        ['slug' => 'gst-registration-guide-2026', 'title_hi' => 'GST Registration: किसे लेना ज़रूरी है?', 'read_time' => '6 min'],
        ['slug' => 'trademark-registration-india', 'title_hi' => 'Trademark कैसे Register करें?', 'read_time' => '10 min'],
        ['slug' => 'startup-india-registration-benefits', 'title_hi' => 'Startup India के 7 फायदे', 'read_time' => '7 min'],
    ];

    return view('pages.blog-single', compact('post', 'related'));
});

// Funding & Mentor Subscription
Route::get('/funding', function () {
    return view('pages.funding');
});

// Live Session Guide
Route::get('/live-session', function () {
    return view('pages.live-session');
});

// =========================================
// ADMIN PANEL ROUTES
// =========================================
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/users', function () {
        return view('admin.users');
    });

    Route::get('/services', function () {
        return view('admin.services');
    });

    Route::get('/funding', function () {
        return view('admin.funding');
    });

    Route::get('/settings', function () {
        return view('admin.settings');
    });
});
