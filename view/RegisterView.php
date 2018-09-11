<?PHP

require_once('View.php');

class RegisterView extends View
{
	function fetch()
	{
		$default_status = 1; // Активен ли пользователь сразу после регистрации (0 или 1)
		
		if($this->request->method('post') && $this->request->post('register'))
		{
			
			$user = new stdClass;
			$user->enabled = 1;
			$user->login = $this->request->post('login');
			$user->name = $this->request->post('name');
			$user->fam = $this->request->post('fam');
			$user->otch = $this->request->post('otch');
			$user->email = $this->request->post('email');
			$user->password = $this->request->post('password');
			$user->group_id = 1;
			$user->area = $this->request->post('area');
			$user->postcode = $this->request->post('postcode');
			$user->city = $this->request->post('city');
			$user->region = $this->request->post('region');
			$user->street = $this->request->post('street');
			$user->number = $this->request->post('number');
			$user->housing = $this->request->post('housing');
			$user->office = $this->request->post('office');
			$user->phone = $this->request->post('phone');	
			$user->last_ip = $_SERVER['REMOTE_ADDR'];

			if ($_POST['is_buyer']=='on') $user->buyer = 1;
			if ($_POST['is_seller']=='on') $user->seller = 1;
			
			$captcha_code = $_POST['captcha_code'];

			$this->design->assign('user_reg', $user);
			
			$this->db->query('SELECT count(*) as count FROM __users WHERE email=?', $user->email);
			$user_exists = $this->db->result('count');

			if($user_exists)
				$this->design->assign('error', 'user_exists');
			elseif(empty($user->name))
				$this->design->assign('error', 'empty_name');
			elseif(empty($user->email))
				$this->design->assign('error', 'empty_email');
			elseif(empty($user->password))
				$this->design->assign('error', 'empty_password');		
			elseif(empty($_SESSION['captcha_code']) || $_SESSION['captcha_code'] != $captcha_code || empty($captcha_code))
			{				
				$this->design->assign('error', 'captcha');
			}
			elseif($user_id = $this->users->add_user($user))
			{				
				$this->design->assign('registration_complete','1');
				$this->design->assign('user_reg_id',$user_id);
				$this->notify->email_registration($user, $user->email);
				return $this->design->fetch('register.tpl');
			}
			else
				$this->design->assign('error', 'unknown error');
	
		}
		return $this->design->fetch('register.tpl');
	}	
}
