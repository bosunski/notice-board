<?php 
	class OutSource {

		public function __construct() {
			$this->dbc = Dbcore::getInstance();
		}

		public function load_options() {
			$sql = 'SELECT * FROM options';
			$res = $this->dbc->get_result($sql);
			return $res;
		}

		public function get_user($field, $value) {
			//exit($field.$value);
			$sql = 'SELECT * FROM user WHERE '.$field.' = ? LIMIT 1';
			$res = $this->dbc->get_single_result($sql, array($value));
			if(!is_array($res)) {
				return false;
			} else {
				return $res;
			}
		}

		public function addUser($data) {
			$params = array($data['username'], $data['password'], $data['name'], $data['school'], $data['department']);
			$sql = 'INSERT INTO user (username, password, name, school, department) VALUES (?, ?, ?, ?, ?)';
			$res = $this->dbc->prepare($sql, $params);
			if($res) {
				return true;
			}
			return false;
		}

		public function addNotice($title, $content) {
			$sql = 'INSERT INTO notices (user, c_date, title, content) VALUES ( ?, NOW(), ?, ?)';

			$params = array(Session::get_var('username'), $title, $content);
			$res = $this->dbc->prepare($sql, $params);
			//echo $this->dbc->error;
			if($res) {
				return true;
			}
			return false;
		}

		public function getNotices($user) {
			$sql = 'SELECT * FROM notices WHERE user = ?';
			$res = $this->dbc->get_result($sql, array(Session::get_var('username')));
			if(!empty($res)) {
				return $res;
			}
			return false;
		}

		public function getAllNotices() {
			$sql = 'SELECT * FROM notices ORDER BY c_date DESC';
			$res = $this->dbc->get_result($sql, array());
			if(!empty($res)) {
				return $res;
			}
			return false;
		}
	}
?>