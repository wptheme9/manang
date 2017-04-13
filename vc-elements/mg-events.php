<?php
/**
 * Event Timeline
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_events_integrateWithVC' );
function manang_events_integrateWithVC(){
    vc_map(array(
        "name" => __("Events", "manang") ,
        "base" => "manang_events_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Event Elements.', 'manang') ,
        "params" => array(
            array(
                "param_name" => "style",
                "heading" => __("Style", 'manang') ,
                "description" => __("", 'manang') ,
                "value" => array(
                    __("List", 'manang') => "style1",
                    __("Slider", 'manang') => "slider-style"
                ) ,
                "type" => "dropdown"
            ) ,
            array(
                "param_name" => "number_events",
                "heading" => __("Number Of Events To Be Displayed", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_events_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'style'  => 'style1',
                            'number_events' => '',
                            ),$atts);
               $style = $values['style'];
               $number_events = $values['number_events'];
               $posts_per_page = (empty($number_events)?-1:$number_events);
                ob_start();
                $events_argument = array(
                    'post_type'      => 'event',
                    'post_status'    => 'publish',
                    'posts_per_page' => $posts_per_page,
                    'orderby'        => 'menu_order date',
                    'order'          => 'desc',
                );
                $events_query = new WP_Query($events_argument);
                if($events_query->have_posts()):

                switch($style){
                        case('style1'): ?>
                        <div class="mg-event style1">
                            <ul>
                                <?php while($events_query->have_posts()):
                                    $events_query->the_post();
                                        $start_date = get_post_meta(get_the_id(), 'manang_basecamp_event_start_date', true);
                                        $end_date = get_post_meta(get_the_id(), 'manang_basecamp_event_end_date', true);
                                        $start_time = get_post_meta(get_the_id(), 'manang_basecamp_event_start_time', true);
                                        $end_time = get_post_meta(get_the_id(), 'manang_basecamp_event_end_time', true);
                                        $ticket_price = get_post_meta(get_the_id(), 'manang_basecamp_event_ticket_price', true);
                                        $category = get_post_meta(get_the_id(), 'manang_basecamp_event_category', true);
                                        $location = get_post_meta(get_the_id(), 'manang_basecamp_event_location', true);
                                        $button_text = get_post_meta(get_the_id(), 'manang_basecamp_event_button_text', true);
                                        $button_link = get_post_meta(get_the_id(), 'manang_basecamp_event_button_link', true);
                                        $organizers = get_post_meta(get_the_id(), 'manang_basecamp_event_organizers', true);

                                        $events_image_id = get_post_thumbnail_id();
                                        $events_image_url = wp_get_attachment_image_src( $events_image_id, 'full' );
                                        $orderdate = explode('-', $start_date);
                                        $dateArray = date_parse_from_format('m-d-Y', $start_date);
                                        $month = $dateArray['month'];
                                        $day = $dateArray['day'];
                                        $year = $dateArray['year'];
                                        $year_check = (!empty($year)?','.$year:'');
                                        $end_time_check = (!empty($end_time)?' - '.$end_time:''); ?>
                                        <li>
                                            <div class="row">
                                                 <div class="col-sm-6 col-md-2">
                                                    <?php if(!empty($start_date)): ?>
                                                        <div class="event-date">
                                                            <p><?php echo esc_html($day); ?><span><?php echo esc_html($month . $year_check); ?></span></p>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-sm-3 col-md-5">
                                                    <div class="event-thumb">
                                                        <img src="<?php echo esc_url($events_image_url[0]); ?>">
                                                    </div>
                                                    <div class="event-title">
                                                        <?php the_title( '<h3>', '</h3>' ); ?>
                                                        <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-6 col-md-3">
                                                    <div class="event-location">
                                                        <p class="location"><?php echo esc_html($location); ?></span></p>
                                                        <p><?php echo esc_html($start_time . $end_time_check); ?></p>
                                                    </div>
                                                </div>
                                                <?php if(!empty($button_text) && !empty($button_link)): ?>
                                                     <div class="col-sm-6 col-md-1">
                                                        <a href="<?php echo esc_url($button_link); ?>" class="btn btn-default"><?php echo esc_html($button_text); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </li>
                                    <?php endwhile;
                                wp_reset_postdata(); ?>
                            </ul>
                        </div>
                        <?php break;

                        case('slider-style'); ?>
                        <div class="mg-event-wrap slider-style">
                            <?php while($events_query->have_posts()):
                                    $events_query->the_post();

                                    $start_date = get_post_meta(get_the_id(), 'manang_basecamp_event_start_date', true);
                                    $end_date = get_post_meta(get_the_id(), 'manang_basecamp_event_end_date', true);
                                    $start_time = get_post_meta(get_the_id(), 'manang_basecamp_event_start_time', true);
                                    $end_time = get_post_meta(get_the_id(), 'manang_basecamp_event_end_time', true);
                                    $ticket_price = get_post_meta(get_the_id(), 'manang_basecamp_event_ticket_price', true);
                                    $category = get_post_meta(get_the_id(), 'manang_basecamp_event_category', true);
                                    $location = get_post_meta(get_the_id(), 'manang_basecamp_event_location', true);
                                    $button_text = get_post_meta(get_the_id(), 'manang_basecamp_event_button_text', true);
                                    $button_link = get_post_meta(get_the_id(), 'manang_basecamp_event_button_link', true);
                                    $organizers = get_post_meta(get_the_id(), 'manang_basecamp_event_organizers', true);

                                    $events_image_id = get_post_thumbnail_id();
                                    $events_image_url = wp_get_attachment_image_src( $events_image_id, 'full' );
                                    $orderdate = explode('-', $start_date);
                                    $dateArray = date_parse_from_format('m-d-Y', $start_date);
                                    $month = $dateArray['month'];
                                    $day = $dateArray['day'];
                                    $year = $dateArray['year'];
                                    $year_check = (!empty($year)?','.$year:'');
                                    $end_time_check = (!empty($end_time)?' To '.$end_time:'');  ?>
                                    <div class="mg-event style2">
                                        <div class="event-wrap" style="background-image:url(<?php echo esc_url($events_image_url[0]); ?>);">
                                        </div>
                                        <div class="event-desc-wrap">
                                            <div class="event-desc">
                                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></h3>

                                                  <span class="event-day">
                                                        <p><span><?php echo esc_html($day); ?></span><?php echo esc_html($month . $year_check); ?></p>
                                                  </span>
                                                <div class="event-meta">
                                                    <?php if(!empty($location)): ?>
                                                        <span class="event-loc">
                                                              <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                              <div class="event-loc-detail">
                                                                <h4>Event Arena</h4>
                                                                <p><?php echo esc_html($location); ?></p>
                                                              </div>
                                                        </span>
                                                    <?php endif; ?>
                                                    <span class="event-time">
                                                        <i class="fa fa-clock-o"></i>
                                                        <div class="event-time-detail">
                                                            <h4>Event Time</h4>
                                                            <p><?php echo esc_html($start_time . $end_time_check); ?></p>
                                                        </div>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="event-footer">
                                                <p><?php echo manang_get_excerpt(get_the_id(),200); ?></p>
                                                <?php if(!empty($button_text) && !empty($button_link)): ?>
                                                    <a href="<?php echo esc_url($button_link); ?>" class="btn btn-default"><?php echo esc_html($button_text); ?></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>
                        <?php break;
                    }
                endif; ?>

                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
