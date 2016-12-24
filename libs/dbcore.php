<?PHP
	class Dbcore {
		/* 
			The database Handle variable
		 */
		public $dbh;

		/* 
			An instance variable of this class{encapsulation}
		 */
		private static $instance;

		/* 
			The last error of the Database process
		 */
		public $error;

		/* 
			The rows returned by the last select query
		 */
		public $rowsReturned;

		/* 
			The columns returned by the last select query
		 */
		public $columnsReturned;

		/* 
			The status of the last Action True/False
		 */
		public $done;

		/*
			The last insertId in a table
		 */
		public $lastInsertId;

		/* The Nummbers of rows/colums affected by a Query
		 * like Delete, Update, Alter ....
		 */

		public $rowsAffected;

		 /* The data returned by a select query
		  */
		public $data = array();

		  /* The number of rows affected
		   */

		public $libdb;
		private $db_name = DB;
		private $db_user = DBUNAME;
		private $db_pass = DBPASS;
		private $db_server = DBHOST;

		protected $con;

		private function __construct() {

		}

		public static function getInstance() {
			if(!isset(self::$instance)) {
				$object = __CLASS__;
				self::$instance = new $object;
			}
			return self::$instance;
		}


		function configure($server, $db, $user, $pass) {
			$this->db_server = $server;
			$this->db_name = $db;
			$this->db_user = $user;
			$this->db_pass = $pass;
		}

		private function connect() {
			$dsn = 'mysql:host='.$this->db_server.';dbname='.$this->db_name;
			try {
				$this->con = new PDO($dsn, $this->db_user, $this->db_pass);
			} catch(PDOException $e) {
				header('HTTP/1.1 500 Database Error');
				exit;
			}

			if(!$this->con) {
				die('Could not connect: '. mysql_error());
			} else {
				return true;
			}
		}

		private function disconnect() {
			$this->con = null;
		}

		/**
		 * Quotes String
		 * @param string $args
		 * @return string $args
		*/

		private function quote($arg) {
			$this->connect();
			$arg = $this->con->quote($arg);
			$this->disconnect();
			return $arg;
		}

		/**
		 * prepare a statement
		 * @param string $sql
		 * @param array $args
		 * @return query $q
		*/

		public function prepare($sql, $args) {
			$this->connect();
			$q = $this->con->prepare($sql);
			$q->execute($args);
			$this->rowsAffected = $q->rowCount();
			$this->error = $q->errorInfo()[2];
			$this->disconnect();
			if($this->rowsAffected > 0) {
				// This place is suspicious
				return true;
			}
				return false;
		}

	    /*
	     * Return array of results
	     * @param string $sql
	     * @param array $args
	     * @return query array $rows
	     */

		public function get_result($sql, $args = array()) {
	        $this->connect();
	        $q = $this->con->prepare($sql);
	        $q->execute($args);
	        $rows = $q->fetchAll();
	        $this->rowsReturned = count($rows);
	        $this->disconnect();
	        return $rows;
    	}

	    /*
	     * Return single result
	     * @param string $sql
	     * @param array $args
	     * @return query $row
	     */

	    public function get_single_result($sql, $args = array()) {
	    	echo 'DBD';
	        $this->connect();
	        $q = $this->con->prepare($sql);
	        $q->execute($args);
	        $this->error = $q->errorInfo()[2];

	        $row = $q->fetch();
	        $this->rowsReturned = $q->rowCount();
	        $this->disconnect();
	        return $row;

	    }

		public function getFields($table) {
			$sql = 'SELECT * FROM '.PREFIX.$table . ' LIMIT 1';
			$res = $this->get_single_result($sql);
			$fields = array();

			foreach($res as $key => $value) {
				$fields[$key] = '';
			}
			return $fields;
		}

		public function getRowsReturned() {
			return $this->rowsReturned;
		}

		
	}
?>
