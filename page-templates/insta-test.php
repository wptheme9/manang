
<?php
/**
*
* Template Name: Insta
*
***/
get_header();

            $username = 'football';
            $add_text = 'Add text';
            $image_count = 10;
            $limit = empty( $image_count ) ? 9 : $image_count;


            ob_start();
            if ( $username != '' ) {
                $media_array = scrape_instagram( $username );
                // echo '<pre>';
                // print_r($media_array);
                // echo '</pre>';
                if ( is_wp_error( $media_array ) ) {
                    echo wp_kses_post( $media_array->get_error_message() );
                } else {

                    // filter for images only?
                    if ( $images_only = apply_filters( 'manang_images_only', FALSE ) ) {
                        $media_array = array_filter( $media_array, array( $this, 'images_only' ) );
                    }
                    // slice list down to required limit
                    $media_array = array_slice( $media_array, 0, $limit );
                    $media_array = '';
                    if(!empty($media_array)): ?>
                       <section class="section instagram">
                            <div class="instagram-slider">
                                <h4><?php echo esc_html($add_text); ?></h4>
                                <div class="instagram-wrap">
                                    <?php foreach ( $media_array as $item ) { ?>
                                                 <div class="insta-img">
                                                    <img src="<?php echo esc_url( $item['large'] ) ?>" alt="">
                                                </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </section>
                    <?php endif; ?>

                    <?php
                }
            }
get_footer();