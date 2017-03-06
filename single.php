<?php /*

@package sunsettheme
*/
get_header(); ?>

	<div id="primary" class="content-area">
	
		<main id="main" class="site-main" role="main">
         
          <div class="container"><?php  the_crumbs(); ?></div>


						<?php

							if( have_posts() ):

								while( have_posts() ): the_post();



									get_template_part( 'template-parts/single', get_post_format() );?>

									<div class="container">
								<?php

									if ( comments_open() ):
										comments_template(); ?>
									</div>

								<?php	endif;

								endwhile;

							endif;

						?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
