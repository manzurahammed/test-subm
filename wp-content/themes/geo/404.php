<?php get_header(); ?>

	<section id="main-content" class="blog-page section-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h2 class="title-404"><?php esc_html_e('404','geo'); ?></h2>
					<p><?php esc_html_e('Sorry but the page you just tried accessing wasn`t found.It either was removed or never existed. Unfortunately, that`s all we know.','geo'); ?></p>
				</div>
			</div> <!--/.row-->
			<div class="row pad-60">
				<div class="col-sx-12">
					<?php get_search_form(); ?>
				</div>
			</div> <!--/.row-->
		</div>
	</section>

<?php get_footer(); ?>

