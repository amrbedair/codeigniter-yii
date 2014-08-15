<?php

class CIWebController extends CController {
	
	private $_ci;
	
	/**
	 * Creates a relative URL for the specified action defined in this controller.
	 * @param string $route the URL route. This should be in the format of 'ControllerID/ActionID'.
	 * If the ControllerID is not present, the current controller ID will be prefixed to the route.
	 * If the route is empty, it is assumed to be the current action.
	 * If the controller belongs to a module, the {@link CWebModule::getId module ID}
	 * will be prefixed to the route. (If you do not want the module ID prefix, the route should start with a slash '/'.)
	 * @param array $params additional GET parameters (name=>value). Both the name and value will be URL-encoded.
	 * If the name is '#', the corresponding value will be treated as an anchor
	 * and will be appended at the end of the URL.
	 * @param string $ampersand the token separating name-value pairs in the URL.
	 * @return string the constructed URL
	 * 
	 * TODO: this method replaces the default Yii one, needs a heavy review
	 * 
	 */
	public function createUrl($route, $params=array(), $ampersand='&') {

		$this->_ci = &get_instance();
		return parent::createUrl($this->_ci->router->class.'/'.$this->_ci->router->method, $params, $ampersand);
	}	
}