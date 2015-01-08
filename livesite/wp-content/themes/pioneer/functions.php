<?php
	if ( function_exists('register_sidebar') ) {
		register_sidebar(array(
			'id' => 'blog-sidebar',
			'name' => __('Blog Sidebar', 'base'),
			'before_widget' => '<div class="widget %2$s" id="%1$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		));
	}
	add_theme_support( 'post-thumbnails' ); 

	function mytheme_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	}

	register_nav_menus( array(
		'header_menu' => 'Header Menu',
		'footer_menu' => 'Footer Menu'
	) );





	add_action('init', 'csv_importer_taxonomies', 0);

	function csv_importer_taxonomies() {
	    register_taxonomy('kitchen_category', 'kitchen', array(
	        'hierarchical' => false,
	        'label' => 'kitchen_category',
	    ));
	    register_taxonomy('bath_category', 'bath', array(
	        'hierarchical' => false,
	        'label' => 'bath_category',
	    ));
	}

	function new_excerpt_more( $more ) {
		return ' ...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	function custom_excerpt_length( $length ) {
		return 11;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function pioneer_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>
 
         <?php printf(__('<cite class="fn">%s</cite> '), get_comment_author_link()) ?>
          <span class="date"> at <?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></span>
          
      </div>
      

 
      <?php comment_text() ?>
      <?php if ($comment->comment_approved == '0') : ?>
        <em style="color: red;">Your comment is awaiting moderation.</em>
      <?php endif; ?>
      <div class="reply">

         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
        }


add_filter( 'comment_form_defaults', 'my_comment_defaults');
 
function my_comment_defaults($defaults) {
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$commenter = wp_get_current_commenter();
	global $post;	
	$post_id =$post->ID;
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';
 
	$defaults = array(
		'fields'        	   => array(
		'author' => '<div class="row">' . '<div class="col">' .'<input id="author" class="rfield" name="author" placeholder="Name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /> <span class="error">Required field</span> </div>',
		'email' =>  '<div class="col">' .'<input id="email" name="email" class="rfield" placeholder="E-mail" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /><span class="error">Required field</span></div></div><div class="col"><textarea id="comment" class="rfield" name="comment" aria-required="true"  placeholder="Comment" ></textarea><span class="error">Required field</span></div>'
                ),
		'comment_field' => ' <input type="checkbox" checked="checked" name="Subscribe to our newsletter" id="newsletter"> <label for="newsletter">Subscribe to our newsletter</label> ',
 
		'must_log_in'          => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
 
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
 
		'comment_notes_before' => '<div>',
 
		'comment_notes_after'  => '</div>',
 
		'id_form'              => 'commentform',
 
		'id_submit'            => 'submit',

		'title_reply_to'       => __( 'Leave a Reply %s' ),
 
		'cancel_reply_link'    => __( 'Cancel reply' ),
 
		'label_submit'         => __( 'submit  comment' ),
 
                );
 
    return $defaults;
}



function my_posts_where( $where ){
	$where = str_replace("meta_key = 'available_finishes_%_finishes_name'", "meta_key LIKE 'available_finishes_%_finishes_name'", $where);
	return $where;
}

add_filter('posts_where', 'my_posts_where');

add_filter( 'request', 'my_request_filter' );

function my_request_filter( $query_vars ) {
    if( isset( $_GET['s'] ) && empty( $_GET['s'] ) ) {
        $query_vars['s'] = " ";
    }
    return $query_vars;
}

?>