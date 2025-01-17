<footer class="bg-gray-800 text-white py-6">
  <div class="container mx-auto text-center">
    <p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
    <nav class="space-x-4">
      <a href="<?php echo home_url(); ?>" class="hover:text-gray-400">Home</a>
      <a href="<?php echo get_permalink( get_page_by_path( 'privacy-policy' ) ); ?>" class="hover:text-gray-400">Privacy Policy</a>
      <a href="<?php echo get_permalink( get_page_by_path( 'terms' ) ); ?>" class="hover:text-gray-400">Terms of Service</a>
    </nav>
  </div>
</footer>
