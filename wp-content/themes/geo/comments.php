<?php

if ( post_password_required() ) {
	return;
}

?>
<div id="comments" class="comments-area">
	<?php if( number_format_i18n(get_comments_number()) > 0 ) { ?>
		<div class="comment-block m-bottom-30">
			<h5> 
				<?php echo '( '.number_format_i18n(get_comments_number()).' comments )'; ?>
			</h5><!-- /.comments-title -->
			
			 <?php geo_comment_nav(); ?>
			 
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'       => 'ol',
						'callback'    => 'geo_comments',
						'short_ping'  => true,
					) );
				?>
			</ol><!-- /.comment-list -->
		</div>
	<?php } ?>
	<div class="mb-sm-40">
		<?php
			$commenter = wp_get_current_commenter();
			$req = get_option( 'require_name_email' );
			$aria_req = ( $req ? " aria-required='true'" : '' );
			$required_text = '  ';
			$args = array(
				'class_form'           =>'blog-comments',
				'title_reply'       => esc_html__('REPLY MESSAGE ','geo'),
				'submit_button'      =>'<button type="submit" class="btn">'.esc_html__('SEND NOW','geo').'<i class="fa fa-long-arrow-right"></i></button>',
				'comment_field' =>  '<div class="form-group">
										<textarea name="comment"'.$aria_req.' id="text" class="form-control" rows="6" placeholder="'.esc_html__('Your Comment','geo').'" maxlength="400"></textarea>
									</div>',

				'fields' => apply_filters( 'comment_form_default_fields', 
				array(
					'author' => '<div class="form-group">
									<input type="text" name="author" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . $aria_req . ' placeholder="' . esc_html__( 'Name','geo') . '" />
								</div>',
					'email' => ' <div class="form-group">
									<input id="email" name="email" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . $aria_req . ' placeholder="' . esc_html__( 'Email','geo') . '" />
								</div>'
				) ),
				'label_submit' => esc_html__('SEND NOW','geo'),
			);
			comment_form($args); ?>
	</div><!-- /#respond --> 
</div><!-- /#comments --> 
