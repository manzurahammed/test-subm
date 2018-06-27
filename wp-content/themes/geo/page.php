<?php 
get_header();

	if(have_posts()):
		echo '<section id="main-content" class="section-padding">';
			echo '<div class="container"><div class="page-content">';
				while ( have_posts() ) : the_post();
					the_content();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			echo '</div></div>';
		echo '</section>';
	else:
		echo "<h2>".esc_html__('Not Found','geo')."</h2>";
	endif;
get_footer(); 

?>
