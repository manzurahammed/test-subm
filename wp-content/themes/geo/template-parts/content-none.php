<article id="post-<?php the_ID(); ?>" <?php post_class("single-post m-bottom-30"); ?>>
	<div class="post-content">	
		<div class="entry"> 
			<h2 class="title-404"><?php esc_html_e( 'Nothing Found', 'geo' ); ?></h2>
			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'geo' ); ?></p>
			<?php get_search_form(); ?>
		</div>
	</div>
</article>