<?php
if(!defined('ABSPATH')){
	die();
}

add_action("admin_init", function(){
	if(!get_option("ping_sites") || get_option("ping_sites") == "http://rpc.pingomatic.com/"){
		update_option("ping_sites", "http://rpc.pingomatic.com/
		http://blogsearch.google.com/ping/RPC2
		http://bing.com/webmaster/ping.aspx");
	}
});
?>