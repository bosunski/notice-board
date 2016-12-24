<?php
	
	
	class Session {

		public static function start() {
			@session_start();
		}

		public static function set_var($var, $val) {
			$_SESSION[$var] = $val;
		}

		public static function get_var($var) {
			return isset($_SESSION[$var]) ? $_SESSION[$var] : '';
		}

		public static function terminate() {
			session_destroy();
			$_SESSION = array();
			unset($_SESSION);
		}

		public function check_session() {
			if(isset($_SESSION['username']) && isset($_SESSION['password'])) {
				return true;
			}
			return false;
		}
	}
?>
