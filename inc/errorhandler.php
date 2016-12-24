<?php 
	class ErrorHandler {
		private $current_class;
		private $_view;
		

		public function __construct($class) {
			$this->_view = Craft::gI();
			$this->current_class = $class;
		}

		public function craft($page, $errInfo = null) {
			$props['errInfo'] = $errInfo != null ? $errInfo : ' ';
			$props['title'] = $errInfo;
			$this->_view->set_prop($props);
			$this->_view->craft($page);
			exit;
		}
	}
?>