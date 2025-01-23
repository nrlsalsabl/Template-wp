<?php
get_template_part('layouts/header'); 

if (is_page('fyp-media')) {
    // Menampilkan halaman Fyp Media
    include(locate_template('content/services/fyp-media.php'));
} elseif (is_page('fyp-agency')) {
    // Menampilkan halaman Fyp Agency
    include(locate_template('content/services/fyp-agency.php'));
} elseif (is_page('fyp-management')) {
    // Menampilkan halaman Fyp Management
    include(locate_template('content/services/fyp-management.php'));
} elseif (is_page('fyp-mandala')) {
    // Menampilkan halaman Fyp Mandala
    include(locate_template('content/services/fyp-mandala.php'));
} else {
    // Default template jika tidak ada yang cocok
    the_content();
}

get_template_part('layouts/footer');


