<?php 
	class Dashboard extends Controller {
		public static $class = __CLASS__;
		private $_register;
		private $_instance;

		public function __construct() {
			parent::__construct();
			$this->_registry->create_registry('pages', self::registers());
		}

		public function index($url) {
			if(!Session::check_session()) {
				header('location: '. HOME . '/user/login');
			}

			if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addNotice'])) {
				$this->_noticecore->addNotice(); 
			}
			$this->_noticecore->listMyNotice();
			parent::index($url);
		}

		private static function registers() {
			return array(
					'profile' => 'updateProfile',
					'genealogy' => 'gegtGenealogy',
					'signups' => 'getSignUps',
					);
		}

		protected function updateProfile() {
			$this->_fundcore->updateProfile();
			$this->_view->craft('profile');
		}

		protected function getGenealogy() {
			$this->_view->craft('geneology');
		}

		protected function getSignUps() {
			$this->_fundcore->list_signups();
			$this->_view->craft('signups');
		}

		protected function pending_donations() {
			$this->_fundcore->list_pending_donations();
			$this->_view->craft('pdonation');
		}

		protected function confirmed_donations() {
			$this->_fundcore->list_unpaid_donations();
			$this->_view->craft('cdonation');
		}

		protected function uBank() {
			$this->_view->craft('ubank');
		}

		protected function goSettings() {
			$this->_view->craft('settings');
		}

		protected function refLink() {
			$this->_fundcore->manage_ref_link();
			$this->_view->craft('reflink');
		}

		protected function upgrade() {
			$this->_fundcore->assign_me();
			$this->_fundcore->manage_upgrade();
			//$this->_fundcore->genP();
			if(isset($_POST['send_app'])) {
				$this->_fundcore->notify_payment(Session::get_var('username'));
			}
			$this->_view->craft('upgrade');
		}
	}
?>