<?PHP

require_once('View.php');

class UserView extends View
{
	function fetch()
	{
		if(empty($this->user))
		{
			header('Location: '.$this->config->root_url.'/user/login');
			exit();
		}
	
		if($this->request->method('post'))
		{
			
			$user = new stdClass;
			$user->login = $this->request->post('login');
			$user->name = $this->request->post('name');
			$user->fam = $this->request->post('fam');
			$user->otch = $this->request->post('otch');
			$user->email = $this->request->post('email');			
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
			if ($_POST['is_buyer']=='on') $user->buyer = 1; else $user->buyer = 0;
			if ($_POST['is_seller']=='on') $user->seller = 1; else $user->seller = 0;

			if ($user->email != $this->user->email)
			{
				$this->db->query('SELECT count(*) as count FROM __users WHERE email=?', $user->email);
				$user_exists = $this->db->result('count');
				if($user_exists)
					$this->design->assign('error', 'user_exists');
			}
			elseif(empty($user->name))
				$this->design->assign('error', 'Вы убрали имя, а оно нужно');
			elseif(empty($user->fam))
				$this->design->assign('error', 'Вы убрали фамилию, а оно нужно');
			elseif(empty($user->login))
				$this->design->assign('error', 'Вы убрали логин, а он нужен');			
			elseif(empty($user->otch))
				$this->design->assign('error', 'Вы убрали отчество, а оно нужно');
			elseif(empty($user->phone))
				$this->design->assign('error', 'Вы убрали номер телефона, а он нужен');											
			elseif(empty($user->email))
				$this->design->assign('error', 'empty_email');					

			elseif ($this->request->post('password'))
			{
				$old_password = $this->request->post('old_password');
				if($this->users->check_password($user->email, $old_password))
				{
					$user->password = $this->request->post('password');
					
					if ($user_id = $this->users->update_user($this->user->id, $user))
					{
						$this->user = $this->users->get_user(intval($user_id));
						$this->design->assign('user', $this->user);
						$this->design->assign('user_updated','1');
					}
					else
						$this->design->assign('error', 'Что-то пошло не так. Пароль не изменился.');		
				}
				else
					$this->design->assign('error', 'Старый пароль указан некорректно');		
			}
			elseif ($user_id = $this->users->update_user($this->user->id, $user))
			{
				$this->user = $this->users->get_user(intval($user_id));
				$this->design->assign('user', $this->user);
				$this->design->assign('user_updated','1');
			}
	
		}
	
		
		$this->design->assign('meta_title', $this->user->login);
		$body = $this->design->fetch('profile.tpl');
		
		return $body;
	}
}
