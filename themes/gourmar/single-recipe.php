<?php get_header(); ?>
<?php while (have_posts()):
  the_post(); ?>
  <?php echo get_the_title() ?>
<?php endwhile; ?>
<?php get_footer(); ?>