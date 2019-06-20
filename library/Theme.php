<?php 
namespace Oyic;

use Oyic\Ajax\Ajax;

class Theme{
	protected $theme;
	
	public function __construct()
	{
		$this->theme = wp_get_theme();
		define('THEME_VERSION', $theme->Version);
		$this->theme_includes();
		Ajax::load();
	}

	protected function theme_includes()
	{
		$default_directory = __DIR__ ;
		foreach(glob( __DIR__ . '/includes/*.php') as $file){
			require_once($file);
		}
	}
}