<?PHP

require_once('api/Simpla.php');

class LoginAdmin extends Simpla
{
	public function fetch()
	{

			if (isset($_POST['login']) && isset($_POST['password']))
			{
				$login = $this->request->post('login', 'string');
				$password = $this->request->post('password', 'string');				
				
				if($manager_id = $this->managers->check_password($login, $password))		
				{
					die('Ok');
					//$_SESSION['manager'] = $this->managers->get_manager($manager_id);
				}
				else
				{
					if (!isset($_SESSION['password_try_count'])) 
						$_SESSION['password_try_count'] = 1;
					else 
						$_SESSION['password_try_count']++;

					if (intval($_SESSION['password_try_count']) > 5) 
						$_SESSION['access_denied'] = true;

					$this->design->assign('failed', '1');
					
				}
			}
			else
			{

				
				

			}

		return $this->body = $this->design->fetch('login.tpl');
	}
}