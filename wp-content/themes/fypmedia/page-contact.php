<?php
get_template_part('layouts/header'); // Memuat header
?>

<div class="container mx-auto p-6">
    <?php
    // Memuat slicing dari folder content/contact/contact-page.php
    get_template_part('content/contact/contact-page');
    ?>
</div>

<?php
get_template_part('layouts/footer'); // Memuat footer
?>
