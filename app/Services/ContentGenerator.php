<?php

namespace App\Services;

class ContentGenerator
{
    public static function generateContent($categoryName, $serviceName)
    {
        $normalizedName = strtolower(trim($serviceName));

        if (str_contains($normalizedName, 'private') || str_contains($normalizedName, 'pvt') || str_contains($normalizedName, 'company registration')) {
            return self::getPrivateCompanyContent();
        }

        $desc = self::generateDescription($categoryName, $serviceName);
        $benefits = self::generateBenefits($categoryName, $serviceName);
        $faqs = self::generateFaqs($categoryName, $serviceName);

        return [
            'description' => $desc,
            'benefits' => $benefits,
            'faqs' => $faqs,
            'documents' => null,
            'process' => null,
            'deliverables' => null
        ];
    }

    public static function getPrivateCompanyContent()
    {
        return [
            'description' => "A <strong>Private Limited Company (Pvt Ltd)</strong> is the most legal, trusted, and popular business structure in India, registered under the Ministry of Corporate Affairs (MCA) as per the <em>Companies Act, 2013</em>. It provides limited liability protection to its shareholders, enhances business credibility for bank loans & equity funding, and allows up to 200 shareholders with a minimum requirement of just 2 directors.",
            
            'benefits' => [
                [
                    'icon' => '🛡️',
                    'title_en' => 'Limited Liability Protection',
                    'desc_en' => 'Shareholders personal assets remain 100% safe. Financial risk is limited strictly to their shareholding.'
                ],
                [
                    'icon' => '🏢',
                    'title_en' => 'Separate Legal Entity',
                    'desc_en' => 'The company exists as an independent legal person that can own property, acquire assets, and enter contracts.'
                ],
                [
                    'icon' => '🚀',
                    'title_en' => 'Easy VC & Angel Funding',
                    'desc_en' => 'Preferred entity structure by Venture Capitalists, Angel Investors, and Banks for raising equity capital.'
                ],
                [
                    'icon' => '♾️',
                    'title_en' => 'Perpetual Succession',
                    'desc_en' => 'Uninterrupted existence. The company continues to exist regardless of changes in directors or shareholders.'
                ],
                [
                    'icon' => '⭐',
                    'title_en' => 'High Brand Credibility',
                    'desc_en' => 'Command higher trust among clients, corporate vendors, international partners, and government tenders.'
                ],
                [
                    'icon' => '🌐',
                    'title_en' => '100% Foreign Direct Investment',
                    'desc_en' => 'Eligible for 100% FDI under the automatic route for NRI & foreign investors wanting to invest in India.'
                ]
            ],

            'documents' => [
                'directors' => [
                    'title' => 'Directors & Shareholders Documents',
                    'items' => [
                        'PAN Card Copy of all Directors & Shareholders (Mandatory)',
                        'Identity Proof: Aadhaar Card, Passport, Driving License, or Voter ID',
                        'Address Proof: Latest Bank Statement, Electricity Bill, or Mobile Bill (not older than 2 months)',
                        'Passport size photograph of each director',
                        'Email ID & Phone Number of all directors',
                        'Passport copy (Mandatory for Foreign Nationals / NRIs)'
                    ]
                ],
                'office' => [
                    'title' => 'Registered Office Premises Proof',
                    'items' => [
                        'Latest Electricity Bill, Water Bill, or Gas Bill of the office address',
                        'Lease / Rent Agreement or Property Sale Deed',
                        'No Objection Certificate (NOC) signed by the property owner'
                    ]
                ]
            ],

            'process' => [
                [
                    'step' => '01',
                    'title' => 'DSC & DIN Application',
                    'desc' => 'We obtain Digital Signature Certificates (Class-3 DSC) and Director Identification Numbers (DIN) for all proposed directors.'
                ],
                [
                    'step' => '02',
                    'title' => 'Company Name Approval',
                    'desc' => 'We perform a comprehensive name availability search and submit RUN / SPICe+ Part A application to MCA for unique name reservation.'
                ],
                [
                    'step' => '03',
                    'title' => 'SPICe+ Incorporation Filing',
                    'desc' => 'Drafting and uploading e-MOA, e-AOA, and SPICe+ Part B forms along with AGILE-PRO-S for PAN, TAN, GST, EPFO & ESIC.'
                ],
                [
                    'step' => '04',
                    'title' => 'Certificate of Incorporation',
                    'desc' => 'MCA issues the official Certificate of Incorporation (COI) containing the CIN, PAN, TAN, and official corporate registration approval.'
                ]
            ],

            'deliverables' => [
                'Certificate of Incorporation (COI) with CIN',
                'Company PAN Card & TAN Allotment',
                'Class-3 Digital Signature Certificates (DSC)',
                'Director Identification Numbers (DIN)',
                'Drafted e-MOA (Memorandum) & e-AOA (Articles)',
                'Corporate Bank Account Opening Assistance',
                'PF, ESIC, and Professional Tax Registrations',
                'Free GST & MSME Registration Consultation'
            ],

            'faqs' => [
                [
                    'q_en' => 'How many directors and shareholders are required for Private Limited company registration?',
                    'a_en' => 'A minimum of 2 directors and 2 shareholders are required. The directors and shareholders can be the exact same individuals. A maximum of 200 shareholders is permitted.'
                ],
                [
                    'q_en' => 'Is there any minimum capital requirement to register a Pvt Ltd company in India?',
                    'a_en' => 'No, under the Companies Amendment Act 2015, the requirement for minimum paid-up capital was removed. You can start a Pvt Ltd company with any capital amount (e.g. ₹1,000 or ₹10,000).'
                ],
                [
                    'q_en' => 'What is the difference between Authorized Capital and Paid-up Capital?',
                    'a_en' => 'Authorized Capital is the maximum ceiling of share capital a company is authorized to issue to shareholders. Paid-up Capital is the actual amount paid by shareholders for shares issued to them.'
                ],
                [
                    'q_en' => 'What are MOA and AOA of a company?',
                    'a_en' => 'MOA (Memorandum of Association) defines the core objectives, scope, and powers of the company. AOA (Articles of Association) contains internal rules, governance policies, and management regulations.'
                ],
                [
                    'q_en' => 'What are Digital Signature Certificates (DSC) and DIN?',
                    'a_en' => 'A DSC (Class-3) is an encrypted digital key used to sign electronic MCA incorporation forms. DIN (Director Identification Number) is a unique 8-digit identification number allotted by the Central Government to every director.'
                ],
                [
                    'q_en' => 'Can a salaried employee become a director in a Private Limited Company?',
                    'a_en' => 'Yes, a salaried individual can become a director, provided their employer\'s agreement/employment contract permits them to hold directorships in another commercial enterprise.'
                ],
                [
                    'q_en' => 'How can I avoid rejection of my proposed company name in India?',
                    'a_en' => 'Ensure the proposed name is unique, aligns with your business activity, does not phonetically resemble existing companies, and does not infringe upon any registered trademark.'
                ],
                [
                    'q_en' => 'Can a One Person Company (OPC) be converted into a Private Limited Company?',
                    'a_en' => 'Yes, an OPC can be converted into a Private Limited Company as per Section 18 of the Companies Act, 2013 and Companies (Incorporation) Rules by submitting Form INC-6.'
                ]
            ]
        ];
    }

    private static function generateDescription($cat, $srv)
    {
        return "Get professional, hassle-free <strong>{$srv}</strong> services tailored for your business. Our experts handle all the complex compliance and paperwork, ensuring a 100% secure and fast process. Whether you are a startup or an established enterprise, our {{ strtolower($cat) }} solutions are designed to save you time and money.";
    }

    private static function generateBenefits($cat, $srv)
    {
        return [
            [
                'icon' => '⚡',
                'title_en' => 'Fast Processing',
                'desc_en' => "We ensure your {$srv} application is submitted quickly and followed up regularly for rapid approval."
            ],
            [
                'icon' => '🔒',
                'title_en' => '100% Secure & Compliant',
                'desc_en' => 'All documents and filings comply with the latest government regulations and legal frameworks.'
            ],
            [
                'icon' => '👨‍⚖️',
                'title_en' => 'Expert Assistance',
                'desc_en' => 'Guided by senior CAs, CSs, and Lawyers every step of the way to guarantee accuracy.'
            ]
        ];
    }

    private static function generateFaqs($cat, $srv)
    {
        return [
            [
                'q_en' => "What documents are required for {$srv}?",
                'a_en' => "The documentation varies slightly depending on your business type, but generally requires standard KYC (Aadhar, PAN), business address proof, and basic registration details. Our experts will provide a customized checklist once you begin."
            ],
            [
                'q_en' => "How long does the {$srv} process take?",
                'a_en' => "We pride ourselves on speed. While government processing times may vary, our internal drafting and filing for {$srv} are usually completed within 24-48 hours of receiving your documents."
            ],
            [
                'q_en' => "Are there any hidden charges?",
                'a_en' => "No. Our pricing is completely transparent. The price you see includes professional fees. Any government fees or stamp duties will be communicated upfront before processing."
            ]
        ];
    }
}
