<?php get_header(); ?>

	<div id="main-content" class="blog-page section-padding">
		<div class="container">
			<div class="row">
				<!-- page content start -->
				<div class="col-lg-9 col-md-8 col-sm-12">
					<?php 
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								get_template_part( 'template-parts/content', get_post_format());
							endwhile;
						else:
							get_template_part( 'template-parts/content', 'none' );
						endif;
						
						if(comments_open() || get_comments_number()) {
							comments_template();
						}
					?>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
