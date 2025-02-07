<?php
get_template_part('layouts/header'); // Memuat header
?>

<div class="bg-custom-black mx-auto p-6 px-20">
    <?php
    // Memuat slicing dari folder content/contact/contact-page.php
    get_template_part('/wp-content/themes/fypmedia/content/talent/archive-talent.php');
    ?>
</div>

<?php
get_template_part('layouts/footer'); // Memuat footer
?>