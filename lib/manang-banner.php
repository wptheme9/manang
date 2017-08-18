<?php
if ( ! function_exists ( 'manang_slider_default_query' ) ) {
  function manang_slider_default_query($atts=array()){
        extract(shortcode_atts( array(
            'number_posts' => '',
            ), $atts ));
        $posts_number = ($number_posts?$number_posts:-1);
        $slider_arg = array(
                'post_type'     => 'manang-slider',
                'post_per_page' => $posts_number,
                'post_status'   => 'publish',
                'orderby'       => 'menu_order',
                'order'         => 'desc',
        );
        $slider_query = new WP_Query($slider_arg);
         ob_start();
        if($slider_query->have_posts()):
            $banner_option = manang_options();
            $cover_banner = $banner_option['cover_banner'];
            $banner_default = ($cover_banner == false?'banner-default':'cover-banner'); ?>
            <section class="cp-banner-sec <?php echo sanitize_html_class($banner_default); ?>">
                <div id="myCarousel" class="carousel slide cp-carousel" data-ride="carousel">
                      <?php
                      global $post;
                      $count = 0;
                      $class_active="active";
                      ?>
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <?php
                            while($slider_query->have_posts()):
                              $slider_query->the_post();
                              $slider_text1 = get_post_meta( $post->ID, 'slider_text1', true );
                              $slider_link1 = get_post_meta( $post->ID, 'slider_link1', true );
                              $slider_text2 = get_post_meta( $post->ID, 'slider_text2', true );
                              $slider_link2 = get_post_meta( $post->ID, 'slider_link2', true );
                              $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full');
                              $url = $image_src[0];
                              ?>
                                  <div class="item <?php echo  sanitize_html_class($class_active) ?>" style="background-image: url('<?php echo  esc_url($url); ?>');">
                                    <div class="carousel-caption">
                                        <h3 class="animated fadeInRight"><?php the_title(); ?></h3>
                                        <p><?php echo wp_kses_post(manang_get_excerpt($post->ID,100)); ?></p>
                                            <div class="btn-group btn-group-wrap animated fadeInLeft">
                                                <?php if(!empty($slider_text1) && !empty($slider_link1)){ ?>
                                                    <a class="btn btn-default" href="<?php echo esc_url($slider_link1); ?>" role="button" tabindex="0"><?php echo esc_html($slider_text1); ?></a>
                                                <?php
                                                }
                                                if(!empty($slider_text2) && !empty($slider_link2)){ ?>
                                                      <a class="btn btn-default margin-left" href="<?php echo esc_url($slider_link2); ?>" role="button" tabindex="0"><?php echo esc_html($slider_text2); ?></a>
                                                <?php } ?>
                                            </div>
                                    </div>
                                  </div>
                              <?php
                             $class_active="";
                             $count++;
                            endwhile;
                             wp_reset_postdata();
                             ?>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e( 'Previous', 'manang' ); ?></span>
                      </a>
                      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only"><?php esc_html_e( 'Next', 'manang' ); ?></span>
                      </a>
                      <!-- Indicators -->

                      <ol class="carousel-indicators">
                        <?php
                        for($i=0; $i<$count; $i++){ ?>
                           <li data-target="#myCarousel" data-slide-to="<?php echo esc_html($i); ?>"></li>
                         <?php } ?>
                      </ol>
                </div>
            </section>
        <?php
        endif;
        return ob_get_clean();
  }
  add_shortcode( 'slider_default', 'manang_slider_default_query' );
}

if(!function_exists('manang_single_image_banner')):
    function manang_single_image_banner($atts=array()){
        extract(shortcode_atts( array(
            'title' => '',
            'description' => '',
            'button_text' => '',
            'button_link' => '',
            'image_url' => '',
            ), $atts ));

        $banner_option = manang_options();
        $slider_image_title = (empty($title)?$banner_option['slider_image_title']:$title);
        $slider_image_description = (empty($description)?$banner_option['slider_image_description']:$description);
        $slider_image_text = (empty($button_text)?$banner_option['slider_image_text']:$button_text);
        $slider_image_link = (empty($button_link)?$banner_option['slider_image_link']:$button_link);
        $slider_image_url = (empty($image_url)?$banner_option['upload_banner_image']:$image_url);
        $cover_banner = $banner_option['cover_banner'];
         ob_start(); ?>
        <div class="mg-banner-wrapper parallax">
            <div class="container">
                <div class="row">
                    <div class="banner-text-wrap">
                        <?php
                                if(!empty($slider_image_title)){
                                        echo '<h2>'.esc_html($slider_image_title).'</h2>';
                                }
                                if(!empty($slider_image_description)){
                                        echo '<p>'. wp_kses_post($slider_image_description).'</p>';
                                }?>
                        <a href="<?php echo esc_url($slider_image_link); ?>" class="btn btn-default"><?php echo esc_html($slider_image_text); ?></a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    return ob_get_clean();
    }
    add_shortcode( 'single_image_banner', 'manang_single_image_banner' );
endif;

if(!function_exists('manang_banner_video')):
    function manang_banner_video($atts=array()){
        extract(shortcode_atts( array(
            'title' => '',
            'description' => '',
            'button_text' => '',
            'button_link' => '',
            'video_url' => '',
            ), $atts ));

        $banner_option = manang_options();
        $slider_video_title = (empty($title)?$banner_option['slider_video_title']:$title);
        $slider_video_description = (empty($description)?$banner_option['slider_video_description']:$description);
        $slider_video_text = (empty($button_text)?$banner_option['slider_video_text']:$button_text);
        $slider_video_link = (empty($button_link)?$banner_option['slider_video_link']:$button_link);
        $uploaded_video_url = (empty($video_url)?$banner_option['upload_banner_video']:$video_url);
        $upload_banner_video_preview_image = esc_url($banner_option['upload_banner_video_preview_image']);
        $banner_preview_content = ($upload_banner_video_preview_image?$upload_banner_video_preview_image:"''");
        $cover_banner = $banner_option['cover_banner'];
        $banner_default = ($cover_banner == false?'banner-default':'cover-banner');
        $banner_video_audio = ($banner_option['banner_video_audio'] == 1?'true':'false');
        ob_start();
        ?>
    <!-- Start of Video Background wrapper -->
     <section class="cp-banner-sec <?php echo esc_attr($banner_default); ?>">
        <div id="block" class="videobg-wrapper" data-vide-bg="mp4:  <?php echo esc_url($uploaded_video_url); ?>, webm: <?php echo esc_url($uploaded_video_url); ?>, ogv: <?php echo esc_url($uploaded_video_url); ?>,poster:<?php echo $banner_preview_content; ?>" data-vide-options="muted: <?php echo esc_attr($banner_video_audio); ?>,position: 0% 50%">

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 banner-text-wrap">
                        <div class="videobg-text-wrapper">
                            <?php
                            if(!empty( $slider_video_title )){
                                echo '<h2>'.esc_html($slider_video_title).'</h2>';
                            }
                            if(!empty( $slider_video_description )){
                                echo '<p>'.wp_kses_post($slider_video_description).'</p>';
                            }
                            if( !empty($slider_video_text) && !empty($slider_video_link )){ ?>
                                 <div class="btn-group btn-group-wrap">
                                <a class="btn btn-default" href="<?php echo esc_url($slider_video_link); ?>" role="button" tabindex="0"><?php echo esc_html($slider_video_text); ?></a>
                                <!-- <a class="btn btn-primary" href="" role="button" tabindex="0">Read More</a> -->
                            </div>
                            <?php
                            }
                            ?>
                        </div><!-- End of Video text wrapper -->
                    </div>
                    <a class="down-arrow" data-scroll href="#content">
                        <i class="fa fa-angle-down animated-slow infinite bounce"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Video background wrapper -->
    <?php
    return ob_get_clean();
}
add_shortcode( 'video_banner', 'manang_banner_video' );
endif;