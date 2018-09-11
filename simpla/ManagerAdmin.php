<?PHP
require_once('api/Simpla.php');

class ManagerAdmin extends Simpla
{	
	public function fetch()
	{
		if($this->request->method('post'))
		{
			$manager = new stdClass();
			$old_login = $this->request->post('old_login');
			$manager->login = $this->request->post('login');
			


			if(empty($manager->login))
			{
				$this->design->assign('message_error', 'empty_login');			
			}
			elseif($this->managers->get_manager_by_login($manager->login) && $manager->login!=$old_login)
			{
	  			$manager->login = $old_login;	  			
	  			$this->design->assign('message_error', 'login_exists');
			}
			else
			{			
				

				if($this->request->post('password') != "")
					$manager->password = $this->request->post('password');
				
				// Обновляем права только другим менеджерам
				if($old_login != $_SESSION['manager']->login)
					$manager->permissions = serialize((array)$this->request->post('permissions'));
		

				if(empty($old_login))
				{
					$this->managers->add_manager($manager);
	  				header('Location: /simpla/index.php?module=ManagersAdmin');
	  			}
		    	else
		    	{
		    		$manager->login = $this->managers->update_manager_by_login($old_login, $manager);
	  				$this->design->assign('message_success', 'updated');
	  			}
		    	$manager = $this->managers->get_manager_by_login($manager->login);
	    	}
		}
		else
		{
			$login = $this->request->get('login');
			if(!empty($login))
				$manager = $this->managers->get_manager_by_login($login);			
		}	

		if(!empty($manager))
		{
			$manager->permissions = unserialize($manager->permissions);
			$this->design->assign('m', $manager);			
		}
		
 	  	return $this->design->fetch('manager.tpl');
	}
	
}

