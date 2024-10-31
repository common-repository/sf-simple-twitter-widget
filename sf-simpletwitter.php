<?php
/*
Plugin Name: SF Simple Twitter Widget
Plugin URI: http://www.seofixing.com/
Description: Adds a Simple Widget with your Twitter Wall
Version: 1.2
Author: Bestseogr
Author URI: http://www.seofixing.com/
License: GPL2
*/
		
	
class wp_sf_simpletwitter extends WP_Widget {

	// constructor
    function wp_sf_simpletwitter() {
        parent::__construct(false, $name = __('SF Simple Twitter', 'wp_stwitter_plugin') );
                                  }		   
	// widget form creation
function form($instance) {
    // Check values
if( $instance) {
     $show=0;
     $title = esc_attr($instance['title']);
	 $text42 = esc_attr($instance['text42']); 
     $checkbox22 = esc_attr($instance['checkbox22']); 
     $timeline = esc_attr($instance['timeline']);
     $hashtag = esc_attr($instance['hashtag']);	 
} else {
     $show=0;
     $title = '';
	 $text42 = '';
	 $checkbox22 = '1';
	 $timeline= '1';
	 $hashtag= '';
} ?>
<p><b style="color:#2991d6;">SEOFixing TWITTER Widget:</b></p>
<hr/>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title (Optional)', 'wp_stwitter_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p><b>SETTINGS:</b></p>
<p>
<label for="<?php echo $this->get_field_id('text42'); ?>"><?php _e('Your Twitter Widget ID:&nbsp;', 'wp_stwitter_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('text42'); ?>" name="<?php echo $this->get_field_name('text42'); ?>" type="text" value="<?php echo $text42; ?>" />
</p>
<p>
<b>You can Get your Widget ID from here:<b><br/><a target="_blank" href="http://twitter.com/settings/widgets">Twitter Widget Settings</a>
</p>
<hr/>
<p>
<input id="<?php echo $this->get_field_id('checkbox22'); ?>" name="<?php echo $this->get_field_name('checkbox22'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox22 ); ?> />
<label for="<?php echo $this->get_field_id('checkbox22'); ?>"><?php _e('Show credit? (Please say yes)', 'wp_stwitter_plugin'); ?></label>
</p>

<?php }
	// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
	  $instance['text42'] = strip_tags($new_instance['text42']);
	  $instance['checkbox22'] = strip_tags($new_instance['checkbox22']);
     return $instance;
}
	// display widget
function widget($args, $instance) {
   extract( $args );
   // these are the widget options
   $title = apply_filters('widget_title', $instance['title']);
   $text42 = $instance['text42'];
   $checkbox22 = $instance['checkbox22'];
   $show=1;
   if ( $show=='1' ) {
   echo $before_widget;
   // Display the widget
   echo '<div class="widget-text wp_stwitter_plugin_box">';
   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }
?>   


<?php 

if ( $timeline == '1' ) { ?>
<a class="twitter-timeline"
  href="https://twitter.com/twitterdev"
  data-widget-id="<?php echo $text42 ?>">
Tweets by @twitterdev
</a>
<script type="text/javascript">
window.twttr = (function (d, s, id) {
  var t, js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id; js.src= "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
}(document, "script", "twitter-wjs"));
</script>
<?php } ?>

<?php if ( $hashtag == '1' ) { ?>
<a class="twitter-timeline"
   href="https://twitter.com/hashtag/seo"
   data-widget-id="597893775369719809">#seo Tweets</a>
<script>!function(d,s,id){ var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<?php } ?>



<?php   
   if( $checkbox22 AND $checkbox22 == '1')
      {
        echo '<p align="right" style="padding: 0px 5px 0 0; font-size:10px; ">Powered by <a target="_blank" href="http://www.seofixing.com">SEOFixing Wordpress</a></p>';
      }
   echo '</div>';
   
   
   
   echo $after_widget; 
   }
}

}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_sf_simpletwitter");'));

?>