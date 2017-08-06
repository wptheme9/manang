<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package resortica
 */

get_header(); ?>
<div class="section-content page-not-found">
	<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <header class="page-header">
                    <h2>4<span>0</span>4</h2>
                    <h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'Manang' ); ?></h1>
                </header><!-- .page-header -->

				<div class=" content-list">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'Manang' ); ?></p>
				</div>
				<?php
					get_search_form();
				?>
			</div>
    	</div>
    </div>
</div>
<?php
get_footer();
