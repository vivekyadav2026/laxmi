<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'slug' => 'pvt-ltd-vs-llp-vs-opc',
                'title_hi' => 'Private Limited vs LLP vs OPC — 2026 में क्या सही है?',
                'title_en' => 'Private Limited vs LLP vs OPC Explained',
                'category' => 'legal',
                'category_label' => 'LEGAL',
                'color' => 'blue',
                'badge_class' => 'bg-navy/5 text-navy',
                'excerpt' => 'Registration cost, compliance burden, and fundraising potential compared for Indian startups in plain language.',
                'author' => 'CA Amit Kumar',
                'author_initial' => 'A',
                'author_role' => 'Tax & Startup Advisor',
                'author_bio' => 'CA Amit has 10+ years of experience helping Indian startups choose the right legal structure. He has helped 500+ founders register their companies.',
                'date' => 'June 15, 2026',
                'read_time' => '8 min read',
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
                            'इसमें minimum 2 directors और 2 shareholders की ज़रूरत होती. Shareholders की देनदारी (liability) उनके shares तक सीमित होती है — यानी company का नुकसान आपकी personal संपत्ति को नहीं छू सकता।',
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
                'tags' => ['Company Registration', 'Pvt Ltd', 'LLP', 'OPC', 'Startup', 'Legal'],
            ],
            [
                'slug' => 'gst-registration-guide-2026',
                'title_hi' => 'GST Registration: किसे लेना ज़रूरी है? पूरी जानकारी',
                'title_en' => 'GST Registration: Who Needs It? Complete Guide',
                'category' => 'gst',
                'category_label' => 'GST / TAX',
                'color' => 'yellow',
                'badge_class' => 'bg-gold/10 text-gold',
                'excerpt' => 'Turnover limits, mandatory categories, and document checklist for GST registration in India.',
                'author' => 'CA Priya Verma',
                'author_initial' => 'P',
                'author_role' => 'Taxation Specialist',
                'author_bio' => 'CA Priya Verma is a senior taxation consultant with 8+ years of experience in GST audits and startup tax planning.',
                'date' => 'June 10, 2026',
                'read_time' => '6 min read',
                'takeaways' => [
                    'Turnover limit is ₹40 Lakhs for Goods and ₹20 Lakhs for Services.',
                    'Mandatory for all e-commerce sellers and interstate suppliers.',
                    'Registration takes 3-7 working days on the official portal.',
                    'Late filing of returns incurs a penalty of ₹50 per day.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. जीएसटी पंजीकरण क्या है?',
                        'heading_en' => 'What is GST Registration?',
                        'paragraphs' => [
                            'GST (Goods and Services Tax) भारत में एक एकीकृत अप्रत्यक्ष कर (indirect tax) है। व्यापार शुरू करने पर एक निश्चित टर्नओवर के बाद जीएसटी पंजीकरण कराना कानूनी रूप से अनिवार्य हो जाता है।',
                            'पंजीकरण के बाद आपको 15 अंकों का GSTIN (जीएसटी पहचान संख्या) मिलता है, जिसकी मदद से आप ग्राहकों से कर एकत्र कर सकते हैं और इनपुट टैक्स क्रेडिट (ITC) का दावा कर सकते हैं।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. जीएसटी के लिए टर्नओवर सीमा क्या है?',
                        'heading_en' => 'Turnover Limits for GST Registration',
                        'paragraphs' => [
                            'जीएसटी के तहत पंजीकरण की आवश्यकता व्यवसाय की श्रेणी (माल या सेवा) और राज्य के आधार पर भिन्न होती है:',
                        ],
                        'table' => [
                            'headers' => ['Category', 'Goods Threshold', 'Services Threshold'],
                            'rows' => [
                                ['Normal Category States', '₹40 Lakhs', '₹20 Lakhs'],
                                ['Special Category States', '₹20 Lakhs', '₹10 Lakhs'],
                                ['E-commerce Sellers', 'Mandatory (₹0)', 'Mandatory (₹0)'],
                            ],
                        ],
                    ],
                    [
                        'heading_hi' => '3. आवश्यक दस्तावेज़ सूची',
                        'heading_en' => 'Documents Required for GST Registration',
                        'paragraphs' => [
                            'जीएसटी पंजीकरण के लिए आवेदन करते समय आपको निम्नलिखित दस्तावेज़ों की आवश्यकता होगी:',
                            '1. प्रोप्राइटर/प्रमोटर्स का पैन कार्ड और आधार कार्ड।',
                            '2. व्यवसाय के पते का प्रमाण (बिजली बिल, रेंट एग्रीमेंट या एनओसी)।',
                            '3. बैंक खाता विवरण (कैंसिल्ड चेक या बैंक पासबुक)।',
                            '4. अधिकृत हस्ताक्षरकर्ता का फोटो और सहमति पत्र।',
                        ],
                        'table' => null,
                    ],
                ],
                'conclusion' => 'जीएसटी पंजीकरण न केवल आपके व्यवसाय को कानूनी मान्यता प्रदान करता है, बल्कि बड़ी कंपनियों के साथ व्यापार करने में भी मदद करता है। किसी भी देरी से बचने के लिए आज ही हमारे कर विशेषज्ञों से निःशुल्क परामर्श लें।',
                'tags' => ['GST', 'Tax', 'Registration', 'Compliance', 'Indian Law'],
            ],
            [
                'slug' => 'trademark-registration-india',
                'title_hi' => 'Trademark कैसे Register करें? Step-by-Step Guide 2026',
                'title_en' => 'How to Register a Trademark in India',
                'category' => 'trademark',
                'category_label' => 'TRADEMARK',
                'color' => 'purple',
                'badge_class' => 'bg-purple-50 text-purple-600',
                'excerpt' => 'Complete process, fees, timelines, and TM classes explained. Protect your brand before someone else does.',
                'author' => 'Adv. Sneha Patil',
                'author_initial' => 'S',
                'author_role' => 'IP & Trademark Attorney',
                'author_bio' => 'Adv. Sneha is an intellectual property specialist helping brands protect their names, logos, and slogans since 2018.',
                'date' => 'June 5, 2026',
                'read_time' => '10 min read',
                'takeaways' => [
                    'A Trademark protects your brand name, logo, and slogan from copying.',
                    'You can use the TM symbol immediately after filing the application.',
                    'Complete registration takes 12 to 18 months.',
                    'Trademarks are valid for 10 years and can be renewed indefinitely.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. ट्रेडमार्क क्या है और क्यों आवश्यक है?',
                        'heading_en' => 'What is a Trademark & Why Register?',
                        'paragraphs' => [
                            'ट्रेडमार्क एक विशिष्ट पहचानकर्ता है जैसे कि नाम, लोगो, ब्रांड नाम, या स्लोगन, जो आपके उत्पादों और सेवाओं को आपके प्रतिद्वंद्वियों से अलग करता है।',
                            'ट्रेडमार्क का मुख्य उद्देश्य आपके ब्रांड की प्रतिष्ठा (brand reputation) की रक्षा करना और दूसरों को आपके नाम का दुरुपयोग करने से रोकना है।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. ट्रेडमार्क पंजीकरण की प्रक्रिया',
                        'heading_en' => 'Step-by-Step Process of Trademark Filing',
                        'paragraphs' => [
                            'पंजीकरण की प्रक्रिया में ये महत्वपूर्ण कदम शामिल हैं:',
                            'कदम 1: ट्रेडमार्क सर्च (Trademark Search) — यह सुनिश्चित करने के लिए कि आपका नाम पहले से पंजीकृत या मिलता-जुलता न हो।',
                            'कदम 2: आवेदन दाखिल करना (Filing TM-A) — ट्रेडमार्क रजिस्ट्री में ऑनलाइन फॉर्म दाखिल करना, जिसके बाद आप तत्काल "TM" चिन्ह का उपयोग कर सकते हैं।',
                            'कदम 3: औपचारिक जांच (Formality Check) — विभाग द्वारा आवेदन की बुनियादी समीक्षा।',
                            'कदम 4: परीक्षा रिपोर्ट (Examination) — सरकारी रजिस्ट्रार द्वारा आपत्ति दर्ज करना (यदि कोई हो)।',
                            'कदम 5: जर्नल प्रकाशन और प्रमाण पत्र — जनता के लिए प्रकाशन और 4 महीने के भीतर किसी भी विरोध के न होने पर पंजीकरण प्रमाण पत्र जारी करना।',
                        ],
                        'table' => null,
                    ],
                ],
                'conclusion' => 'ट्रेडमार्क पंजीकरण आपके ब्रांड की सबसे मूल्यवान अमूर्त संपत्ति (intangible asset) है। अपने लोगो और नाम को सुरक्षित करने के लिए अभी हमारे कानूनी विशेषज्ञों से निःशुल्क परामर्श लें।',
                'tags' => ['Trademark', 'IP Protection', 'Branding', 'Startup Law'],
            ],
            [
                'slug' => 'website-zaruri-hai-business-ke-liye',
                'title_hi' => 'बिज़नेस के लिए Website क्यों ज़रूरी है? (2026 Guide)',
                'title_en' => 'Why Every Business Needs a Website in 2026',
                'category' => 'tech',
                'category_label' => 'TECH',
                'color' => 'green',
                'badge_class' => 'bg-green-50 text-green-600',
                'excerpt' => 'How a professional website acts as your 24/7 sales representative and builds credibility with customers.',
                'author' => 'Rahul Verma',
                'author_initial' => 'R',
                'author_role' => 'Head of Web Tech',
                'author_bio' => 'Rahul is a web architect who has designed scalable e-commerce and SaaS platforms for global clients.',
                'date' => 'May 28, 2026',
                'read_time' => '5 min read',
                'takeaways' => [
                    'A website is your online digital showroom open 24/7.',
                    '81% of shoppers research online before making a purchase.',
                    'A professional website builds instant trust and credibility.',
                    'Helps run cost-effective digital marketing campaigns.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. डिजिटल क्रेडिबिलिटी और भरोसा',
                        'heading_en' => 'Building Credibility & Trust',
                        'paragraphs' => [
                            'आज के समय में जब कोई ग्राहक किसी कंपनी के बारे में सुनता है, तो सबसे पहले वह उसे गूगल पर सर्च करता है। यदि आपकी कोई वेबसाइट नहीं है, तो ग्राहक का विश्वास डगमगा सकता है।',
                            'एक अच्छी, तेज़ और मोबाइल-फ्रेंडली वेबसाइट ग्राहकों को यह बताती है कि आपका व्यवसाय पेशेवर और गंभीर है।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. सही प्लेटफॉर्म का चुनाव कैसे करें?',
                        'heading_en' => 'Choosing the Right Platform',
                        'paragraphs' => [
                            'वेबसाइट बनाने के लिए बाज़ार में कई तरह के विकल्प मौजूद हैं, जो आपके व्यवसाय की ज़रूरतों के हिसाब से चुने जाने चाहिए:',
                        ],
                        'table' => [
                            'headers' => ['Platform', 'Ideal For', 'Setup Speed', 'Cost'],
                            'rows' => [
                                ['Shopify', 'E-commerce Stores', 'Extremely Fast', 'Monthly Subscription'],
                                ['WordPress', 'Blogs & Portfolios', 'Fast', 'Low Setup Cost'],
                                ['Custom Code', 'SaaS & Web Applications', 'Medium / Slow', 'High Initial Cost'],
                            ],
                        ],
                    ],
                ],
                'conclusion' => 'वेबसाइट होना कोई विलासिता नहीं बल्कि आज की आवश्यकता है। अपनी नई वेबसाइट के लिए आज ही हमारी टेक टीम से सलाह लें।',
                'tags' => ['Website', 'Web Development', 'Digital Presence', 'Business Growth'],
            ],
            [
                'slug' => 'startup-india-registration-benefits',
                'title_hi' => 'Startup India में Register करने के 7 फायदे',
                'title_en' => '7 Benefits of Startup India Registration',
                'category' => 'startup',
                'category_label' => 'STARTUP',
                'color' => 'orange',
                'badge_class' => 'bg-orange-50 text-orange-600',
                'excerpt' => 'Tax exemptions, fast-track IP, fund access, and more. Every eligible startup should register under DPIIT.',
                'author' => 'CA Amit Kumar',
                'author_initial' => 'A',
                'author_role' => 'Tax & Startup Advisor',
                'author_bio' => 'CA Amit has helped 500+ startups register under the Startup India scheme to raise funds and save taxes.',
                'date' => 'May 20, 2026',
                'read_time' => '7 min read',
                'takeaways' => [
                    'DPIIT recognition gives your startup official government validation.',
                    'Enjoy a 3-year income tax exemption under Section 80-IAC.',
                    '80% rebate in patent filing costs and 50% rebate in trademark filing fees.',
                    'Access to the ₹10,000 Crore Fund of Funds and Seed Fund Scheme.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. स्टार्टअप इंडिया योजना क्या है?',
                        'heading_en' => 'What is the Startup India Scheme?',
                        'paragraphs' => [
                            'स्टार्टअप इंडिया भारत सरकार की एक प्रमुख पहल है, जिसका उद्देश्य देश में नवाचार (innovation) और नए उद्यमों को बढ़ावा देना है।',
                            'इसके तहत योग्य कंपनियों को DPIIT (उद्योग और आंतरिक व्यापार संवर्धन विभाग) द्वारा मान्यता दी जाती है, जिससे कई सरकारी लाभों के द्वार खुल जाते हैं।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. पात्रता मानदंड (Eligibility Criteria)',
                        'heading_en' => 'Who is Eligible for DPIIT Recognition?',
                        'paragraphs' => [
                            'स्टार्टअप इंडिया में पंजीकरण के लिए आपकी कंपनी को इन शर्तों को पूरा करना होगा:',
                            '1. कंपनी का प्रकार: प्राइवेट लिमिटेड (Pvt Ltd), पार्टनरशिप फर्म, या सीमित देयता भागीदारी (LLP) होना चाहिए।',
                            '2. कंपनी की आयु: पंजीकरण या निगमन की तारीख से 10 वर्ष से अधिक नहीं होनी चाहिए।',
                            '3. टर्नओवर सीमा: निगमन के बाद से किसी भी वित्तीय वर्ष में वार्षिक टर्नओवर ₹100 करोड़ से अधिक नहीं होना चाहिए।',
                            '4. नवाचार: व्यवसाय का मॉडल नए उत्पादों, सेवाओं या प्रक्रियाओं के विकास या सुधार से संबंधित होना चाहिए।',
                        ],
                        'table' => null,
                    ],
                ],
                'conclusion' => 'स्टार्टअप इंडिया योजना शुरुआती कंपनियों के लिए एक वरदान है। यह न केवल टैक्स की बचत करती है बल्कि निवेशकों को भी आकर्षित करती है। आज ही अपना पंजीकरण सुनिश्चित करें।',
                'tags' => ['Startup India', 'DPIIT', 'Tax Exemption', 'Funding', 'Government Subsidies'],
            ],
            [
                'slug' => 'annual-compliance-private-limited',
                'title_hi' => 'Private Limited Company की Annual Compliance क्या होती है?',
                'title_en' => 'Annual Compliance Checklist for Pvt Ltd Companies',
                'category' => 'compliance',
                'category_label' => 'COMPLIANCE',
                'color' => 'red',
                'badge_class' => 'bg-red-50 text-red-600',
                'excerpt' => 'ROC filings, board meetings, audits, and ITR — a complete yearly compliance checklist to avoid penalties.',
                'author' => 'CA Priya Verma',
                'author_initial' => 'P',
                'author_role' => 'Taxation Specialist',
                'author_bio' => 'CA Priya Verma advises corporate boards on corporate governance and financial compliance.',
                'date' => 'May 12, 2026',
                'read_time' => '9 min read',
                'takeaways' => [
                    'Statutory Audit is mandatory for all Private Limited companies, regardless of turnover.',
                    'Form AOC-4 (Financial Statements) must be filed within 30 days of AGM.',
                    'Form MGT-7 (Annual Return) must be filed within 60 days of AGM.',
                    'Non-compliance leads to a penalty of ₹100 per day per form.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. बोर्ड बैठकें और एजीएम (Board Meetings & AGM)',
                        'heading_en' => 'Board Meetings & Annual General Meetings',
                        'paragraphs' => [
                            'एक प्राइवेट लिमिटेड कंपनी के लिए प्रत्येक कैलेंडर वर्ष में कम से कम 4 बोर्ड बैठकें (Board Meetings) आयोजित करना कानूनी रूप से अनिवार्य है, जिसमें दो बैठकों के बीच का अंतर 120 दिनों से अधिक नहीं होना चाहिए।',
                            'इसके अतिरिक्त, निगमन के बाद प्रत्येक वित्तीय वर्ष के समापन पर शेयरधारकों की वार्षिक आम बैठक (AGM) आयोजित करना अनिवार्य है।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. आरओसी फाइलिंग फॉर्म की सूची',
                        'heading_en' => 'ROC Annual Filing Checklist',
                        'paragraphs' => [
                            'कंपनी को रजिस्ट्रार ऑफ कंपनीज (ROC) के पास समय पर निम्नलिखित फॉर्म जमा करने होते हैं:',
                        ],
                        'table' => [
                            'headers' => ['Form Code', 'Purpose', 'Due Date'],
                            'rows' => [
                                ['ADT-1', 'Appointing Statutory Auditor', 'Within 15 days of AGM'],
                                ['AOC-4', 'Filing Balance Sheet & P&L Statement', 'Within 30 days of AGM'],
                                ['MGT-7', 'Filing Annual Return & Shareholder List', 'Within 60 days of AGM'],
                                ['DIR-3 KYC', 'Director KYC Verification', 'By 30th September every year'],
                            ],
                        ],
                    ],
                ],
                'conclusion' => 'अनुपालन में चूक करने पर कंपनी और निदेशकों (Directors) पर भारी जुर्माना लग सकता है और कंपनी का नाम बंद भी किया जा सकता है। समय पर फाइलिंग सुनिश्चित करने के लिए हमारे विशेषज्ञों से बात करें।',
                'tags' => ['Company Law', 'ROC Compliance', 'ADT-1', 'AOC-4', 'MGT-7', 'Audit'],
            ],
            [
                'slug' => 'fssai-food-license-kaise-le',
                'title_hi' => 'FSSAI License कैसे लें? खाद्य व्यवसाय के लिए पूरी प्रक्रिया',
                'title_en' => 'How to Get FSSAI Food License in India',
                'category' => 'legal',
                'category_label' => 'LEGAL',
                'color' => 'blue',
                'badge_class' => 'bg-navy/5 text-navy',
                'excerpt' => 'Basic, State, and Central FSSAI registration explained with documents, fees, and timeline.',
                'author' => 'Adv. Sneha Patil',
                'author_initial' => 'S',
                'author_role' => 'IP & Trademark Attorney',
                'author_bio' => 'Adv. Sneha Patil helps food startups, restaurants, and cloud kitchens obtain food safety licenses.',
                'date' => 'May 5, 2026',
                'read_time' => '6 min read',
                'takeaways' => [
                    'FSSAI registration is mandatory for home-bakers, cafes, and cloud kitchens.',
                    'Based on annual turnover, there are Basic, State, and Central categories.',
                    'The license is valid for 1 to 5 years and must be renewed.',
                    'Heavy legal penalties apply for selling food products without FSSAI.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. एफएसएसएआई क्या है?',
                        'heading_en' => 'What is FSSAI?',
                        'paragraphs' => [
                            'FSSAI (भारतीय खाद्य सुरक्षा और मानक प्राधिकरण) खाद्य मंत्रालय के अंतर्गत एक स्वायत्त निकाय है, जो खाद्य सुरक्षा और मानव उपभोग के लिए मानकों को तय करता है।',
                            'भारत में किसी भी प्रकार का खाद्य व्यवसाय (जैसे कि ढाबा, कैफे, पैकेज्ड फूड, ग्रोसरी स्टोर, रेस्टोरेंट) शुरू करने के लिए FSSAI लाइसेंस या पंजीकरण होना अनिवार्य है।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. एफएसएसएआई लाइसेंस के प्रकार',
                        'heading_en' => 'Types of FSSAI License & Eligibility',
                        'paragraphs' => [
                            'आपके व्यवसाय के आकार और टर्नओवर के आधार पर आपको निम्नलिखित में से एक श्रेणी में पंजीकरण कराना होगा:',
                        ],
                        'table' => [
                            'headers' => ['License Type', 'Annual Turnover Limit', 'Ideal For'],
                            'rows' => [
                                ['Basic Registration', 'Under ₹12 Lakhs', 'Home bakers, petty retailers, food stalls'],
                                ['State License', '₹12 Lakhs to ₹20 Crores', 'Mid-sized restaurants, caterers, warehouses'],
                                ['Central License', 'Over ₹20 Crores / Importers', 'Multi-state brands, large food factories'],
                            ],
                        ],
                    ],
                ],
                'conclusion' => 'एफएसएसएआई नंबर पैकेजिंग पर प्रदर्शित करने से आपके ग्राहकों का भरोसा बढ़ता है। अपना फूड बिजनेस शुरू करने के लिए आज ही FSSAI लाइसेंस हेतु आवेदन करें।',
                'tags' => ['FSSAI', 'Food License', 'FOSCOS', 'Food Safety', 'Restaurant'],
            ],
            [
                'slug' => 'ecommerce-store-kaise-banaye',
                'title_hi' => 'ऑनलाइन Store कैसे शुरू करें? सिर्फ ₹4,999 में',
                'title_en' => 'How to Start an Online Store for Small Business',
                'category' => 'tech',
                'category_label' => 'TECH',
                'color' => 'green',
                'badge_class' => 'bg-green-50 text-green-600',
                'excerpt' => 'Choosing the right platform, payment gateway setup, shipping integration, and getting your first order.',
                'author' => 'Rahul Verma',
                'author_initial' => 'R',
                'author_role' => 'Head of Web Tech',
                'author_bio' => 'Rahul Verma designs and launches fast, secure online storefronts for retail brands.',
                'date' => 'April 28, 2026',
                'read_time' => '8 min read',
                'takeaways' => [
                    'E-commerce expands your business reach to customers across India.',
                    'Shopify allows you to launch quickly without technical coding experience.',
                    'Payment gateways like Razorpay let you accept UPI and card payments instantly.',
                    'Third-party shipping partners automate logistics and cash on delivery.',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. ई-कॉमर्स प्लेटफॉर्म का चयन',
                        'heading_en' => 'Choosing the Right Platform',
                        'paragraphs' => [
                            'ऑनलाइन सामान बेचने के लिए सबसे पहला कदम है सही प्लेटफॉर्म का चुनाव करना। छोटे और मध्यम व्यवसायों के लिए Shopify, WooCommerce या Magento सबसे बेहतर विकल्प हैं।',
                            'Shopify का उपयोग करके आप बिना कोडिंग के भी कुछ ही दिनों में अपनी प्रोफेशनल ई-कॉमर्स वेबसाइट तैयार कर सकते हैं।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. पेमेंट गेटवे और शिपिंग एकीकरण',
                        'heading_en' => 'Payment Gateway & Shipping Integration',
                        'paragraphs' => [
                            'ग्राहकों से क्रेडिट कार्ड, डेबिट कार्ड, नेट बैंकिंग या यूपीआई से भुगतान लेने के लिए आपको Razorpay, Paytm, या Cashfree जैसे गेटवे को अपनी वेबसाइट से जोड़ना होगा।',
                            'ऑर्डर डिलीवरी के लिए Shiprocket या Delhivery जैसी लॉजिस्टिक्स कंपनियों के साथ एकीकरण करें, जो आपके पते से माल पिक-अप और डिलीवरी संभालती हैं।',
                        ],
                        'table' => null,
                    ],
                ],
                'conclusion' => 'ऑनलाइन बिक्री शुरू करके आप अमेज़ॅन या फ्लिपकार्ट जैसी बड़ी कंपनियों के भारी कमीशन से बच सकते हैं। अपना ऑनलाइन स्टोर लॉन्च करने के लिए हमारे टेक विशेषज्ञों से संपर्क करें।',
                'tags' => ['E-commerce', 'Shopify', 'Online Store', 'Payment Gateway', 'Logistics'],
            ],
            [
                'slug' => 'itr-filing-business-guide',
                'title_hi' => 'Business ITR Filing — कौन सा Form भरना है?',
                'title_en' => 'ITR Filing for Businesses: Which Form to Use?',
                'category' => 'gst',
                'category_label' => 'GST / TAX',
                'color' => 'yellow',
                'badge_class' => 'bg-gold/10 text-gold',
                'excerpt' => 'ITR-3, ITR-4, ITR-5, ITR-6 — which income tax return form applies to your business type.',
                'author' => 'CA Amit Kumar',
                'author_initial' => 'A',
                'author_role' => 'Tax & Startup Advisor',
                'author_bio' => 'CA Amit helps corporate entities and freelancers file taxes correctly and optimize business expenses.',
                'date' => 'April 15, 2026',
                'read_time' => '7 min read',
                'takeaways' => [
                    'ITR-3 is for proprietary businesses requiring detailed books of accounts.',
                    'ITR-4 is for small businesses operating under the presumptive tax scheme.',
                    'ITR-5 is for partnership firms and LLPs.',
                    'ITR-6 is mandatory for all incorporated companies (Pvt Ltd).',
                ],
                'sections' => [
                    [
                        'heading_hi' => '1. व्यावसायिक आयकर रिटर्न क्या है?',
                        'heading_en' => 'What is Business ITR?',
                        'paragraphs' => [
                            'हर उस व्यक्ति, फर्म या कंपनी को आयकर विभाग के पास व्यावसायिक आयकर रिटर्न (ITR) दाखिल करना आवश्यक है, जो व्यापार या पेशे से आय अर्जित करता है।',
                            'आईटीआर दाखिल करने से न केवल दंड (penalties) से बचा जा सकता है बल्कि व्यापार ऋण (business loans) प्राप्त करने में भी आसानी होती है।',
                        ],
                        'table' => null,
                    ],
                    [
                        'heading_hi' => '2. व्यापार के लिए विभिन्न आईटीआर फॉर्म',
                        'heading_en' => 'Different ITR Forms for Business Categories',
                        'paragraphs' => [
                            'करदाता को अपने व्यापार के कानूनी ढांचे के अनुसार सही फॉर्म का चयन करना चाहिए:',
                        ],
                        'table' => [
                            'headers' => ['ITR Form', 'Eligible Entities', 'Tax Scheme Details'],
                            'rows' => [
                                ['ITR-3', 'Proprietary businesses, audit cases', 'Detailed books of accounts required'],
                                ['ITR-4', 'Businesses with turnover under ₹2Cr', 'Presumptive tax (declare 6% or 8% profit)'],
                                ['ITR-5', 'Partnership firms & LLPs', 'Flat 30% tax rate plus surcharge'],
                                ['ITR-6', 'All corporate entities (Pvt Ltd)', 'Must file audit report online'],
                            ],
                        ],
                    ],
                ],
                'conclusion' => 'सही आईटीआर फॉर्म चुनना और नियत तारीख (31 जुलाई या 31 अक्टूबर) से पहले फाइल करना बेहद आवश्यक है। टैक्स बचाने और रिफंड क्लेम करने के लिए आज ही सीए से सलाह लें।',
                'tags' => ['ITR Filing', 'Income Tax', 'ITR-3', 'ITR-4', 'Presumptive Taxation', 'Business Tax'],
            ],
        ];

        foreach ($posts as $postData) {
            Post::create($postData);
        }
    }
}
