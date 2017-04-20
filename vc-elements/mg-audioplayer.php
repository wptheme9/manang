<?php
/**
 * Audioplayer
 *
 *
 * @package Manang
 * @since Manang 1.0.0
 */
?>
<?php
add_action( 'vc_before_init', 'manang_audioplayer_integrateWithVC2' );
function manang_audioplayer_integrateWithVC2(){
    if(!function_exists('manang_get_music_categories_select')):
        function manang_get_music_categories_select() {
            $manang_cat = get_terms( array(
                'taxonomy' => 'music_category',
                'hide_empty' => false,
            ) );
            $results=array();
            $results['Select category'] = "";
            if(! empty( $manang_cat ) && ! is_wp_error( $manang_cat ) ):
                foreach ( $manang_cat as $term ) {
                    $results[$term->name] = $term->term_id;
                }
             endif;
            return $results;
        }
    endif;
    vc_map( array(
        "name"                    => __("Audioplayer", "manang"),
        "base"                    => "audioplayer",
        "description"             => __("","manang"),
        "category"                => __('Manang', 'manang'),
        "params"                  => array(

            array(
                "type" => "textfield",
                "heading" => __("No of Posts to Show", "manang") ,
                "param_name" => "number_post",
                "value" => "",
            ) ,
            array(
                "type" => "dropdown",
                "heading" => __("Choose Category", "manang") ,
                "param_name" => "music_category",
                "description" => __("This option will display only the selected categories.", "manang") ,
                "value" => manang_get_team_categories_select(),
            ) ,
        ),
    ) );
}
if(class_exists('WPBakeryShortCode')){
    class WPBakeryShortCode_audioplayer extends WPBakeryShortCode {

        public function content( $atts, $content = null ) {
            $values = shortcode_atts( array(
                'music_category'  =>  '',
                'number_post' => '',

            ), $atts ) ;
            $music_category = $values['music_category'];
            $posts_per_page = (empty($values['number_post'])?-1:$values['number_post']);
            $tax_query = '';
            if($music_category!=''){
                $tax_query[] =  array(
                    'taxonomy' => 'team_category',
                    'field' => 'term_id',
                    'terms' => $music_category,
                );
            }


            ob_start(); ?>
             <?php $args = array(
                'post_type' => 'music',
                'posts_per_page' => $posts_per_page,
                'post_status' =>'publish',
                'order' => 'desc',
                'orderby' => 'menu_order date',
                'tax_query' => $tax_query,
                );
            $query = new WP_query($args);
            if($query->have_posts()): ?>
                <!-- Start of upcoming concert section -->
                <div class="section">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="sl-playlist">
                                <div class="jAudio--player">
                                    <audio></audio>
                                    <div class="jAudio--thumb"></div>
                                  <div class="jAudio--ui">

                                    <div class="jAudio--status-bar">
                                      <div class="jAudio--volume-bar"></div>

                                      <div class="jAudio--progress-bar">
                                        <div class="jAudio--progress-bar-wrapper">
                                          <div class="jAudio--progress-bar-played">
                                            <span class="jAudio--progress-bar-pointer"></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="jAudio--time">
                                        <span class="jAudio--time-elapsed">00:00</span>
                                        <span class="jAudio--time-total">00:00</span>
                                      </div>
                                    <div class="jAudio--controls">
                                    <ul>
                                      <li><button class="btn" data-action="prev" id="btn-prev"><i class="fa fa-backward" aria-hidden="true"></i></button></li>
                                      <li><button class="btn" data-action="play" id="btn-play"><i class="fa fa-play" aria-hidden="true"></i></button></li>
                                      <li><button class="btn" data-action="next" id="btn-next"><i class="fa fa-forward" aria-hidden="true"></i></button></li>
                                    </ul>
                                  </div>
                                    </div>

                                  </div>


                                  <div class="jAudio--playlist">
                                  </div>
                                </div>

                            </div><!--slplaylist end-->
                        </div>
                    </div>
                </div>


                <?php $count = 0;
                    $array_guid = array();
                    $array_title = array();
                    $array_image = array();
                while($query->have_posts()) : $query->the_post();


                        $blog_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                        if(!empty($blog_image)){
                            $blog_image_url = $blog_image[0];
                        }
                        else{
                            $blog_image_url = '';
                        }
                         $audios = get_attached_media( 'audio');
                         if (count($audios) > 0) {
                            foreach($audios as $audio) {
                                    $array_guid[$count] = esc_html($audio->guid);
                                    $array_title[$count] = esc_html($audio->post_title);
                                    $array_image[$count] = esc_html($audio->blog_image_url);
                                    $count++;
                            }

                        }
                endwhile;
                wp_reset_postdata(); ?>
                 <script type="text/javascript">
                    var n = <?php echo $count ?>;
                    var i = 0;
                    var myarray = [];
                    var array_guid = [];
                    var array_title = [];
                    var array_image = [];
                    var array_guid = <?php echo json_encode($array_guid); ?>;
                    var array_title = <?php echo json_encode($array_title); ?>;
                    var array_image = <?php echo json_encode($array_image); ?>;
                    for(i=0; i < n; i++) {
                      array_guid[i]  = array_guid[i];
                      array_title[i] = array_title[i];
                      array_image[i] = array_image[i];
                        myarray.push({
                            file: array_guid[i],
                            trackName: array_title[i],
                            thumb: array_image[i],
                            trackArtist: '',
                        });
                    }

                    jQuery(".jAudio--player").jAudio({
                      playlist:myarray,
                        swfPath: "",
                        supplied: "OGA, MP3",
                        useStateClassSkin: true,
                        autoBlur: false,
                        smoothPlayBar: true,
                    });

                </script>


            <!-- End of blog section -->
            <?php endif; ?>
            <?php
            $output = ob_get_clean();
            ob_flush();
            return $output;
        }
    }
}
