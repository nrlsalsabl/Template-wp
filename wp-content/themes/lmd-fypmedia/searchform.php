<form method="get" class="search-form" action="<?php echo home_url(); ?>">
	  <input type="text" class="form-control" placeholder="Search" value="<?php echo get_search_query() ?>" name="s">

	  <div class="form-check form-check-inline mt-2">
	  <input class="form-check-input" type="radio" name="post_type" value="post" checked>
	  <label class="form-check-label" for="post_type">
		News
	  </label>
	</div>
	<div class="form-check form-check-inline mt-2">
	  <input class="form-check-input" type="radio" name="post_type" value="talent">
	  <label class="form-check-label" for="post_type">
		Talents
	  </label>
	</div>
</form>