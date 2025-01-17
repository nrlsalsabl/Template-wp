<header class="bg-blue-500 text-white p-4 shadow-md">
  <div class="container mx-auto flex justify-between items-center">
    <!-- Logo -->
    <a href="<?php echo home_url(); ?>" class="text-2xl font-bold">
      <?php bloginfo( 'name' ); ?>
    </a>

    <!-- Navigation Menu -->
    <nav class="space-x-6">
      <a href="<?php echo home_url(); ?>" class="hover:text-gray-200">Home</a>
      <a href="<?php echo get_permalink( get_page_by_path( 'about' ) ); ?>" class="hover:text-gray-200">About</a>
      <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="hover:text-gray-200">Contact</a>
    </nav>
  </div>
</header>
