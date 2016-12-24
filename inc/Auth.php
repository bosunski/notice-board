<?PHP
	//require_once($_SERVER['DOCUMENT_ROOT'].'class/Core.php');
	define('_KEY', 'with God all things are possible');

class Auth {
	private $_siteKey;
	private $_isAdmin = false;
	private $_isSuper = false;
	private $_isLogin = false;
	private $authErr = '';
	private $dbc;

	public function __construct() {
		$this->dbc = Dbcore::getInstance();
		$this->_siteKey = time();
	}

	private function randomString($length = 50) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';
		for($p = 0; $p < $length; $p++) {
			$string .= $characters[mt_rand(0, strlen($characters)-1)];
		}
		return $string;
	}

	public function _getRand($length = 50) {
		return $this->randomString($length);
	}

	public function hashData($data) {
		return hash_hmac('sha512', $data, _KEY);
	}

	public function isAdmin() {
		if($selection['isAdmin'] == 1) {
			return true;
		}
		return false;
	}


	public function login($uname, $pass) {
		//select user from DB on $email
		$sql = 'SELECT * from user WHERE username = ? LIMIT 1';
		$arr = $this->dbc->get_single_result($sql, array($uname));
		//If the record is found
		if($this->dbc->getRowsReturned() == 1) {
			//salt and hash password
			//$password = $arr['salt'].$pass;
			//$password = $this->hashData($password);
			//$password = substr($password, 0, 59);

			if($pass == $arr['password']) {
				
			 	/*This is a weak spot destined for strenghtening*/
				$random = $this->randomString();
				$token = $_SERVER['HTTP_USER_AGENT'].$random;
				$token = $this->hashData($token);
				Session::set_var('username', $arr['username']);
				$_SESSION['status'] = 'online';
				$this->_isSuper = ($arr['status'] == 0) ? true : false;
				Session::set_var('email', $arr['email']);
				$_SESSION['name'] = $arr['name'];
				$_SESSION['password'] = $pass;
				$sessionID = session_id();
				$this->_isLogin = true;

				return true;
			} else {
			    //Incorrect password
			 	$this->authErr = 'ERROR: You entered an incorrect password for the username <b>'.$uname.'</b>. <a href="#">Have you Forgoten your password?</A>';
			}
		} else {
			//Invalid username
			$this->authErr = 'ERROR: Invalid Username. Please try again.';
		}
		return false;
	}

	public function is_login() {
		return $this->_isLogin;
	}

	public function get_auth_last_error() {
		return $this->authErr;
	}
	public function checkSession() {
		$dbh = new libdb();
		//Select the ROW from loggedin member
		if($dbh->db_connect()) {
			$sql = 'SELECT * FROM '.PREFIX.'logged_in_admin WHERE admin_id='._decrypt($_SESSION['admin_id']);
			$dbh->query($sql, 'select');
			if(!$dbh->done) {
					$this->authErr = $dbh->error;
				} else {
					//If the record is not found
					if($dbh->rowsReturned != 0) {
					$arr = $dbh->data;
					//Check ID and token
					if(session_id() == $arr['session_id'] && $_SESSION['token'] == $arr['token']) {
						//ID and token match refresh the session for the next request
						$this->refreshSession();
						return true;
					}
				} else {
					return false;
				}
			}
		}
		return false;
	}

	private function refreshSession() {
		//regenerate id
		session_regenerate_id();
		//regenerate token
		$random = $this->randomString();
		//Build the token
		$token = $_SERVER['HTTP_USER_AGENT'].$random;
		$token = $this->hashData($token);
		$_SESSION['token'] = $token;
	}
	public function logout() {
		$_SESSION = array();
		session_destroy();
		unset($_SESSION);
		return true;
	}

	public function sendVerification($user_id) {
		require_once('functions.php');
		//Get from DB using d $user_id(lastInsertId() will b handy)
		$sql = 'SELECT email, verification_code FROM users WHERE uid='.$user_id;
		$con = Core::getInstance();
		$exe = $con->dbh->query($sql);
		$roe = $exe->fetch(PDO::FETCH_OBJ);
		$email = $roe->email;
		$code = $roe->verification_code;
		$subject = 'DREAM BUILDERS';
		$header = 'Email Verification';
		$message = 'Please click on this link to
										activate your account. http://www.'.$_SERVER['HTTP_HOST'].'/reg2.php?email='.$email.'&verve_code='.$code;
		mail($email, $subject, $message, $header);
	}

  private static function activateUser($email) {
    $con = Core::getInstance();
    $exe = $con->dbh->query("UPDATE users SET confirmation = 1, is_active = 1 WHERE email = \"$email\"");
    if($exe)
       return true;
    else
       return false;
  }

	public static function checkVerificationCode($email, $code) {
		//this function should return a boolean
    if(self::checkDetail($email, 'email', 'users') && self::checkDetail($code, 'verification_code', 'users')) {
       if(self::activateUser($email))
       return true;
    }
    return false;
	}
}
?>
