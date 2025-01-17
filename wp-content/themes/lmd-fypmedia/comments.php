<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
	<h2 id="comments" class="comments-title h5 mb-3 fw-semibold"><span><?php comments_number( __( '<span>No</span> Comment', 'lombokmedia' ), __( '<span>One</span> Comment', 'lombokmedia' ), _n( '<span>%</span> Response', '<span>%</span> Comments', get_comments_number(), 'lombokmedia' ) );?></span></h2>

	<ol class="comment-list">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond" class="mb-3">

	<h2 class="comments-title h5 fw-semibold"><span><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></span></h2>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form-horizontal" role="form">

		<div class="row mb-3">
			<div class="col-12">
				<textarea name="comment" id="comment" rows="4" class="form-control" tabindex="1" placeholder="Comment"></textarea>
			</div>
		</div>

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>

			<div class="row mb-3">
				<div class="col-12 col-lg-6">
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" class="form-control" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> placeholder="Name" />
				</div>
				<div class="col-12 col-lg-6">
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" class="form-control" tabindex="3" <?php if ($req) echo "aria-required='true'"; ?> placeholder="Email" />
				</div>
			</div>

		<?php endif; ?>

		<div class="row">
			<div class="col-12">
				<button type="submit" id="submit" tabindex="5" class="btn btn-info w-100">Add Comment</button>
			</div>
		</div>

		<?php comment_id_fields(); ?>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
