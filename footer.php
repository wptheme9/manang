<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Manang
 */

?>

	</div>
	<footer>
    <?php $manang_options = manang_options();
    $footer_text = $manang_options['footer_text'];
    $developed_by = $manang_options['developed_by_text'];
    get_template_part( 'template-parts/manang','prefooter' ); ?>

    <div class="botfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <h3><?php echo esc_html( $footer_text); ?></h3>
                        <p><?php echo esc_html( $developed_by); ?></p>
                        <ul class="footer_social">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="gplus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
