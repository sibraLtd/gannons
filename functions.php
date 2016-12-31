<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * <div class="hoverText">
                     <p><?php echo get_post_meta( get_the_ID(), 'sell_author', true ); ?></p>
                 </div></a>
                 <div class="contactDetails">
                     <h2><a href="<?php echo $bio ?>" target="_blank" > <?php echo $name; ?></a></h2>
                     <a class="emailAuthor" href="mailto:<?php echo $email ?>?cc=clientservices@gannons.co.uk&amp;subject=<?php echo get_the_title() ?>&body=Dear%20<?php echo $firstName ?>,%0D%0AFurther%20to%20<?php echo get_the_title() ?>,"><i class="fa fa-envelope"></i>&nbsp;Email <?php echo $firstName; ?></a>               
                     <p>Call&nbsp;<?php echo $firstName ?>&nbsp;<i class="fa fa-phone"></i>+44 (0)207 438 1060</p>
                 </div>
             </div>        
 * 
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 1000 );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('style-css' ));
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style( 'sibra-style', get_stylesheet_directory_uri() . '/custom.css', array('child-style'));
}
function theme_enqueue_scripts() {
    wp_enqueue_script( 'sibraScript', get_stylesheet_directory_uri() . '/sibraJS.js', array( 'flexslider' ) );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts' );
register_nav_menus( array(
	'left-sidebar-menu' => 'Left-Sidebar-Menu',        
    'case-study-sidebar-menu' => 'Case-Study-Sidebar-Menu',
    'home-page-left' => 'Home-Page-Left-Menu',
    'home-page-middle' => 'Home-Page-Middle-Menu',
    'home-page-right' => 'Home-Page-Right-Menu',
    'home-page-jobs' => 'Home-Page-Jobs',
    'aboutgannons-sidebar-menu' => 'aboutgannons',
    'team-member-sidebar-menu' => "team-left",
    'authors-sidebar-menu' => 'authors'  	
) );
//  This function automatically registers custom menu support for the theme, therefore you do not need to call add_theme_support( 'menus' );
/**
 * Pagination for archive, taxonomy, category, tag and search results pages
 * From http://www.kevinleary.net/wordpress-pagination-paginate_links/ 
 * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
 * @return Prints the HTML for the pagination if a template is $paged
 */
function base_pagination() {
    global $wp_query;
    $big = 999999999; // This needs to be an unlikely integer
    // For more options and info view the docs for paginate_links()
    // http://codex.wordpress.org/Function_Reference/paginate_links
    $paginate_links = paginate_links( array(
        'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
        'format' => '/page/%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5        
    ) );
    // Display the pagination if more than one page is found
    if ( $paginate_links ) {
        echo '<div class="pagination">';
        echo $paginate_links;
        echo '</div><!--// end .pagination -->';
    }
}
add_action( 'widgets_init', 'my_register_sidebars' );
function my_register_sidebars() {
	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'events',
			'name' => __( 'events' ),
			'description' => __( 'Holder for events sidebar widget' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
        register_sidebar(
		array(
			'id' => 'authorInsights',
			'name' => __( 'authorInsight' ),
			'description' => __( 'Holder for author Insight sidebar widget' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
	/* Repeat register_sidebar() code for additional sidebars. */
}
// add_action( 'wp_head', 'sibra_author_image' ); I don't think this is needed. 
function sibra_author_image( $author) {    
    switch ($author) {
             case 'Alex Kleanthous': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/alex-kleanthous-formal-330.jpg" alt="Alex Kleanthous works across a range of sectors for companies and individuals. The main focus is on resolving shareholder disputes, partnership disputes, commercial disputes, employment disputes – in fact disputes of most kinds." />'; 
                 break;
             case 'Catherine Gannon': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/catherine-gannon-navy-330.jpg" alt="Catherine Gannon, managing partner Gannons solicitors, who has a tax, accountancy and a legal background."/>';  break; 
             case 'Helen Curtis': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/helen-curtis-330.jpg" alt="Helen Curtis focuses on business law, employee incentives, private equity related transactions and mergers & acquisitions."/>';  break; 
             case 'George Stead': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/george-stead-formal-330.jpg" alt="George advises on intellectual property registration and litigation. George also advises shareholders on initial agreements and remedies on breakdown and supports both the corporate and dispute resolution teams." />'; break;
             case 'Himanshu Dasare': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/himanshu-dasare-formal-330.jpg" alt="Himanshu Dasare advises across the full spectrum of intellectual property issues, including registration and defence of trademark, design, copyright and patents." />'; break;
             case 'Jeremy Scholl': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/09/jeremy-scholl-330.jpg" alt="Jeremy Scholl has expertise across share valuations, international tax planning, corporate tax, capital gains tax, VAT, tax planning for group companies and personal tax planning."/>'; break; 
             case 'John Deane': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/john-deane-formal-330.jpg" alt="John Deane has have over 25 years experience providing corporate and commercial legal services to SMEs and their investors. He has many years experience in partnership law and as a qualified mediator  "/>'; break;    
             case 'Desiree De Lima': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/lisa-faragher-330.jpg" alt="Desiree De Lima: intellectual property solictor. Expertise: Software & mobile applications, Branding & design, Managing IP portfolios, IP enforcement & defence" />'; break; 
             case 'Mala Patel': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/mala-patel-330.jpg" alt=" advises on intellectual property protection and exploitation, business transactions and shareholder agreements " />'; break;
             case 'Matt Gingell': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/matt-gingell-formal-330.jpg" alt="Matt Gingell advises organisations on HR matters including grievance and disciplinary procedures, redundancy situations, restrictive covenants, TUPE and business immigration. Matt also acts for individuals, and has advised numerous senior executives and directors on their departures and compensation packages. " />'; break;
             case 'Veronika Lipinska': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/08/veronika-lipinska-330.jpg" alt="Veronika Lipinska: Commercial tax & corporate solicitor: advises on employee share ownership, taxation of corporate transactions, negotiations with HMRC" />'; break;             
             case 'Julie Greenwood': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/09/julie-greenwood.jpg" alt="Julie Greenwood: Client services and HR manager at Gannons Solicitors Londontes." />'; break;
         }
}
function sell_team ($pageAuthor, $askPageID, $page_link ) {
                     $name =  get_the_author_meta( 'display_name', $pageAuthor  ); 
                 $firstName = get_the_author_meta( 'user_firstname', $pageAuthor );
                $email = antispambot(get_the_author_meta( 'user_email', $pageAuthor ));
                $email_client_services = antispambot("clientservices@gannons.co.uk");
                 $bio = get_the_author_meta( 'user_url', $pageAuthor ); 
                 $team=" ";
                 $pageTitle = get_the_title( $askPageID );                 
                 $sell_text = get_post_meta( $askPageID, 'sell_author', true );                 
                 $textReturn = '<div class="orangeText"><p>'
                                    .  $sell_text 
                                . '</p>' 
                                . '<div class="contactDetails">' 
                                    . '<a class="emailAuthor" href="mailto:' . $email . '?cc=' . $email_client_services . '&amp;subject=' . $pageTitle . '&body=Dear%20' . $firstName . ',%0D%0AFurther%20to%20' . $pageTitle . ',"><i class="fa fa-envelope"></i>&nbsp;Email ' . $firstName . '</a>'
                                    . '<p><i class="fa fa-phone"></i> ' .  $firstName .': ' .  '<a class="phone" href="tel:02074381060">+44 (0) 20 7438 1060</a></p>' 
                                . '</div></div>'
                                . $team    
                     ;
                 echo  $textReturn; 
}
function contactInfo($pageAuthor, $askPageID, $page_link ) {                 
                 $name =  get_the_author_meta( 'display_name', $pageAuthor  ); 
                 $firstName = get_the_author_meta( 'user_firstname', $pageAuthor );
                $email = antispambot(get_the_author_meta( 'user_email', $pageAuthor ));
                $email_client_services = antispambot("clientservices@gannons.co.uk");
                 $bio = get_the_author_meta( 'user_url', $pageAuthor ); 
                 $team=" ";
                 $pageTitle = get_the_title( $askPageID );                 
                 if (    (substr_count($page_link, 'company') > 0 ) or (substr_count($page_link, '/contract') > 0 ) or (substr_count($page_link, 'litigation') > 0 ) or 
                         (substr_count($page_link, 'employee-share') > 0 ) or (substr_count($page_link, 'employees') > 0 ) or (substr_count($page_link, 'employers') > 0 ) or
                         (substr_count($page_link, 'intellectual') > 0 ) or (substr_count($page_link, 'partnership') > 0 )
                         ) { 
                $team = '<div class="contactPerson"><div class="contactDetails">';
                     if (substr_count($page_link, 'company') > 0 ) {
                                              $team .= '<h2>Company team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/john-deane/" target="_blank">John&nbsp;Deane, </a>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/helen-curtis/" target="_blank">Helen&nbsp;Curtis </a>'                             
                             ;                                              
                    } elseif (substr_count($page_link, '/contract') > 0 ) {
                                              $team .= '<h2>Contract team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/john-deane/" target="_blank">John&nbsp;Deane, </a>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/helen-curtis/" target="_blank">Helen&nbsp;Curtis</a>'                             
                             ;
                     } elseif (substr_count($page_link, 'litigation') > 0 ) {
                                              $team .= '<h2>Litigation & disputes team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/helen-curtis/" target="_blank">Alex Kleanthous &nbsp;</a>'
                             ;
                     } elseif (substr_count($page_link, 'employee-share') > 0 ) {
                                              $team .= '<h2>Employee share scheme team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/catherine-gannon/" target="_blank">Catherine Gannon,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/helen-curtis/" target="_blank">Helen Curtis</a>'
                             ;
                     } elseif (substr_count($page_link, '/employment/employers/') > 0 ) {
                                              $team .= '<h2>Employer team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/alex-kleanthous/" target="_blank">Alex Kleanthous,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/matt-gingell/" target="_blank">Matt Gingell</a>'
                             ;  
                                          } elseif (substr_count($page_link, '/employment/employees/') > 0 ) {
                                              $team .= '<h2>Employee team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/alex-kleanthous/" target="_blank">Alex Kleanthous,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/matt-gingell/" target="_blank">Matt Gingell</a>'
                             ;                         
                           
                     } elseif (substr_count($page_link, 'intellectual') > 0 ) {
                                              $team .= '<h2>Intellectual property team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/john-deane/" target="_blank">John&nbsp;Deane, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/himanshu-dasare/" target="_blank">Himanshu Dasare</a>'
                             ;
                     } elseif (substr_count($page_link, 'partnership') > 0 ) {
                                              $team .= '<h2>Partnership team</h2>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/john-deane/" target="_blank">John&nbsp;Deane, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/solicitor/alex-kleanthous/" target="_blank">Alex Kleanthous</a>'
                             ;
                     }
                     $team .=  '</div></div>'; 
                      } else {  $team=" "; }  
                         $sell_text = get_post_meta( $askPageID, 'sell_author', true );
                 $textReturn = '<div class="contactPerson"><h2>' . $name . '</h2>                               
                                <a href="' .  $bio .'" target="_blank" >'
                                . sibra_author_image( $name ) .
                                '<div class="hoverText"><p>'
                         .  $sell_text . 
                         '</p></div></a> <div class="contactDetails">
                     <a class="emailAuthor" href="' . $bio . '" target="_blank" >View ' .  $firstName . '\'s profile </a>
                     <a class="emailAuthor" href="mailto:' . $email . '?cc=' . $email_client_services . '&amp;subject=' . $pageTitle . '&body=Dear%20' . $firstName . ',%0D%0AFurther%20to%20' . $pageTitle . ',"><i class="fa fa-envelope"></i>&nbsp;Email ' . $firstName . '</a>               
                     <p><i class="fa fa-phone"></i> ' .  $firstName .': ' .  '<a class="phone" href="tel:02074381060">+44 (0) 20 7438 1060</a></p>' 
                     . '</div></div>'
                     . $team    
                     ;
                 echo  $textReturn; 
}
// http://www.thomashardy.me.uk/wordpress-word-count-function
function word_count($postIDRequest) {
    $content = get_post_field( 'post_content', $postIDRequest );
    $word_count = str_word_count( strip_tags( $content ) );
    return $word_count;    
}
function sibra_author_link( $page_author) {
    switch ($page_author) {
             case 'Alex Kleanthous': return get_site_url() . '/wp-content/uploads/2016/08/alex-kleanthous-formal-800.jpg';  break;
             case 'Catherine Gannon': return get_site_url() . '/wp-content/uploads/2016/08/catherine-gannon-navy-800.jpg'; break; 
             case 'Desiree DeLima': return get_site_url() . '/wp-content/uploads/2016/11/desiree-delima-800.jpg'; break;
             case 'George Stead': return  get_site_url() . '/wp-content/uploads/2016/08/george-stead-formal-800.jpg';  break;
             case 'Helen Curtis': return  get_site_url() . '/wp-content/uploads/2016/08/helen-curtis-800.jpg';  break;             
             case 'Himanshu Dasare': return get_site_url() . '/wp-content/uploads/2016/08/himanshu-dasare-formal-800.jpg'; break;             
             case 'Jeremy Scholl': return get_site_url() . '/wp-content/uploads/2016/09/jeremy-scholl-1000.jpg'; break; 
              case 'John Deane': return get_site_url() . '/wp-content/uploads/2016/08/john-deane-formal-800.jpg'; break;                
             case 'Mala Patel': return get_site_url() . '/wp-content/uploads/2016/08/mala-patel-800.jpg'; break; 
             case 'Matt Gingell': return get_site_url() . '/wp-content/uploads/2016/08/matt-gingell-formal-800.jpg';  break;  
             case 'Veronika Lipinska': return  get_site_url() . '/wp-content/uploads/2016/08/veronika-lipinska-800.jpg';  break;
    }
}
   function disable_wp_emojicons() {
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
// http://www.webdevdoor.com/wordpress/creating-list-related-posts-wordpress  
function sibra_cases_old( $post_id1 ){
    $posts = get_field('related_cases', $post_id1 ); 
            if ( $posts ) { 
               $case_return = '<h2 class="related">Related cases</h2>
                <p>'; 
                 foreach($posts as $post) { 
                     setup_postdata($post); 
                   $case_return .=  '<a title="' . get_the_title() . '" href="' .  get_permalink()  . ' target="_blank" >' .  get_the_title() . '</a><br/>';
                 }  wp_reset_postdata();  
               $case_return .=  '</p>';
                 return $case_return; 
 } //End if 
      else {        
      } 
       wp_reset_postdata(); //Restores WP post data 
}
function func_sibra_cases( $atts, $content = null ) {
    $a = shortcode_atts( array( ), $atts );
    $cases = get_field('related_cases');
    	$case_ret = '';
        $temptitle = '';
        $outputString = '';        
	global $post;
           if ( $cases ) : 
            $case_ret = '<div class="related-cases">'
                        . '<h3 class="widget-title"><i class="fa fa-briefcase"></i>&nbsp;Related case studies</h3>';                		
                 foreach($cases as $post) :
                  setup_postdata($post);                  
                 $temptitle = the_title('', '', false);
                 $outputString = str_replace( 'case study', '', $temptitle  );
                 $outputString = str_replace( ':', '', $outputString  );                 
                 $case_ret  .= '<div class="row"> '
                         . '<div class="col-md-12 col-sm-12">'
                         . '<a title="' 
                         .  $outputString 
                         . '" href="' 
                         . get_permalink() 
                         . ' " target="_blank">' 
                         .  $outputString   
                         . '</a></div></div>';
              endforeach; 
              wp_reset_postdata();  
                $case_ret  .= '</div>';
                 endif; 
                 wp_reset_postdata();
                 return $case_ret; 
}    
add_shortcode( 'sibra_cases', 'func_sibra_cases' );
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
// add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );
/* Save the meta box's post metadata. */
function sell_author_save( $post_id, $post ) {
  /* Verify the nonce before proceeding. */
  if ( !isset( $_POST['sell_author_nonce'] ) || !wp_verify_nonce( $_POST['sell_author_nonce'], basename( __FILE__ ) ) ) {
    return $post_id;
  }
  /* Get the post type object. */
  $post_type = get_post_type_object( $post->post_type );
  /* Check if the current user has permission to edit the post. */
  if ( !current_user_can( $post_type->cap->edit_post, $post_id ) ) {
    return $post_id;
  }
  /* Get the posted data and sanitize it for use as an text field. */
  $new_meta_value = ( isset( $_POST['sell_author'] ) ? sanitize_text_field( $_POST['sell_author'] ) : 'Gone wrong' );
  /* Get the meta key. */
  $meta_key = 'sell_author';
  /* Get the meta value of the custom field key. */
  $meta_value = get_post_meta( $post_id, $meta_key, true );
  /* If a new meta value was added and there was no previous value, add it. */
  if ( $new_meta_value && '' == $meta_value ) {
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );
  }
  /* If the new meta value does not match the old value, update it. */
  elseif ( $new_meta_value && $new_meta_value != $meta_value ) {
    update_post_meta( $post_id, $meta_key, $new_meta_value );
  }
  /* If there is no new meta value but an old value exists, delete it. */
  elseif ( '' == $new_meta_value && $meta_value ) {
   // delete_post_meta( $post_id, $meta_key, $meta_value );
  }
}
/* Display the post meta box. */
function sell_author_callback( $object, $box ) { ?>
  <?php wp_nonce_field( basename( __FILE__ ), 'sell_author_nonce' ); ?>
  <p>
    <label for="sell_author-post-class"><?php _e( "Add a sales pitch for the author, which appears if hover over author's picture.", 'Why not call or email me to arrange an informal discussion....' ); ?></label>
    <br />
     <?php 
        $post_id = get_the_ID();
  /* If we have a post ID, proceed. */
  if ( !empty( $post_id ) ) {
     
       $author_text = get_post_meta( $post_id, 'sell_author', true );        
       If (  empty( $author_text )) {
            $author_text = 'Why not call or email me now to arrange an informal discussion.....' ;
       }      
  }
   ?>
    <textarea name="sell_author" COLS="30" ROWS="6" ><?php echo $author_text; ?></textarea>
  </p>
<?php }
function sell_author_add() {    
 $screens = array( 'post', 'page' );   
 foreach ( $screens as $screen ) {   
  add_meta_box(
    'sell_author',      // Unique ID
    'Sell Author',    // Title
    'sell_author_callback',   // Callback function see below
    $screen,         // Admin page (or post type)
    'side',         // Context
    'default'         // Priority
  );
}
}
/* Meta box setup function. */
function sell_author_post_setup() {
  /* Add meta boxes on the 'add_meta_boxes' hook. */
  add_action( 'add_meta_boxes', 'sell_author_add' );    
  /* Save post meta on the 'save_post' hook. */
  add_action( 'save_post', 'sell_author_save', 10, 2 );
}
/* Actions to always run when load a post or a new post. */
add_action( 'load-post.php', 'sell_author_post_setup' );
add_action( 'load-post-new.php', 'sell_author_post_setup' );
function remove_metaboxes() {
 remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields for page
  remove_meta_box( 'postcustom' , 'post' , 'normal' ); //removes custom fields for post
 remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status for page
 remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments for page
// remove_meta_box( 'authordiv' , 'page' , 'normal' ); //removes author for page
}
add_action( 'admin_menu' , 'remove_metaboxes' );
// Remove comment-reply.min.js from footer
// http://crunchify.com/how-to-disable-auto-embed-script-for-wordpress-4-4-wp-embed-min-js/
// http://crunchify.com/try-to-deregister-remove-comment-reply-min-js-jquery-migrate-min-js-and-responsive-menu-js-from-wordpress-if-not-required/
function crunchify_clean_header_hook(){
	wp_deregister_script( 'comment-reply' );
        wp_deregister_script('wp-embed');
         }
add_action('init','crunchify_clean_header_hook');
/**
* Dequeue jQuery migrate script in WordPress.
*/
function isa_remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );
function sibra_child_replace_scripts() {
    //wp_dequeue_script( 'mt_fonts' );
    wp_dequeue_style( 'mt-theme-font' );
   // wp_dequeue_style( 'font-awesome' );
    wp_dequeue_style( 'wc-font-awesome-styles' );
    wp_dequeue_style( 'colors-css' );
    wp_dequeue_style( 'pretty-css' );     
    wp_dequeue_style( 'font-awesome' ); 
    wp_dequeue_script( 'slider' );
    wp_dequeue_script( 'evaluationform' );
    wp_dequeue_script( 'contactform' );
    // wp_dequeue_script( 'pretty-photo' ); needed in slider
    // wp_dequeue_style( 'sorbet-pt-serif' );    
     wp_dequeue_style( 'contact-form-7' );        
      wp_register_style('font-awesome-latest', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
     wp_enqueue_style( 'font-awesome-latest' ); 
  if ( is_page_template( 'conact' ) ) {
    /** Call landing-page-template-one enqueue */
      wp_enqueue_style( 'contact-form-7' );
  } 
}
add_action( 'wp_enqueue_scripts', 'sibra_child_replace_scripts', 20 );
add_action('wp_head','hook_css');
function hook_css() {
	$output='<!-- 
/**
 * @license
 * MyFonts Webfont Build ID 3112373, 2015-10-22T11:32:27-0400 * 
 * The fonts listed in this notice are subject to the End User License
 * Agreement(s) entered into by the website owner. All other parties are 
 * explicitly restricted from using the Licensed Webfonts(s). * 
 * You may obtain a valid license at the URLs below. * 
 * Webfont: GillSansMTStd-Medium by Monotype 
 * URL: http://www.myfonts.com/fonts/mti/gill-sans/std-roman/
 * Copyright: Font software Copyright 2001 Adobe Systems Incorporated. Typeface designs
 * Copyright The Monotype Corporation. All Rights Reserved.
 * Licensed pageviews: 250,000 * 
 * License: http://www.myfonts.com/viewlicense?type=web&buildid=3112373 * 
 * © 2015 MyFonts Inc
*/
-->
<link rel="stylesheet" type="text/css" href="/wp-content/themes/sibra/MyFontsWebfontsKitSlim.css">';
	echo $output;
}
?>