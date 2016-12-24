<?php 
	class Main extends Controller {
		public static $class = __CLASS__;

		public function __construct() {
			parent::__construct();
		}

		public function index() {
			$this->_noticecore->listNotices();
			$this->_view->craft('homepage');
		}
	}
?>