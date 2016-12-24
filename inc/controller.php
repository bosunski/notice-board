<?php 
	class Controller {
		protected $_error;
		protected $_view;
		protected $_notfound = '404';
		protected $_linkCount = 1;
		protected $_notfoundInfo = 'Page Not Found';
		protected $_url;
		protected $_outsorce;
		protected $_fundcore;
	
		public function __construct() {
			$this->_error = new ErrorHandler(__CLASS__);
			$this->_view = Craft::gI();
			$this->_registry = Register::gI();
			$this->db = Dbcore::getInstance();
			$this->_outsource = new OutSource;
			$this->_noticecore = new NoticeCore($this->_outsource, $this->_view);
		}

		protected function index($url) {
			if(empty($url)) {
				$this->_view->_props['username'] = Session::get_var('username');
				$this->_view->craft('dash');
			} else {
				$this->_url = $url;
				$this->process_other_link();
			}
		}

		protected function load_error($key, $info) {
			$this->_error->craft($key, $info);
		}

		protected function process_other_link() {
			$entries = $this->_registry->getRegistry( 'pages' );
			$url = filter_var($this->_url, FILTER_SANITIZE_URL);
			$this->_link = explode('/', $this->_url[1]);
			
			if(count($this->_link) > $this->_linkCount) {
				$this->load_error($this->_notfound, $this->_notfoundInfo);
			}

			if(!array_key_exists($this->_link[0], $entries)) {
				echo 'Peace';
				$this->load_error($this->_notfound, $this->_notfoundInfo);
			}

			if(!method_exists($this, $entries[$this->_link[0]])) {
				$this->load_error($this->_notfound, $this->_notfoundInfo);
			}

			$this->{$entries[$this->_link[0]]}();

		}
	}
?>