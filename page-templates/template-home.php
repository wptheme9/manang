<?php
/**
*
*
* Template Name: Homepage
*
**/
get_header();
echo manang_cta_priary();
// get_template_part('template-parts/about');
manang_cta_secondary();
// get_template_part('template-parts/cta','sec');
manang_features_shortcode();
// get_template_part('template-parts/feature');
echo manang_portfolio_shortcode();
// get_template_part('template-parts/portfolio');
echo manang_counter_shortcode();
// get_template_part('template-parts/counter');
echo manang_testimonial_shortcode();
// get_template_part('template-parts/testimonial');
echo manang_team_shortcode();
// get_template_part('template-parts/team');
get_template_part('template-parts/subscribe');
echo manang_latest_blog_shortcode();
// get_template_part('template-parts/blog');
echo manang_clients_shortcode();
// get_template_part('template-parts/client');

 get_footer();