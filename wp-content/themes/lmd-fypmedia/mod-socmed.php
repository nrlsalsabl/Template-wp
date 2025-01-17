<ul class="list-inline socmed">
	<?php $var = lmd_get_mod('contact_facebook'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-facebook-f"></i></a></li>'; } ?>

	<?php $var = lmd_get_mod('contact_youtube'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-youtube"></i></a></li>'; } ?>

	<?php $var = lmd_get_mod('contact_instagram'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-instagram"></i></a></li>'; } ?>

	<?php $var = lmd_get_mod('contact_threads'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-threads"></i></a></li>'; } ?>

	<?php $var = lmd_get_mod('contact_twitter'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-twitter"></i></a></li>'; } ?>

	<?php $var = lmd_get_mod('contact_tiktok'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-tiktok"></i></a></li>'; } ?>
	
	<?php $var = lmd_get_mod('contact_linkedin'); if(!empty($var)) { echo '<li class="list-inline-item"><a href="'.$var.'" target="_blank"><i class="fab fa-linkedin"></i></a></li>'; } ?>
</ul>