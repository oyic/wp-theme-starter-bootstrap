<?php 
namespace Oyic\Ajax;

class Ajax{
	private static  $ajax_hooks = []; // = [ 'ajax_action' => true ];
	public static $test ="test";
	
	public static function load()
	{
		foreach(self::$ajax_hooks as $ajax => $nopriv)
		{
			add_action("wp_ajax_".$ajax, $ajax );
			if($nopriv)
				add_action("wp_ajax_nopriv_".$ajax, [__CLASS__,$ajax."_action"] );
		}
	}
	/**
	 * return the form element for the wp_ajax action field
	 * @param  [type] $action [description]
	 * @return [type]         [description]
	 */
	public static function ajax_form_element( $action )
	{
		$retval = wp_nonce_field("validate_form_action","field_validate_form");
		$retval.= '<input type="hidden" name="action" value="'.$action.'">';
		echo $retval;
	}
	
	
	public static function validate_subimitted_form()
	{
		if ( ! isset( $_REQUEST['field_validate_form'] ) || 
		! wp_verify_nonce( $_REQUEST['field_validate_form'], 'validate_form_action' ) ) :
		   print 'Sorry, your nonce did not verify.';
		   return false;
		   exit;
		endif;
		return true;
	}
}