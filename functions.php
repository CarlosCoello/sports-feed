<?php

    require get_template_directory() . '/inc/enqueue.php';
    require get_template_directory() . '/inc/function-admin.php';
    require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
    require get_template_directory() . '/inc/theme-support.php';
    require get_template_directory() . '/inc/ajaxposts.php';
    require get_template_directory() . '/inc/custom-post-type.php';
    require get_template_directory() . '/inc/baseball/custom-post-type-astros.php';
    require get_template_directory() . '/inc/baseball/custom-post-type-rangers.php';
    require get_template_directory() . '/inc/basketball/custom-post-type-dunks.php';
    require get_template_directory() . '/inc/basketball/custom-post-type-players.php';
    require get_template_directory() . '/inc/skateboarding/custom-post-type-girl.php';
    require get_template_directory() . '/inc/skateboarding/custom-post-type-chocolate.php';
    require get_template_directory() . '/inc/skateboarding/custom-post-type-skateparks.php';
    require get_template_directory() . '/inc/soccer/custom-post-type-bundesliga.php';
    require get_template_directory() . '/inc/soccer/custom-post-type-mls.php';
    require get_template_directory() . '/inc/soccer/custom-post-type-mx.php';
    require get_template_directory() . '/inc/soccer/custom-post-type-premier.php';
    require get_template_directory() . '/inc/widgets.php';
    require get_template_directory() . '/inc/cleanup.php';
    require get_template_directory() . '/inc/shortcodes.php';
    require get_template_directory() . '/inc/crumbs.php';

/* 
 Single Custom Post Type Template
 ____________________________________________
 */

    function get_custom_post_type_template($single_template) {
        global $post;

        if($post->post_type == 'post') {
            return $single_template;
        } else {
            $single_template = dirname( __FILE__ ) . '/single.php';
        }

        return $single_template;
    }

  add_filter( 'single_template', 'get_custom_post_type_template' );

//function get_custom_post_type_arc_template( $archive_template ) {
//     global $post;
//
//     if ( is_post_type_archive ( 'baseball-rangers' ) ) {
//          $archive_template = dirname( __FILE__ ) . '/post-type-template.php';
//     }
//     return $archive_template;
//}
//
//add_filter( 'archive_template', 'get_custom_post_type_arc_template' ) ;


