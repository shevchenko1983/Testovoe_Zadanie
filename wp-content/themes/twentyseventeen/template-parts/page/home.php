<?php 
//Template Name: Home

get_header();
 ?>

<?php while (have_posts()) : the_post(); ?>
	
<h1 class="general"><a href="/shop">Фильмы</a></h1>

<?php endwhile; ?>



 <?php get_footer(); ?>