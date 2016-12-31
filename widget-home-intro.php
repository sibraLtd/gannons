<?php
/*
 * Plugin Name: MT - Home: Intro
 * Plugin URI: http://www.matchthemes.com
 * Description: Homepage: Display Intro style title and text
 * Version: 1.0
 * Author: MatchThemes
 * Author URI: http://www.matchthemes.com
 */

/*
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'mt_home_intro' );

/*
 * Register widget.
 */
function mt_home_intro() {
	register_widget( 'mt_home_intro_w' );
}

/*
 * Widget class.
 */
class mt_home_intro_w extends WP_Widget {

	/* ---------------------------- */
	/* -------- Widget setup -------- */
	/* ---------------------------- */
	
	function mt_home_intro_w() {
	
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'mt_home_intro_w', 'description' => __('Homepage Intro style title and text.Homepage: Display Intro style title and text', 'match') );

		/* Create the widget. */
		$this->WP_Widget( 'mt_home_intro_w', __('MT - Home: Intro', 'match'), $widget_ops);
	}

	/* ---------------------------- */
	/* ------- Display Widget -------- */
	/* ---------------------------- */
	
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$intro_title = apply_filters('widget_intro_title', $instance['intro_title']);
		$column_1_text = apply_filters('widget_column_1_text', $instance['column_1_text']);
		$column_2_text = apply_filters('widget_column_2_text', $instance['column_2_text']);
		$column_3_text = apply_filters('widget_column_3_text', $instance['column_3_text']);
		
		//If the function icl_translate exist, forces the string to register for translation in String Translation.
     if ( function_exists( 'icl_translate' ) ) {
        $intro_title = icl_translate( 'wpml_custom', 'wpml_custom_intro_title'. $widget_id, $intro_title );
		$column_1_text = icl_translate( 'wpml_custom', 'wpml_custom_column_1_text'. $widget_id, $column_1_text );
		$column_2_text = icl_translate( 'wpml_custom', 'wpml_custom_column_2_text'. $widget_id, $column_2_text );
		$column_3_text = icl_translate( 'wpml_custom', 'wpml_custom_column_3_text'. $widget_id, $column_3_text );
		           
		  }

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
	//	if ( $title )
		//	echo $before_title . $title . $after_title;

		/* Display Widget */
		?>
			
		<section id="text-intro" class="home-widget margin-t" style="color: #555;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!--<div class="intro-msg">
            <?php echo $intro_title; ?>
          </div>-->
          <p style="font-size: 24px;">have I changed anything. We are a leading specialist niche London commercial law firm.  We help business people and their businesses – how can we help you?<br />&nbsp;</p>
        </div>
        <!--.col-md-12-->
        <div class="col-md-6 text-justify">
          <ul>
          	<li><strong>Our niche skill and expertise offers you better advice at better rates.</strong> </li>
          	<li><strong>Part of an international network of lawyers and accountants.</strong> </li>
      	  </ul>
        </div>
        <div class="col-md-6 text-justify">
          <ul>
          	<li><strong>A leading commercial law firm for private companies, directors, investors and shareholders.</strong> </li>
          	<li><strong>Specialist tax, financial and legal expertise combine to offer you practical advice.</strong></li>
      	  </ul>
        </div>
        
	<!--<div class="col-md-4">
          <p><?php echo $column_3_text; ?></p>
        </div>-->
        
      </div><!--.row-->
      <div class="row">
          <div class="col-md-12">
               </div>
      </div> <!-- row -->    
    </div><!--.container-->
  </section><!--text-intro-->
	
		<?php

		/* After widget (defined by themes). */
		// echo $after_widget;
	}

	
	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	 
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array(
		'intro_title' => stripslashes( '<div class="intro-normal">Our firm recovered</div>
            <div class="intro-2"><span class="intro-small-italic">over</span> <span class="intro-big-italic">$100.000.000</span> </div>
            <div class="intro-year">Since 1970</div>'),
			
		'column_1_text' => stripslashes( '<span class="dropcap">W</span>e are passionate advocates for victims of serious accidents.'),
		'column_2_text' => stripslashes( 'Dummy text'),
		'column_3_text' => stripslashes( 'Dummy text')
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'intro_title' ); ?>"><?php _e('Intro Title', 'match') ?></label>
			<textarea style="height:150px;width:100%;" id="<?php echo $this->get_field_id( 'intro_title' ); ?>" name="<?php echo $this->get_field_name( 'intro_title' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['intro_title'] ), ENT_QUOTES)); ?></textarea>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'column_1_text' ); ?>"><?php _e('Column 1 Text', 'match') ?></label>
			<textarea style="height:100px;width:100%;" id="<?php echo $this->get_field_id( 'column_1_text' ); ?>" name="<?php echo $this->get_field_name( 'column_1_text' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['column_1_text'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'column_2_text' ); ?>"><?php _e('Column 2 Text', 'match') ?></label>
			<textarea style="height:100px;width:100%;" id="<?php echo $this->get_field_id( 'column_2_text' ); ?>" name="<?php echo $this->get_field_name( 'column_2_text' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['column_2_text'] ), ENT_QUOTES)); ?></textarea>
		</p>
        
        <p>
			<label for="<?php echo $this->get_field_id( 'column_3_text' ); ?>"><?php _e('Column 3 Text', 'match') ?></label>
			<textarea style="height:100px;width:100%;" id="<?php echo $this->get_field_id( 'column_3_text' ); ?>" name="<?php echo $this->get_field_name( 'column_3_text' ); ?>"><?php echo stripslashes(htmlspecialchars(( $instance['column_3_text'] ), ENT_QUOTES)); ?></textarea>
		</p>
		
	<?php
	}
}
?>
