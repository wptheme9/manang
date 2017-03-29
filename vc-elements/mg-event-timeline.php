<?php
/**
 * Event Timeline
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */

add_action( 'vc_before_init', 'manang_event_timeline_integrateWithVC' );
function manang_event_timeline_integrateWithVC(){
    vc_map(array(
        "name" => __("Event Timeline", "manang") ,
        "base" => "manang_event_timeline_vc",
        "category" => __('Manang', 'manang') ,
        'icon' => 'icon-mk-icon-box vc_mk_element-icon',
        'description' => __('Event Timeline Elements.', 'manang') ,
        "params" => array(
            array(
                "param_name" => "start_date",
                "heading" => __("Start Date", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
            array(
                "param_name" => "end_date",
                "heading" => __("End Date", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
            array(
                "param_name" => "title",
                "heading" => __("Enter Title", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
            array(
                "param_name" => "sub_title",
                "heading" => __("Enter Subtitle", "manang") ,
                "value" => "",
                "type" => "textfield",
            ) ,
            array(
                "param_name" => "description",
                "heading" => __("Enter Description", "manang") ,
                "value" => "",
                "type" => "textarea",
            ) ,
        ),
    ));
    if(class_exists('WPBakeryShortCode')){
        class WPBakeryShortCode_manang_event_timeline_vc extends WPBakeryShortCode {

            protected function content( $atts, $content = null ) {

               $values =  shortcode_atts( array(
                            'start_date'    => '',
                            'end_date'      => '',
                            'title'         => '',
                            'sub_title'     => '',
                            'description'   => '',
                            ),$atts);
               $start_date = $values['start_date'];
               $end_date = $values['end_date'];
               $title = $values['title'];
               $sub_title = $values['sub_title'];
               $description = $values['description'];

                ob_start(); ?>
                    <ul class="timeline">
                        <li>
                            <p class="timeline-date"><?php echo esc_html($start_date .' - '.$end_date) ?></p>
                            <div class="timeline-content">
                                <h3><?php echo esc_html($title) ?></h3>
                                <h5><?php echo esc_html($sub_title) ?></h5>
                                <p><?php echo esc_html($description) ?></p>
                            </div>
                        </li>
                    </ul>
                <?php $output = ob_get_clean();
                return $output;
            }
        }
    }
}
