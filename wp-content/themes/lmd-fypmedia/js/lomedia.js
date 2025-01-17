/* Scroll to Top */
jQuery(document).ready(function(){

	var offset = 220;
	var duration = 500;
	jQuery(window).scroll(function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.back-to-top').fadeIn(duration);
		} else {
			jQuery('.back-to-top').fadeOut(duration);
		}
	});
	
	jQuery('.back-to-top').click(function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	});

	//More Share
	jQuery(".lmd_btn-toggle").click(function(){
		jQuery(".lmd_share_button").toggleClass("show-secondary");
	});

}); //END Jquery


//onScroll
jQuery(window).scroll(function() {    
	var scroll = jQuery(window).scrollTop();
	//console.log(scroll);
	
	if (scroll >= 200) {
		jQuery("#lombokmedia").addClass("onScroll");
		jQuery(".lmd-navbar-main").addClass("fixed-top");
	} else {
		jQuery("#lombokmedia").removeClass("onScroll");
		jQuery(".lmd-navbar-main").removeClass("fixed-top");
	}
});

/*** Mobile Menu ***/
function openNav() {
  document.getElementById("lmdSideNav").style.width = "100%";
  //jQuery(".lmd-navbar-main").addClass("d-none");
}
function closeNav() {
  document.getElementById("lmdSideNav").style.width = "0";
  //jQuery(".lmd-navbar-main").removeClass("d-none");
}

/* Mobile Menu Dropdown */
var dropdown = document.getElementsByClassName("menu-item-has-children");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
  });
} 