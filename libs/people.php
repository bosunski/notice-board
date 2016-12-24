<?php 
	class People extends Controller {
		public static $class = __CLASS__;
		private $_register;

		//private $_url;
		private $_instance;
		private $auth; 

		public function __construct() {
			parent::__construct();
			$this->auth = new Auth;
			$this->_registry = Register::gI();
			$this->_registry->create_registry('pages', self::registers());
			$this->_instance = function () {
				$cls = __CLASS__;
				return new $cls;
			};
		}

		public function index($url) {
			if(empty($url)) {
				$this->load_error($this->_notfound);
			}
			$this->_url = $url;
			$this->process_other_link();
		}


		private static function registers() {
			return array(
					'login' => 'goLogin',
					'signup' => 'goRegister',
					'passreset' => 'forgotPass',
					'logout' => 'goLogout',
					);
		}

		protected function goLogin() {

			if(isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
				echo 'hsgdhdasd';
				$uname = $_POST['username'];
				$pass = $_POST['password'];
				echo $pass;
				Session::start();
				$logged = $this->auth->login($uname, $pass);
				if($logged) {
					header('location: '.HOME.'/dash');
				} else {
					$this->_view->_props['err'] = $this->auth->get_auth_last_error();
				}
			}
			$this->_view->craft('login');
		}

		protected function goRegister() {
        	if(isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
				$this->_noticecore->signup();
			}
          	$this->_view->_props['title'] = 'Sign Up for an Account';
			$this->_view->craft('register');
		}

		protected function forgotPass() {
			$this->_view->craft('fpass');
		}

		protected function goLogout() {
			Session::terminate();
			header('location: '.HOME);
		}

		private function get_user($username) {

		}
	}
?>