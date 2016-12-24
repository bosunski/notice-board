<?php 
	class Register {
		private static $_instance;
		private $_registry;
		private $_registers;

		private function __construct() { 
			$this->load_registry();
		}

		public static function gI() {
			if(!isset(self::$_instance)) {
				$cls = __CLASS__;
				self::$_instance = new $cls;
			}
			return self::$_instance;
		}

		public function get_registry($key) {
			if(array_key_exists($key, $this->_registry)) {
				return $this->_registry[$key];
			}
			return null;
		}

		private function load_registry() {
			// Add all URL entry here
			$this->_registry = array(
				'dash' => Dashboard::class,
				'user' => People::class,
				'root' => Main::class,
			);
		}

		public function create_registry($name, $data) {
			$this->{$name} = $data;
		}

		public function getRegistry($name) {
			return $this->{$name};
		}

		
	}
?>