<article id="post-<?php the_ID(); ?>" <?php post_class("single-post m-bottom-30"); ?>>
	<?php if(is_single()): ?>
		<?php if ( has_post_thumbnail()): ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('geo_single_post_thumb', array('class'=>'img-responsive','alt' => get_the_title())); ?>
				</a> 
			</div>
		<?php endif; ?>
		<div class="post-title-date text-center">
			<div class="entry-meta">
				<span class="byline">
					<span class="author vcard">
						<span><?php esc_html_e('By','geo'); ?> </span>
						<a href="<?php esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a>
					</span>
				</span>
				<span class="posted-on">
					<span class="screen-reader-text"><?php esc_html_e('on','geo'); ?> </span>
					<a href="<?php the_permalink(); ?>" rel="bookmark">
						<span class="entry-date published updated"><?php  the_time(get_option( 'date_format' ) ); ?></span>
					</a>
				</span>
			</div><!-- /.entry-meta -->
		</div>
		<div class="post-content">	
			<div class="entry"> 
				<?php the_content(); ?>
			</div><!-- /.entry -->
			<div class="post-tag-category">
				<?php
					$category_list = get_theme_mod('post_tag')?get_theme_mod('post_category'):false;
					if($category_list) { ?>
						<span><?php esc_html_e('Categories: ','geo'); ?></span>
					<?php the_category(' ');
					}
				?>
			</div>
			<div class="post-tag-list">
				<?php
					$tag_list = get_theme_mod('post_tag')?get_theme_mod('post_tag'):false;
					if($tag_list) {
						the_tags('Tags:','');
					}
				?>
			</div>
		</div>
		
		<?php 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geo' ),
				'after'  => '</div>',
			) );
		?>
		
		<?php geo_post_share(); ?>
		<?php get_template_part( 'template-parts/biography'); ?>
		
	<?php else: ?>
		<div class="post-title-date">
			<span class="posted-on">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
					<span class="entry-date published updated"><?php  the_time(get_option( 'date_format' ) ); ?></span>
				</a>
			</span>
			<h3 class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3><!-- /.post-title -->
		</div>
		
		<?php if ( has_post_thumbnail()) { ?>
			<div class="post-thumbnail">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('geo_blog_post_thumb', array('class'=>'img-responsive','alt' => get_the_title())); ?>
				</a> 
			</div>
		<?php } ?>
		<div class="post-content">	
			<div class="entry"> 
					<?php the_excerpt(); ?>
			</div><!-- /.entry -->
			<a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('READ FULL TEXT','geo'); ?> <i class="fa fa-long-arrow-right"></i></a>
		</div>
	<?php endif;?>
</article>