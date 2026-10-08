<?php
/**
 * Template Name: Privacy Policy
 * @package TailPress
 */

add_filter('pre_get_document_title', fn(): string => 'Privacy Policy | Tourism Exchange Australia');
add_action('wp_head', function (): void {
    if (is_page('privacy-policy') || is_page_template('page-privacy-policy.php')) {
        echo '<meta name="description" content="' . esc_attr('Learn how Tourism Exchange Australia collects, uses, stores and protects personal information.') . '">' . "\n";
    }
});

get_header();

$sections = [
    [
        'title' => '1. We respect your privacy',
        'content' => [
            ['text' => '1.1. TXA is an online tourism marketplace that is operated by Vcubed Pty Ltd. Vcubed Pty Ltd respects your right to privacy and is committed to safeguarding the privacy of our customers and visitors to our platform. We adhere to the Privacy Act 1988 and General Data Protection Regulation (Regulation (EU) 2016/679). This policy sets out how we collect and treat your personal data.'],
            ['text' => '1.2. “Personal Data” has the meaning defined within the above regulations and is any information relating to an identifiable person.'],
        ],
    ],
    [
        'title' => '2. Important information and who we are',
        'content' => [
            ['text' => '<strong>2.1. Purpose of this Privacy Policy</strong>'],
            ['text' => 'This Privacy Policy aims to give you information on how TXA collects and processes your personal data through your use of this website, including any data you may provide through this website when you sign up, purchase a product or service or take part in a competition.'],
            ['text' => 'This tourism marketplace is not intended for children, and we do not knowingly collect data relating to children.'],
            ['text' => 'It is important that you read this Privacy Policy together with any other privacy policy or fair processing policy we may provide on specific occasions when we are collecting or processing personal data about you so that you are fully aware of how and why we are using your data. This Privacy Policy supplements other notices and privacy policies.'],
            ['text' => '<strong>2.2. Controller</strong>'],
            ['text' => 'Vcubed Pty Ltd (ACN: 074 524879) is the controller and responsible for your personal data (collectively referred to as “V3”, “we”, “us” or “our” in this Privacy Policy).'],
            ['text' => 'We have appointed a Data Protection Officer (DPO) who is responsible for overseeing questions in relation to this Privacy Policy. If you have any questions about this Privacy Policy, including any requests to exercise your legal rights, please contact the DPO using the details set out below.'],
            ['text' => '<strong>2.3. Contact details</strong>'],
            ['text' => 'If you have any questions about this Privacy Policy or our privacy practices, please contact our DPO in the following ways:'],
            ['text' => '<strong>Full name of legal entity:</strong> Vcubed Pty Ltd<br><strong>Email address:</strong> <a href="mailto:customerservice@v3leisure.com">customerservice@v3leisure.com</a><br><strong>Postal address:</strong> 3/8 Alvan Street, Subiaco, Western Australia, 6008, Australia'],
            ['text' => 'You have the right to make a complaint at any time to the Office of the Australian Information Commissioner (OAIC). We would, however, appreciate the chance to deal with your concerns before you approach the OAIC, so please contact us in the first instance.'],
            ['text' => '<strong>2.4. Changes to the Privacy Policy and your duty to inform us of changes</strong>'],
            ['text' => '2.5. We keep our Privacy Policy under regular review. Historic versions can be made available upon request.'],
            ['text' => '2.6. It is important that the personal data we hold about you is accurate and current. Please keep us informed if your personal data changes during your relationship with us.'],
            ['text' => '<strong>2.7. Third-party links</strong>'],
            ['text' => 'This website may include links to third-party websites, plug-ins and applications. Clicking on those links or enabling those connections may allow third parties to collect or share data about you. We do not control these third-party websites and are not responsible for their privacy statements. When you leave our website, we encourage you to read the privacy policy of every website you visit.'],
        ],
    ],
    [
        'title' => '3. Collection of personal information',
        'content' => [
            ['text' => '3.1. Vcubed Pty Ltd will, from time to time, receive and store personal information you enter onto our TXA Platform, provide to us directly or give to us in other forms.'],
            ['text' => '3.2. You may provide basic information such as your name, phone number, address and email address to enable us to send information, provide updates and process your product or service booking. We may collect additional information at other times, including but not limited to when you provide feedback, provide information about your personal or business affairs, change your content or email preference, respond to surveys and/or promotions, provide financial or credit card information, or communicate with our customer support.'],
            ['text' => '3.3. Additionally, we may also collect any other information you provide while interacting with us.'],
            ['text' => '3.4. If you do not wish your personal information to be handled in this way, you may cancel the booking process. In addition, when you choose to share personal information in order to receive services selected by Vcubed Pty Ltd, you grant Vcubed Pty Ltd your permission to share the personal information, for example by selecting the appropriate setting in the booking process. If you accept the “I would like to opt-in to receive marketing from or in relation to this business” option during the booking process, we may provide you with information by email or other means about the products and/or services. If you accept the “I would like to opt-in to receive marketing from related parties” option in the booking process, you may also be notified of other goods and/or services offered by our strategic alliance businesses and your information may be used for databank compilation and administration, and databank sales to data processing companies including destination marketing organisations and operators of global distribution systems of travel and leisure products. If you prefer not to receive such offers or details, or if you do not wish your personal information to be handled in this way, please untick one or both of these options in the booking process.'],
            ['text' => '3.5. Your credit card details are not saved during the booking process, nor are they in any way viewable or accessible by us or any other parties.'],
        ],
    ],
    [
        'title' => '4. How we collect your personal information',
        'content' => [
            ['text' => '4.1. Vcubed Pty Ltd collects personal information from you in a variety of ways, including when you interact with us electronically or in person, when you access TXA client websites and when we provide our booking services to you. We may receive personal information from third parties. If we do, we will protect it as set out in this Privacy Policy.'],
        ],
    ],
    [
        'title' => '5. Use of your personal information',
        'content' => [
            ['text' => '5.1. Vcubed Pty Ltd may use personal information collected from you to provide you with information and updates, and to fulfil bookings you have made via our TXA platform. We may also make you aware of new and additional products, services and opportunities available to you. We may use your personal information to improve our products and services and better understand your needs.'],
            ['text' => '5.2. Vcubed Pty Ltd may contact you by a variety of measures including, but not limited to, telephone, email, SMS or mail.'],
        ],
    ],
    [
        'title' => '6. Disclosure of your personal information',
        'content' => [
            ['text' => '6.1. We may disclose your personal information to any of our employees, officers, insurers, professional advisers, agents, suppliers and participants in our TXA platform or subcontractors insofar as reasonably necessary for the purposes set out in this Policy.'],
            ['text' => '6.2. We may from time to time need to disclose personal information to comply with a legal requirement, such as a law, regulation, court order, subpoena or warrant, in the course of a legal proceeding or in response to a law enforcement agency request.'],
            ['text' => '6.3. We may also use your personal information to protect the copyright, trademarks, legal rights, property or safety of Territory Partner, TXA, its customers or third parties.'],
            ['text' => '6.4. Information that we collect may from time to time be stored, processed or transferred between parties located in countries outside of Australia.'],
            ['text' => '6.5. If there is a change of control in our business or a sale or transfer of business assets, we reserve the right to transfer, to the extent permissible at law, our user databases together with any personal information and non-personal information contained in those databases. This information may be disclosed to a potential purchaser under an agreement to maintain confidentiality. We would seek to disclose information only in good faith and where required by any of the above circumstances.'],
            ['text' => '6.6. By providing us with personal information, you consent to the terms of this Privacy Policy and the types of disclosure covered by this Policy. Where we disclose your personal information to third parties, we will request that the third party follow this Privacy Policy regarding handling your personal information.'],
        ],
    ],
    [
        'title' => '7. International transfers',
        'content' => [
            ['text' => '7.1. We share your personal data within the group of companies using the Open Booking Exchange Tourism Market technology. This may involve transferring your data outside Australia.'],
            ['text' => 'We ensure your personal data is protected by requesting all companies using the Open Booking Exchange Tourism Market technology to follow the same rules when processing your personal data. These rules are called “binding exchange rules”.'],
            ['text' => '7.2. Many of our external third parties are based outside Australia, so their processing of your personal data will involve a transfer of data outside Australia.'],
            ['text' => '7.3. Whenever we transfer your personal data out of Australia, we ensure a similar degree of protection is afforded to it by implementing the following safeguard: we will only transfer your personal data to countries that have been deemed to provide an adequate level of protection for personal data by Australia.'],
            ['text' => '7.4. Please contact us if you want further information on the specific mechanism used by us when transferring your personal data out of Australia.'],
        ],
    ],
    [
        'title' => '8. Security of your personal information',
        'content' => [
            ['text' => '8.1. Vcubed Pty Ltd is committed to ensuring that the information you provide to us is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure information and protect it from misuse, interference, loss and unauthorised access, modification and disclosure.'],
            ['text' => '8.2. The transmission and exchange of information is carried out at your own risk. We cannot guarantee the security of any information that you transmit to us or receive from us. Although we take measures to safeguard against unauthorised disclosures of information, we cannot assure you that personal information that we collect will not be disclosed in a manner that is inconsistent with this Privacy Policy.'],
        ],
    ],
    [
        'title' => '9. Access to your personal information',
        'content' => [
            ['text' => '9.1. You may request details of personal information that we hold about you in accordance with the provisions of the Privacy Act 1988. In rare circumstances, a small administrative fee may be payable for the provision of information. If you would like a copy of the information we hold about you, or believe that any information we hold about you is inaccurate, out of date, incomplete, irrelevant or misleading, please email our Customer Service team at <a href="mailto:customerservice@v3leisure.com">customerservice@v3leisure.com</a>.'],
            ['text' => '9.2. We reserve the right to refuse to provide you with information that we hold about you in certain circumstances set out in the Privacy Act 1988.'],
        ],
    ],
    [
        'title' => '10. Complaints about privacy',
        'content' => [
            ['text' => '10.1. If you have any complaints about our privacy practices, please send details of your complaint to Customer Service at <a href="mailto:customerservice@v3leisure.com">customerservice@v3leisure.com</a>. We take complaints very seriously and will respond shortly after receiving written notice of your complaint.'],
        ],
    ],
    [
        'title' => '11. Changes to Privacy Policy',
        'content' => [
            ['text' => '11.1. Please be aware that we may change this Privacy Policy in the future. We may modify this Policy at any time, in our sole discretion, and all modifications will be effective immediately upon our posting of the modifications on our website or notice board. Please check back from time to time to review our Privacy Policy.'],
        ],
    ],
    [
        'title' => '12. TXA platform',
        'content' => [
            ['text' => '12.1. When you come to our platform (TXA), we may collect certain information such as browser type, operating system and the website visited immediately before coming to our site. This information is used in an aggregated manner to analyse how people use our site so that we can improve our service.'],
            ['text' => '12.2. We may from time to time use cookies on our website. Cookies are very small files which a website uses to identify you when you come back to the site and to store details about your use of the site. Cookies are not malicious programs that access or damage your computer. Most web browsers automatically accept cookies, but you can choose to reject cookies by changing your browser settings. However, this may prevent you from taking full advantage of our website. Our website may from time to time use cookies to analyse website traffic and help us provide a better website visitor experience. In addition, cookies may be used to serve relevant ads to website visitors through third-party services such as Google Ads. These ads may appear on this website or other websites you visit.'],
            ['text' => '12.3. Our site may from time to time have links to third-party websites not owned or controlled by us. These links are meant for your convenience only. Links to third-party websites do not constitute sponsorship, endorsement or approval of these websites. Please be aware that Vcubed Pty Ltd is not responsible for the privacy practices of other such websites. We encourage our users, when they leave our website, to read the privacy statements of every website that collects personal information.'],
        ],
    ],
    [
        'title' => '13. Data retention',
        'content' => [
            ['text' => '<strong>13.1. How long will you use my personal data for?</strong>'],
            ['text' => 'We will only retain your personal data for as long as reasonably necessary to fulfil the purposes we collected it for, including for the purposes of satisfying any legal, regulatory, tax, accounting or reporting requirements. We may retain your personal data for a longer period in the event of a complaint or if we reasonably believe there is a prospect of litigation in respect to our relationship with you.'],
            ['text' => 'To determine the appropriate retention period for personal data, we consider the amount, nature and sensitivity of the personal data, the potential risk of harm from unauthorised use or disclosure of your personal data, the purposes for which we process your personal data, whether we can achieve those purposes through other means, and the applicable legal, regulatory, tax, accounting or other requirements.'],
            ['text' => 'Details of retention periods for different aspects of your personal data are available in our Retention Policy, which you can request by contacting our Data Protection Officer (DPO).'],
        ],
    ],
    [
        'title' => '14. Your legal rights',
        'content' => [
            ['text' => '14.1. Under certain circumstances, you have rights under data protection laws in relation to your personal data to:'],
            ['type' => 'list', 'items' => [
                'Request access to your personal data.',
                'Request correction of your personal data.',
                'Request erasure of your personal data.',
                'Object to processing of your personal data.',
                'Request restriction of processing your personal data.',
                'Request transfer of your personal data.',
                'Withdraw consent.',
            ]],
            ['text' => 'If you wish to exercise any of the rights set out above, please submit your DSAR form.'],
            ['text' => '<strong>14.2. No fee usually required</strong>'],
            ['text' => 'You will not have to pay a fee to access your personal data or to exercise any of the other rights. However, we may charge a reasonable fee if your request is clearly unfounded, repetitive or excessive. Alternatively, we may refuse to comply with your request in these circumstances.'],
            ['text' => '<strong>14.3. What we may need from you</strong>'],
            ['text' => 'We may need to request specific information from you to help us confirm your identity and ensure your right to access your personal data or exercise any of your other rights. This is a security measure to ensure that personal data is not disclosed to any person who has no right to receive it. We may also contact you to ask for further information in relation to your request to speed up our response.'],
            ['text' => '<strong>14.4. Time limit to respond</strong>'],
            ['text' => 'We try to respond to all legitimate requests within one month. Occasionally it may take us longer than a month if your request is particularly complex or you have made a number of requests. In this case, we will notify you and keep you updated.'],
        ],
    ],
    [
        'title' => 'Contact TXA',
        'content' => [
            ['text' => '<strong>Tourism Exchange Australia</strong><br>3/8 Alvan Street<br>Subiaco, WA 6008<br>Australia<br><br><strong>Phone:</strong> <a href="tel:1300266582">1300 266 582</a><br><strong>Email:</strong> <a href="mailto:customerservice@txa.com.au">customerservice@txa.com.au</a> (<a href="mailto:sales@txa.com.au">sales@txa.com.au</a>)'],
        ],
    ],
];

get_template_part('template-parts/legal-page', null, [
    'label' => 'PRIVACY',
    'title' => 'Privacy Policy',
    'intro' => 'How TXA collects, uses, stores and protects your personal information.',
    'sections' => $sections,
]);

get_footer();
