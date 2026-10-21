<?php
/**
 * Template Name: Terms of Use
 * @package TailPress
 */

if (!function_exists('txa_f')) {
    function txa_f(string $name, $default = '')
    {
        $value = function_exists('get_field') ? get_field($name) : null;
        return (null === $value || '' === $value || false === $value) ? $default : $value;
    }
}

$sections = [
    [
        'title' => 'Website Terms and Conditions',
        'content' => [
            ['text' => 'Access to and use of <a href="https://www.txa.com.au/">www.TXA.com.au</a> is provided on these terms and conditions by VCubed Pty Ltd (ACN 074 524 879) (“V3”) to facilitate the operation of the travel and leisure business collaborative established by V3. By accessing and using <a href="https://www.txa.com.au/">www.TXA.com.au</a>, you agree to abide by these terms and conditions. You may contact us at:'],
            ['text' => '<strong>VCubed Pty Ltd</strong><br>28 John Street<br>Northbridge, 6003 Western Australia<br><strong>Telephone:</strong> <a href="tel:+61892273933">+61 8 9227 3933</a><br><strong>Facsimile:</strong> +61 8 9227 3900<br><strong>Email:</strong> <a href="mailto:customerservice@v3leisure.com">customerservice@v3leisure.com</a>'],
        ],
    ],
    [
        'title' => 'Permitted Use',
        'content' => [
            ['text' => 'You must not use <a href="https://www.txa.com.au/">www.TXA.com.au</a>:'],
            ['type' => 'list', 'items' => [
                'For any activities, or to post or transmit any information or materials, which breach any regulations, infringe a third party’s rights, or are contrary to any relevant standard or codes.',
                'In a way, or to post or transmit any material, which interferes with other users or defames, threatens, menaces, offends or restricts any person, or which inhibits any other user from using or enjoying the website.',
                'To post, upload, email or otherwise transmit any unsolicited or unauthorised advertising, promotional materials, junk mail, spam, chain letters, pyramid schemes or any other form of solicitation or commercial exploitation.',
                'To make any fraudulent or speculative enquiries, bookings, reservations or requests.',
            ]],
            ['text' => 'You must not access <a href="https://www.txa.com.au/">www.TXA.com.au</a> by using another person’s name, username or password without permission.'],
            ['text' => 'You must not post or transmit via <a href="https://www.txa.com.au/">www.TXA.com.au</a> any obscene, indecent, inflammatory or pornographic material, or material that could give rise to civil or criminal proceedings.'],
            ['text' => 'You must not tamper with, hinder the operation of, or make unauthorised modifications to <a href="https://www.txa.com.au/">www.TXA.com.au</a>.'],
            ['text' => 'You must not knowingly transmit any virus or other disabling feature to <a href="https://www.txa.com.au/">www.TXA.com.au</a>.'],
        ],
    ],
    [
        'title' => 'Newsletters and Subscriptions',
        'content' => [
            ['text' => 'Where you register with <a href="https://www.txa.com.au/">www.TXA.com.au</a> or V3 Travel to receive newsletters by email or by any other means, or subscribe to receive copies of magazines or other publications by email, online download via a web browser or post:'],
            ['type' => 'list', 'items' => [
                'You agree to provide true, accurate, current and complete information about yourself as requested in the registration or subscription form (“the Registration Information”).',
                'You agree to maintain and promptly update the Registration Information to keep it true, accurate, current and complete.',
            ]],
        ],
    ],
    [
        'title' => 'Links',
        'content' => [
            ['text' => 'Some pages on the site include links to external websites. These links are included to give users the opportunity to access other pages that it is felt may be of assistance to them. V3 is not responsible for the content of these internet sites.'],
            ['text' => 'No links from external websites to the site are permitted without the prior written consent of V3.'],
        ],
    ],
    [
        'title' => 'Information on the Website',
        'content' => [
            ['text' => 'V3 makes reasonable efforts to ensure that information posted by V3 on the website is correct and up to date. However, V3 does not warrant the accuracy or completeness of that material and you should not rely on any information posted on the website without first making your own independent investigations and enquiries. All information is subject to change without notice.'],
            ['text' => 'Some pages on or in the website include material including, but not limited to, facts, opinions, editorial content, product and service descriptions and advertisements posted by third parties (“Material”). Such Material is the sole responsibility of the party posting the Material, reflects the opinions of the writers, is personal to them and is naturally subject to change from time to time.'],
            ['text' => 'Such Material is not independently checked or verified by V3 and should not be relied upon by you without first making your own independent investigations and enquiries. It is the responsibility of users to check the accuracy of the Material given on the website before entering into any commitments based upon it.'],
            ['text' => 'V3 makes no representation or warranty as to the accuracy of the Material or the quality or merchantability of the underlying goods and services, if any. To the fullest extent permitted by law, V3 accepts no responsibility for the content of Material posted by third parties on or in the website, including any error, omission or inaccuracy in the Material or any failure of the Material to comply with relevant legislation.'],
            ['text' => 'On some pages of the website you may be given the opportunity to enter into agreements with third parties, including but not limited to Strategic Alliance businesses identified on the website.'],
            ['text' => 'You enter into agreements with such third parties entirely at your own risk and in your absolute discretion. It is not a condition of this Acceptable Use Agreement, the Terms and Conditions for use of the Software, or the Software Licence that you agree to acquire goods and services from Strategic Alliance businesses or any third party identified on or accessed directly or indirectly via the website.'],
            ['text' => 'V3 is not liable in relation to, and takes no responsibility for, any contract entered into by you with third parties by using the website or accessed directly or indirectly via the website, including but not limited to contracts entered into with Strategic Alliance businesses.'],
            ['text' => 'V3 makes no warranty or representation whatsoever as to the business reputation, credit rating, standards of service delivery or quality, including but not limited to delivery or performance times, or the adequacy, standards of workmanship or fitness for purpose of any underlying goods or services acquired directly or indirectly from a third party. This includes Strategic Alliance businesses, whether included on the website or accessed by means of a link from the website, and the ability of any such third party to deliver goods and services in accordance with product and service descriptions or otherwise as to the quality or merchantability of any goods and services purchased, obtained or offered to you through use of the website.'],
            ['text' => 'V3 has the right at any time and for any reason to remove from the pages on the website any material posted, uploaded, emailed or otherwise transmitted by you without advance notice. V3 shall not be liable for any losses or damages whatsoever arising from the removal of such material at any time.'],
            ['text' => 'V3 has the right to refuse to allow you access to any pages of the website at any time and for any reason without advance notice. V3 shall not be liable for any losses or damages whatsoever arising from the failure to allow you access to such material at any time.'],
        ],
    ],
    [
        'title' => 'Competitions and Special Offers',
        'content' => [
            ['text' => 'The website may from time to time include competitions, prize draws or other promotions and offers. These will be subject to additional terms and conditions that will be made known to you.'],
        ],
    ],
    [
        'title' => 'Copyright, Trademark and Intellectual Property Protection',
        'content' => [
            ['text' => 'The material and content provided on the website is for your personal, non-commercial use only, except where otherwise expressly provided. You agree not to distribute or commercially exploit such material or content, either yourself or through or by way of assistance to any third party.'],
            ['text' => 'Except as otherwise expressly indicated, all materials on this website, including but not limited to photographs, price lists, inventories, product or service descriptions, statistics, results, graphs, logos, other images, illustrations, text, video clips and written and other materials, are protected by copyrights, trademarks and/or other intellectual property rights owned by V3 or used with the permission of their owners by V3.'],
            ['text' => 'Where material is owned by a third party, it is your responsibility to obtain any licences and permissions that may be required to use such material. You agree to repay V3 on demand for any costs and expenses incurred by V3 as a result of your failure to obtain such licences or permissions.'],
            ['text' => 'Subject to the terms of this section, you may make a copy of this content for your personal, non-commercial use on the condition that you keep all copyright and other proprietary notices intact. You agree not to modify, copy, reproduce, republish, disassemble, reverse engineer, upload, post, transmit or distribute by any means or in any manner any material or information on or downloaded from the site, including but not limited to text, graphics, video, messages, code and/or software, without our prior written consent.'],
            ['text' => 'No right, title or interest in any material or software is transferred to you as a result of your use of the website or any permitted downloading or copying.'],
        ],
    ],
    [
        'title' => 'Contact TXA',
        'content' => [
            ['text' => '<strong>Tourism Exchange Australia</strong><br>3/8 Alvan Street<br>Subiaco, WA 6008<br>Australia<br><br><strong>Phone:</strong> <a href="tel:1300266582">1300 266 582</a><br><strong>Email:</strong> <a href="mailto:customerservice@txa.com.au">customerservice@txa.com.au</a> (<a href="mailto:sales@txa.com.au">sales@txa.com.au</a>)'],
        ],
    ],
];

$default_body = '';
foreach ($sections as $section) {
    $default_body .= '<h2>' . $section['title'] . '</h2>' . "\n";
    foreach ($section['content'] as $item) {
        if ('list' === ($item['type'] ?? 'paragraph')) {
            $list_items = array_map(static fn (string $li): string => '<li>' . $li . '</li>', $item['items']);
            $default_body .= '<ul>' . "\n" . implode("\n", $list_items) . "\n</ul>" . "\n";
        } else {
            $default_body .= '<p>' . $item['text'] . '</p>' . "\n";
        }
    }
    $default_body .= "\n\n";
}

$body = txa_f('terms_body', trim($default_body));

add_filter('pre_get_document_title', fn(): string => (string) txa_f('terms_seo_title', 'Terms of Use | Tourism Exchange Australia'));
add_action('wp_head', function (): void {
    if (is_page('terms-of-use') || is_page_template('page-terms-of-use.php')) {
        echo '<meta name="description" content="' . esc_attr(strip_tags(txa_f('terms_seo_description', 'Read the terms and conditions that apply when using the Tourism Exchange Australia website.'))) . '">' . "\n";
    }
});

get_header();

get_template_part('template-parts/legal-page', null, [
    'label' => txa_f('terms_hero_label', 'LEGAL'),
    'title' => txa_f('terms_hero_title', 'Terms of Use'),
    'intro' => txa_f('terms_hero_intro', 'The terms and conditions that apply when using the Tourism Exchange Australia website.'),
    'body' => $body,
]);

get_footer();
