<?php 

/* 

Template Name: VC Home Dark Page

*/

get_header('dark');

	if(have_posts()):
		echo '<section id="main-content">';
			echo '<div class="container">';
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			echo '</div>';
		echo '</section>';
	else:
		echo "<h2>".esc_html__('Not Found','geo')."</h2>";
	endif;
get_footer(); 

?>
