<?php

namespace App\Services;

class ContentGenerator
{
    public static function generateContent($categoryName, $serviceName)
    {
        $desc = self::generateDescription($categoryName, $serviceName);
        $benefits = self::generateBenefits($categoryName, $serviceName);
        $faqs = self::generateFaqs($categoryName, $serviceName);

        return [
            'description' => $desc,
            'benefits' => $benefits,
            'faqs' => $faqs
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
