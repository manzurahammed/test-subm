<?php get_header(); ?>

	<section id="main-content" class="blog-page section-padding">
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
					?>
					<nav class="paging-navigation text-center mb-sm-40">
						<?php the_posts_pagination( array('prev_text' => __( '&laquo;', 'geo' ),'next_text' => __( '&raquo;', 'geo' ), 'mid_size' => 2,'screen_reader_text'=>' ' ) ); ?>
					</nav>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
