<?php 
	class App {
		private $_url;
		private $curr_controller;
		private $_registry;
		private $_error;
		private $_root;
		private $_defController = 'root';
		private $_notfound = '404';
		private $_notfoundInfo = 'Page Not Found';

		public function __construct() {
			$this->_registry = Register::gI();
			$this->_error = new ErrorHandler(__CLASS__);
		}

		public function run() {
			$this->setURL();
			if($this->checkURL_length()) {
				$this->getController();
			} else {
				$this->getDefController();
			}
		}

		private function setURL() {
			$this->_url =  isset($_GET['u']) ? filter_var(rtrim(clean($_GET['u']), '/'), FILTER_SANITIZE_URL) : $this->_url = NULL;
		}

		public function getDefController() {
			$uris = $this->split_url($this->getURL());
			$registry = $this->_registry->get_registry($this->_defController);
			$this->curr_controller = new $registry;
			$this->curr_controller->index();

			//$this->curr_controller = new Main;
			//$this->curr_controller->defView();
			return false;
		}

		private function getController() {
			$this->_root = $this->split_url()[0];
			$registry = $this->_registry->get_registry($this->_root);
			if($registry != null) {
				$this->curr_controller = new $registry;
				$this->curr_controller->index($this->get_other_uri());
			} else {
				$this->load_error($this->_notfound, $this->_notfoundInfo);
			}
			return false;
		}

		private function getURL() {
			return $this->_url;
		}

		private function split_url() {
			$this->setURL();
			return explode('/', $this->_url);
		}

		private function checkURL_length() {
			if(!empty($this->_url)) {
				return true;
			}
			return false;
		}

		private function get_other_uri() {
			$uris = $this->split_url();
			unset($uris[0]);
			return $uris;
		}

		private function load_error($key, $info = null) {
			$this->_error->craft($key, $info);
		}

	}
?>