//Javascript: 
jQuery(document).ready( function($) {
    $('.addLike').on('click', function() {
        var post_id = $(this).attr( 'id' );
        $.ajax({
            type: 'POST',
            url: ajax_object.ajaxurl,
            data: {
                action: 'custom_update_post',
                post_id: post_id
            },
			success : function( data ){
				var likes = $.parseJSON(data);
				$("#likeCount").html(likes);
			},
            error: function() {
                //alert("did not work");
            }
        });
    });
});