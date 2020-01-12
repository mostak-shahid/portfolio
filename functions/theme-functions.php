<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
/*Variables*/
$template_parts = array(
    'Enabled'  => array(
        'content' => 'Content Section',
    ),
    'Disabled' => array(
        'banner' => 'Home Banner',
        'sbanner' => 'Canvas Banner',
        'sbanner' => 'Canvas Banner',
        'about' => 'About Section',
        'service' => 'Service Section',
        'counter' => 'Counter Section',
        'work' => 'Work Section',
        'testimonial' => 'Testimonial Section',
        'contact' => 'Contact Section',

        'portfolio' => 'Portfolio Section',
        'blog' => 'Blog Section',
        'gallery' => 'Gallery Section',
        'team' => 'Team Member Section',
        
    ),
);
/*Variables*/