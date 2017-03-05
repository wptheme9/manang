<?php
/**
 * Service
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'cc_call_to_action_integrateWithVC' );
function cc_call_to_action_integrateWithVC(){
    vc_map( array(
        "name"                    => __("CC Call to Action Button", "carpet-court"),
        "base"                    => "cc_call_to_action",
        "description"             => __("Display a button along with text.","carpet-court"),
        "category"                => __('Manang', 'carpet-court'),
        "params"                  => array(
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Enter Description Text", "carpet-court"),
                "param_name"  => "description_text",
            ),
            array(
                "type"        => "textarea",
                "holder" => "div",
                "heading"     => __("Enter Button Text", "carpet-court"),
                "param_name"  => "description_service",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Enter Link", "carpet-court"),
                "param_name"  => "button_link",
            ),
            array(
                "type"        => "textfield",
                "heading"     => __("Enter text", "carpet-court"),
                "param_name"  => "button_text",
            ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_cc_call_to_action extends WPBakeryShortCode {

        protected function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'description_text'  =>  '',
                'button_text'  =>  '',
                'description_service'  =>  '',
                'button_link' => 'javascript:void(0)',
            ), $atts ) ;
            ob_start();
            ?>
            <div class="fancybox-sec">
                <div class="container-fluid">
                    <div class="row">
                        <div class="fancybox-wrapper" data-aos="fade">
                            <div class="fancybox-item">
                                <h3><?php echo $values['description_text'];?></h3>
                                <p><?php echo $values['description_service'];?></p>
                                <a class="readmore" href="<?php echo $values['button_link'];?>"><?php echo $values['button_text'];?><span class="ion-arrow-right-a"></span></a>
                                <i class="ion-lightbulb"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
