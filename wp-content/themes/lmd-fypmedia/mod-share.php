<div class="lmd-single-share clearfix">
	<div class="lmd_share_top_container">
		<div class="lmd_share_button clearfix">
			<div class="lmd_sharelist">
				<a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-facebook expanded"><i class="fab fa-facebook-square"></i><span>Share</span></a>
				<a href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>url=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-twitter expanded"><i class="fab fa-twitter"></i><span>Twit</span></a>
				<a href="https://www.pinterest.com/pin/create/bookmarklet/?pinFave=1&url=<?php the_permalink(); ?>&media=<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>&description=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-pinterest expanded"><i class="fab fa-pinterest"></i><span>Pint</span></a>
				<a href="https://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-linkedin expanded"><i class="fab fa-linkedin"></i><span>Link</span></a>
				<a href="//api.whatsapp.com/send?text=<?php the_title(); ?> <?php the_permalink(); ?>" target="_blank" rel="nofollow" data-action="share/whatsapp/share" class="lmd_btn-whatsapp expanded"><i class="fab fa-whatsapp"></i><span>Kirim</span></a>
				<a href="https://t.me/share/url?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-telegram expanded"><i class="fab fa-telegram"></i><span>Link</span></a>
				
				<div class="share-secondary">
					<a href="https://chart.googleapis.com/chart?chs=400x400&cht=qr&choe=UTF-8&chl=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-wechat "><i class="fab fa-weixin"></i></a>
					<a href="https://chart.googleapis.com/chart?chs=400x400&cht=qr&choe=UTF-8&chl=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-qrcode "><i class="fas fa-qrcode"></i></a>
					<a href="https://social-plugins.line.me/lineit/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-line "><i class="fab fa-line"></i></a>
					<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"
					target="_blank" rel="nofollow" class="lmd_btn-stumbleupon "><i class="fab fa-stumbleupon"></i></a>
					<a href="mailto:?subject=<?php the_title(); ?>body=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-email "><i class="fas fa-envelope"></i></a>
					<a href="https://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-reddit "><i class="fab fa-reddit"></i></a>
					<a href="https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-tumbrl "><i class="fab fa-tumblr"></i></a>
					<a href="https://vk.com/share.php?url=<?php the_permalink(); ?>" target="_blank" rel="nofollow" class="lmd_btn-vk "><i class="fab fa-vk"></i></a>
					<a href="http://b.hatena.ne.jp/bookmarklet?url=<?php the_permalink(); ?>&btitle=<?php the_title(); ?>" target="_blank" rel="nofollow" class="lmd_btn-hatena "><i class="fas fa-hashtag"></i></a>
				</div>

				<button class="lmd_btn-toggle"><i class="fas fa-share"></i></button>
			</div>
		</div>
	</div>
</div><!--/lmd-single-share-->