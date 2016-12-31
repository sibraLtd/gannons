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
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css', array('pretty-css' ));
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style( 'sibra-style', get_stylesheet_directory_uri() . '/custom.css', array('child-style'));

}

function theme_enqueue_scripts() {
    wp_enqueue_script( 'sibraScript', get_stylesheet_directory_uri() . '/sibraJS.js', array() );
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
             case 'Alex Kleanthous': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/Alex-Kleanthous-300px.jpg" alt="Alex Kleanthous works across a range of sectors for companies and individuals. The main focus is on resolving shareholder disputes, partnership disputes, commercial disputes, employment disputes – in fact disputes of most kinds." />';
                  break;
             case 'Catherine Gannon': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/09/Catherine-Gannon-330x220.jpg" alt="Catherine Gannon, managing partner Gannons solicitors, who has a tax, accountancy and a legal background."/>';
                 break;
             
                  case 'Erion Alikaj': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/05/Erion-Alikaj-300.jpg" alt="Erion Alikaj: Employment law matters regardless of complexity, Civil and commercial matters from partnership agreement to complex commercial disputes."/>';
                 break;
        
             case 'Helen Curtis': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/Helen-curtis-300px.jpg" alt="Helen Curtis focuses on business law, employee incentives, private equity related transactions and mergers & acquisitions."/>';
                 break;
                          
              case 'George Stead': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/10/george-stead-330.jpg" alt="George advises on intellectual property registration and litigation. George also advises shareholders on initial agreements and remedies on breakdown and supports both the corporate and dispute resolution teams." />';
                 break;
         
             case 'Himanshu Dasare': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/Himanshu-Dasare-330px.jpg" alt="Himanshu Dasare advises across the full spectrum of intellectual property issues, including registration and defence of trademark, design, copyright and patents." />';
                 break;
           
             case 'Jeremy Scholl': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/jeremy-scholl-300px.jpg" alt="Jeremy Scholl has expertise across share valuations, international tax planning, corporate tax, capital gains tax, VAT, tax planning for group companies and personal tax planning."/>';
                 break; 
          
                        
              case 'Lisa Nichols': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/lisa-nichols-300px.jpg" alt="Lisa Nichols advises on settlement agreements, corporate matters with a focus on IP and supports the dispute resolution team" />';
                 break; 
          
             
             case 'Mala Patel': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/04/Mala-Patel-330.jpg" alt=" advises on intellectual property protection and exploitation, business transactions and shareholder agreements " />';
             break;
             
             case 'Matt Gingell': return '<img src="' .  get_site_url() . '/wp-content/uploads/2015/07/matt-gingell-300px.jpg" alt="Matt Gingell advises organisations on HR matters including grievance and disciplinary procedures, redundancy situations, restrictive covenants, TUPE and business immigration. Matt also acts for individuals, and has advised numerous senior executives and directors on their departures and compensation packages. " />';
             break;
                                  
                        
             
             case 'Veronika Lipinska': return '<img src="' .  get_site_url() . '/wp-content/uploads/2016/04/Veronika-Lipinska-330px.jpg" alt="Veronika Lipinska: Commercial tax & corporate solicitor: advises on employee share ownership, taxation of corporate transactions, negotiations with HMRC" />';
                 break; 
             
          
           
           
                 
         }
}



function contactInfo($pageAuthor, $askPageID, $page_link ) {
                 
                 $name =  get_the_author_meta( 'display_name', $pageAuthor  ); 
                 $firstName = get_the_author_meta( 'user_firstname', $pageAuthor );
                $email = antispambot(get_the_author_meta( 'user_email', $pageAuthor ));
                $email_client_services = antispambot("clientservices@gannons.co.uk");
                 $bio = get_the_author_meta( 'user_url', $pageAuthor ); 
                 $team=" ";
                 $pageTitle = get_the_title( $askPageID );
                 
                 if (    (substr_count($page_link, 'corporate') > 0 ) or 
                         (substr_count($page_link, 'dispute') > 0 ) or 
                         (substr_count($page_link, 'employee-share') > 0 ) or 
                         (substr_count($page_link, 'employment') > 0 ) or
                         (substr_count($page_link, 'intellectual') > 0 ) or
                         (substr_count($page_link, 'tax-law') > 0 )
                         ) {                        
                         
                         $team = '<div class="contactPerson"><div class="contactDetails">';
                
                     if (substr_count($page_link, 'corporate') > 0 ) {
                                              $team .= '<h2>Corporate team</h2>' 
                             .  '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank">Catherine&nbsp;Gannon, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/helen-curtis/" target="_blank">Helen&nbsp;Curtis, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/erion-alikaj/" target="_blank">Erion&nbsp;Alikaj, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/george-stead/" target="_blank">George&nbsp;Stead, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/lisa-nichols/" target="_blank">Lisa&nbsp;Nichols, </a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/mala-patel/" target="_blank">Mala&nbsp;Patel.</a>'
                             ;

                     } elseif (substr_count($page_link, 'dispute') > 0 ) {
                                              $team .= '<h2>Dispute resolution team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank">Catherine Gannon,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/helen-curtis/" target="_blank">Alex Kleanthous,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/erion-alikaj/" target="_blank">Matt Gingell,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/george-stead/" target="_blank">George Stead,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/erion-alikaj/" target="_blank">Erion Alikaj,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/lisa-nichols/" target="_blank">Lisa Nichols.</a>'                         
                             ;

                     } elseif (substr_count($page_link, 'employee-share') > 0 ) {
                                              $team .= '<h2>Employee share scheme team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank">Catherine Gannon,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/helen-curtis/" target="_blank">Helen Curtis,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/veronika-lipinska/" target="_blank">Veronika Lipinska.</a>'
                             ;

                     } elseif (substr_count($page_link, 'employment') > 0 ) {
                                              $team .= '<h2>Employment team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank">Catherine Gannon,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/alex-kleanthous/" target="_blank">Alex Kleanthous,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/matt-gingell/" target="_blank">Matt Gingell,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/lisa-nichols/" target="_blank">Lisa Nichols,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/erion-alikaj/" target="_blank">Erion Alikaj,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/mala-patel/" target="_blank">Mala Patel.</a>'
                             ;

                     } elseif (substr_count($page_link, 'intellectual') > 0 ) {
                                              $team .= '<h2>Intellectual property team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/himanshu-dasare/" target="_blank">Himanshu Dasare,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/lisa-nichols/" target="_blank">Lisa Nichols,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/george-stead/" target="_blank">George Stead,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/mala-patel/" target="_blank">Mala Patel.</a>'
                             ;

                     } elseif (substr_count($page_link, 'tax-law') > 0 ) {
                                              $team .= '<h2>Tax team</h2>' 
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/catherine-gannon/" target="_blank">Catherine Gannon,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/helen-curtis/" target="_blank">Helen Curtis,&nbsp;</a>'
                             . '<a class="teamAuthor" href="http://www.gannons.co.uk/about-gannons/team/veronika-lipinska/" target="_blank">Veronika Lipinska.</a>'                         
                             ;

                     }
                     $team .=  '</div></div>'; 
                     
                         } else {  $team=" "; }
                
                 
                 $textReturn = '<div class="contactPerson"><h2>' . $name . '</h2>                               
                                <a href="' .  $bio .'" target="_blank" >'
                                . sibra_author_image( $name ) .
                                '<div class="hoverText"><p>'
                         .  get_post_meta( $askPageID, 'sell_author', true ) . 
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
    http://www.gannons.co.uk/
}
function sibra_author_link( $page_author) {
    switch ($page_author) {
             case 'Alex Kleanthous': return get_site_url() . '/wp-content/uploads/2014/11/AK.jpg';  break;
             case 'Catherine Gannon': return get_site_url() . '/wp-content/uploads/2015/09/Catherine-Gannon-800x533.jpg'; break; 
             case 'Erion Alikaj': return get_site_url() . '/wp-content/uploads/2016/05/Erion-Alikaj-300.jpg'; break;  
             case 'Helen Curtis': return  get_site_url() . '/wp-content/uploads/2014/11/Helen.jpg';  break;             
             case 'Himanshu Dasare': return get_site_url() . '/wp-content/uploads/2015/06/Himanshu-Dasare-800px.jpg'; break;             
             case 'Jeremy Scholl': return get_site_url() . '/wp-content/uploads/2014/11/Jeremy.jpg'; break; 
             case 'Lisa Nichols': return get_site_url() . '/wp-content/uploads/2014/09/Lisa-2.jpg'; break;  
             case 'Mala Patel': return get_site_url() . 'wp-content/uploads/2016/04/Mala-Patel-330.jpg'; break; 
             case 'Matt Gingell': return get_site_url() . '/wp-content/uploads/2014/01/matt.jpg';  break;             
            
             case 'Veronika Lipinska': return  get_site_url() . '/wp-content/uploads/2015/09/Veronika-Lipinska-330.jpg';  break;
             case 'George Stead': return  get_site_url() . '/wp-content/uploads/2015/10/george-stead-330.jpg';  break;
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
                   $case_return .=  '<a title="' . get_the_title() . '" href="' .  get_permalink()  . '">' .  get_the_title() . '</a><br/>';
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
                         . '">' 
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
?>