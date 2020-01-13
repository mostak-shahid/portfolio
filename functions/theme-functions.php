<?php
function mos_home_url_replace($data) {
    $replace_fnc = str_replace('home_url()', home_url(), $data);
    $replace_br = str_replace('{{home_url}}', home_url(), $replace_fnc);
    return $replace_br;
}
function mos_post_details($type='post'){
    $output = array();
    $args = array(
        'post_type' => $type,
        'posts_per_page' => -1,
    );
    $query = new WP_Query( $args );     
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            $output[get_the_ID()] = get_the_title();
        endwhile;
    endif;
    wp_reset_postdata();    
    return $output;
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