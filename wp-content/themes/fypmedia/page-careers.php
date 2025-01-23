<?php
get_template_part('layouts/header'); // Memuat header
?>

<div class="container mx-auto p-6">
    <?php
    // Memuat slicing dari folder content/careers/career-page.php
    get_template_part('content/careers/career-page');
    ?>
</div>

<?php
get_template_part('layouts/footer'); // Memuat footer
?>
