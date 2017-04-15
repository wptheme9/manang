<?php
/**
 * Social Icons
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'manang_social_integrateWithVC2' );
function manang_social_integrateWithVC2(){
    vc_map( array(
        "name"                    => __("Socail Icons", "manang"),
        "base"                    => "social_icons",
        "description"             => __("","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(
            array(
                "heading" => __("Style", 'manang') ,
                "param_name" => "social_style",
                "value" => array(
                    __("Style One", 'manang') => "style1",
                    __("Style Two", 'manang') => "style2",
                    __("Style Three", 'manang') => "style3",
                ) ,
                "type" => "dropdown"
            ),

            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Facebook URL", "manang"),
                "param_name"  => "social_fb",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Twitter URL", "manang"),
                "param_name"  => "social_twitter",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Google Plus URL", "manang"),
                "param_name"  => "social_google",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Dribble URL", "manang"),
                "param_name"  => "social_dribble",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Flickr URL", "manang"),
                "param_name"  => "social_flickr",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Pinterest URL", "manang"),
                "param_name"  => "social_pinterest",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Github URL", "manang"),
                "param_name"  => "social_github",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Linkedin URL", "manang"),
                "param_name"  => "social_linkedin",
            ),
            array(
                "type"        => "textfield",
                "holder" => "div",
                "heading"     => __("Youtube URL", "manang"),
                "param_name"  => "social_youtube",
            ),

            array(
                "heading" => __("Block Size", 'manang') ,
                "param_name" => "block_size",
                "value" => array(
                    __("Big", 'manang') => "social-icon-big",
                    __("Medium", 'manang') => "social-icon-med",
                    __("Small", 'manang') => "social-icon-small",
                ) ,
                "type" => "dropdown"
            ),
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_social_icons extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'social_style'  =>  'style1',
                'social_fb'  =>  'image',
                'social_twitter' => '',
                'social_google' => '',
                'social_dribble' => '',
                'social_flickr' => '',
                'social_pinterest' => '',
                'social_github' => '',
                'social_linkedin'  =>  '',
                'social_youtube' => '',
                'block_size' => 'social-icon-big',

            ), $atts ) ;
            $social_style = $values['social_style'];
            $social_fb = $values['social_fb'];
            $social_twitter = $values['social_twitter'];
            $social_google = $values['social_google'];
            $social_dribble = $values['social_dribble'];
            $social_flickr = $values['social_flickr'];
            $social_pinterest = $values['social_pinterest'];
            $social_github = $values['social_github'];
            $social_linkedin = $values['social_linkedin'];
            $social_youtube = $values['social_youtube'];
            $block_size = $values['block_size'];

            ob_start(); ?>
            <ul class="social-icon <?php echo esc_attr($social_style .' '.$block_size)?>">
                <?php if(!empty($social_fb)): ?>
                    <li>
                      <div class="facebook">
                        <a href="<?php echo esc_url($social_fb); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_twitter)): ?>
                    <li>
                      <div class="twitter">
                        <a href="<?php echo esc_url($social_twitter); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_google)): ?>
                    <li>
                      <div class="gplus">
                        <a href="<?php echo esc_url($social_google); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_dribble)): ?>
                    <li>
                      <div class="dribble">
                        <a href="<?php echo esc_url($social_dribble); ?>" target="_blank"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_flickr)): ?>
                    <li>
                      <div class="flickr">
                        <a href="<?php echo esc_url($social_flickr); ?>" target="_blank"><i class="fa fa-flickr" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_pinterest)): ?>
                    <li>
                      <div class="pinterest">
                        <a href="<?php echo esc_url($social_pinterest); ?>" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_github)): ?>
                    <li>
                      <div class="github">
                        <a href="<?php echo esc_url($social_github); ?>" target="_blank"><i class="fa fa-github-alt" aria-hidden="true"></i></a>
                      </div>
                    </li>
                <?php endif;
                if(!empty($social_linkedin)): ?>
                <li>
                  <div class="linkedin">
                    <a href="<?php echo esc_url($social_linkedin); ?>" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                  </div>
                </li>
                <?php endif;
                if(!empty($social_youtube)): ?>
                <li>
                  <div class="youtube">
                    <a href="<?php echo esc_url($social_youtube); ?>" target="_blank"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                  </div>
                </li>
            <?php endif; ?>
            </ul>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
