<?php
/**
 * 
 * @author amrbedair
 *
 */

// require_once APPPATH.'/classes/autoloader.php';

class MY_Loader extends CI_Loader {
	
	public function yii_view($view, $vars = array(), $return = FALSE) {
		$output = $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => true));
		Yii::app()->getClientScript()->render($output);
		
		if($return)
			return $output;
		
		echo $output;
	}
	
	/**
	 * 
	 * @param string $folder
	 * @param string $view
	 * @param array $vars
	 * @param string $return
	 */
	function ext_view($folder, $view, $vars = array(), $return = FALSE) {
		
		$this->_ci_view_paths = array_merge ($this->_ci_view_paths, array(
				APPPATH . $folder . '/' => TRUE 
		));
		
		return $this->_ci_load (array(
			'_ci_view' => $view,
			'_ci_vars' => $this->_ci_object_to_array ( $vars ),
			'_ci_return' => $return 
		));
	}
	
	public function widget($className, $options=array()) {
		$widget = new $className();
		foreach ($options as $key => $value)
			$widget->$key = $value;
		
		$widget->init();
		
		return $widget->run();
	}	
}

?>