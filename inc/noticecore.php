<?php 
	/**
	* This is the class that handles the *core manipulation* of the app.
	* Not really data processing but Data Manipulation.
	*/
	class NoticeCore {
		private $_options;
		
		function __construct($outsource, $view) {
			$this->_view = Craft::gI();
			$this->_outsource = $outsource;
		}

		public function load_options() {
			$res = $this->_outsource->load_options();
			$this->level_payments = array(1000, 2000, 5000, 20000, 100000);
			foreach ($res as $key => $options) {
				foreach ($options as $k => $value) {
					$this->_options[$options['name']] = $value;
				}
			}
		}

		public function signup() {
			$data = $this->cleanData($_POST);
			if(empty($this->_outsource->get_user('username', $data['username']))) {
				if($this->_outsource->addUser($data)) {
					$this->_view->_props['notify'] = 'Registration Successful';
				} else {
					$this->_view->_props['notify'] = 'Registration Not Successful, please try again';
				}
			}
		}

		private function cleanData(array $data) {
			foreach ($data as $key => $value) {
				$data[$key] = clean($value);
			}
			return $data;
		}

		public function addNotice() {
			$data = $this->cleanData($_POST);
			$err = array();
			if($data['title'] === '') {
				$err[] = 'Your title cannot be empty';
			}
			if($data['content'] === '') {
				$err[] = 'Your content cannot be empty';
			}

			if(empty($err)) {
				if($this->_outsource->addNotice($data['title'], $data['content'])) {
					$this->_view->_props['notify'] = 'You have added a Notice to the notice board';
				} else {
					$this->_view->_props['notify'] = 'Notice cannot be added currently, try again.';
				}
			} else {
				$errHTML = '<ul>';
				foreach ($err as $key => $value) {
					$errHTML .= '<li>'.$value.'</li>';
				}
				$errHTML .= '</ul>';
				$this->_view->_props['notify'] = $errHTML;
;			}
		}

		public function listMyNotice() {
			$noticeRows = $this->_outsource->getNotices(Session::get_var('username'));
			if($noticeRows) {
				$noticeList = ' ';
				$count = 1;
				foreach ($noticeRows as $key => $value) {
					$noticeList .= '<tr>
                                    <td class="align-center">'.$count.'</td>
                                    <td>'.$value['title'].'</td>
                                    <td>'.$value['c_date'].'</td>
                                    <td>'.$value['content'].'</td>
                                    <td>
                                        <a href="">Edit</a>
                                        <a href="">Delete</a>
                                    </td>
                                </tr>';
                    $count++;
				}
				$this->_view->_props['noticeRows'] = $noticeList;
			} else {
				$this->_view->_props['noticeRows'] = 'You have not added any notice.';
			}
		}

		public function listNotices() {
			$noticeRows = $this->_outsource->getAllNotices();
			if($noticeRows) {
				$noticeList = ' ';
				$count = 1;
				foreach ($noticeRows as $key => $value) {
					$noticeList .= '
							  <div class="col-sm-6 col-md-3">
							    <div class="Thumbnail">
							      <div class="caption">
							        <h3>'.$value['title'].'</h3>
							        <p>'.$value['content'].'</p>
							        <p>'.date("d M, Y", strtotime($value['c_date'])).'</p>
							      </div>
							    </div>
							  </div>
							';
                    $count++;
				}
				$this->_view->_props['noticeRows'] = $noticeList;
			} else {
				$this->_view->_props['noticeRows'] = 'The Notice board is currently Empty.';
			}
		}


	}
?>