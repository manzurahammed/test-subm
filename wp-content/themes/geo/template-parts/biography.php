<?php

$geo_author_bio_avatar_size = apply_filters( 'geo_author_bio_avatar_size', 90 );
$geo_author_data = get_the_author_meta( 'description' );
if($geo_author_data !='') {
	
?>
<div class="post-author">
	<div class="post-author-img">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), $geo_author_bio_avatar_size ); ?>
	</div>
	<div class="post-author-info">
		<h6 class="author">
			<?php echo get_the_author(); ?>
		</h6>
		<p><?php the_author_meta( 'description' ); ?></p>
	</div>
	<div class="clearfix"></div>
</div>
<?php
}
?>
