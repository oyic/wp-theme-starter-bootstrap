<?php

namespace Oyic\Utils;

class Punk{
	
	/**
	 * Include a template parts; modified version of WP get_template_parts
	 * @param  string  $path        file-path
	 * @param  array   $vars        variables to be used
	 * @param  boolean $return_vars return as a variable or included part of template
	 * @return mix               eithe as a variable or an included part of a template
	 */
	public static function get_template_parts_with_vars($path,$vars=[],$return_vars=false)
	{
		explode($vars);
		$template = locate_template("$path.php");
  		if ($template === '') wp_die( "Template not found: $template" );
  		
		if($return_vars)
		{
  			// Include and return the template
  			ob_start();
  			include $template;
  			return ob_get_clean();
		}
		else
		{
			include( $template );
		}
	}

	/**
		 * return PODS related child posts id's
		 * @param  str $cpt           the custom post type or post
		 * @param  mix $val           the current value or id
		 * @param  str $related_field the related field name
		 * @return array              array of ids;
		 */
		public static function get_related_fields($cpt,$val,$related_field)
		{
	    	$return_values = array();
			$pod = pods( $cpt, $val );
			$related_fields = $pod->field($related_field) ?: [];
		 	
		 	return array_map( function($related_field) {
		 		return $related_field['ID'];
		 	}, $related_fields);
		}

		/**
		 * Format mobile or phone number
		 * @param  [string] $num unformatted phone number
		 * @return [string]      formatted phone number
		 */
		public static function phone_link($number,$display=TRUE) {
			
			$num = str_replace(['(',')'],'',$number);
			$num = str_replace(' ','',$num);
			
			if(!$display) return sprintf('<a href="tel:%1$s" class="tel-number">%2$s</a>',$num,$number);
			//else
			printf('<a href="tel:%1$s" class="tel-number">%2$s</a>',$num,$number);
		}

		/**
		 * create an anchor link from a raw link string
		 * @param   string $link       url link
		 * @param   boolean $new_window flag if new window when click
		 * @param   string  $title      Overrides the link literal string
		 * @param   boolean $display   display flag; echo or return;
		 * @return  string             echoes out or return; depending on $display value;
		 */
		public static function anchor_link( $link, $title='',$new_window=true, $display=TRUE)
		{
			if(!$display) 
				return sprintf('<a href="%1$s" class="link" target="%3$s" > %2$s</a>', $link, $title?:$link, $new_window?'_blank':' ');
			//else
			printf('<a href="%1$s" class="link" target="%3$s" > %2$s</a>', $link, $title?:$link, $new_window?'_blank':' ');
		}
		/**
		 * create an email link or display it
		 * @param   string $link       url link
		 * @param   string  $title      Overrides the link literal string
		 * @param   boolean $display   display flag; echo or return;
		 * @return  string             echoes out or return; depending on $display value;
		 */
		public static function email_link( $link, $title='', $display=TRUE)
		{
	
			if(!$display) return sprintf('<a href="mailto:%1$s">%2$s</a>',$link,$title?:$link);
			printf('<a href="mailto:%1$s">%2$s</a>',$link,$title?:$link);
		}
		/**
		 * create an anchor image link or display 
		 * @param  [type]  $link       [description]
		 * @param  [type]  $image      [description]
		 * @param  boolean $new_window [description]
		 * @param  boolean $display    [description]
		 * @return [type]              [description]
		 */
		public static function imageLink( $link,  $image, $new_window=false, $display=TRUE)
		{

			$image_url = sprintf('<img class="image-link" src="%1$s" alt="%2$s" >',$image,'Image Link');
			$new_link = sprintf('<a href="%1$s" class="link" target="%3$s" > %2$s</a>', $link, $image_url, $new_window?'_blank':' ');
			if(!$display) return $new_link;
			echo $new_link; 
		}

		/**
		 *  get the Title with option for link
		 * @param  int $id  id to fetch
		 * @param  boolean $link option for link
		 * @return str titles with of without link
		 */
		public static function get_title($id,$link=true,$display=true)
		{		
			if($link):
				if($display):
					printf('<a href="%1$s" class="%2$s-title-link">%3$s</a>',get_permalink($id),get_post_type($id),get_the_title($id));
				else:
					return  sprintf('<a href="%1$s" class="%2$s-title-link">%3$s</a>',get_permalink($id),get_post_type($id),get_the_title($id));
				endif;
			else:
				if($display):
					echo  get_the_title( $id );
				else:
					return get_the_title( $id );
				endif;
			endif;
		
		}


	
	
}