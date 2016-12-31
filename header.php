<?php
/**
 * @package WordPress
 * @subpackage Lawyers
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-THMGGSX');</script>
<!-- End Google Tag Manager -->
<title>
<?php
		wp_title('|', true, 'right');
		bloginfo('name');
		$site_description = get_bloginfo('description');
		if ($site_description && (is_home() || is_front_page())) { echo " | $site_description"; }
	?>
</title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <script src="http://css3-mediaqueries-js.googlecode.com/files/css3-mediaqueries.js"></script>
    <![endif]-->
<!-- Favicon -->

<?php // $mt_favicon = ot_get_option('mt_favicon'); ?>
<!-- <link rel="shortcut icon" href="<?php // echo $mt_favicon;?>"> -->

<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ff0000">

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="google-site-verification" content="NTy0_reWfh-b8y3ZXJ9GvRHElhYE4riBYkkQKKfvDyY" />
<?php $mt_analytics = ot_get_option( 'mt_analytics');

 		if(!empty($mt_analytics)):
	
		  echo $mt_analytics;
		  
		  endif;
	 ?>

<?php wp_head(); ?>
<!-- <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'> --> 

<meta name="msvalidate.01" content="16ED1B2E110951ACA56BB9E1F8A00532" />

</head>
<!-- this is supposed to speed up wordpress by lets try without to see if gzip in W3Total cache works <?php flush(); ?> -->
<body <?php body_class(); ?> >
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-THMGGSX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="main">

<header id="header-bar">
    <div class="container">

     <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Attorney",
       "name" : "Gannons solicitors",
      "url": "http://www.gannons.co.uk",
      "logo": "http://www.gannons.co.uk/wp-content/uploads/2014/11/gannons_logo.png",
      "sameAs" : [ "https://www.facebook.com/pages/Gannons-London-Solicitors/264814250211154",
    "https://twitter.com/Gannons_law",
    "https://www.linkedin.com/company/82214",
    "https://plus.google.com/113788330894032073574/posts"] 
    }
    </script>
  
        
    
<?php	$mt_top_header_display = ot_get_option( 'mt_top_header_display', 'mt_top_header_display_1'); 

    switch ($mt_top_header_display) {
    case 'mt_top_header_display_1':
	  get_template_part('include/assets/section', 'header1');
	
        break;
    case 'mt_top_header_display_2':
	
	get_template_part('include/assets/section', 'header2');
	   
        break;
}

?>
 
  </div><!--.container-->
  </header><!--end header-bar-->

