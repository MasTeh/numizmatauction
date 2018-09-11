<?PHP


require_once('api/Simpla.php');

// Этот класс выбирает модуль в зависимости от параметра Section и выводит его на экран
class IndexAdmin extends Simpla
{
	// Соответсвие модулей и названий соответствующих прав
	private $modules_permissions = array(
		'ProductsAdmin'       => 'products',
		'ProductAdmin'        => 'products',

		'AuctionsAdmin'             => 'auctions_list',
		'AuctionAdmin'        	    => 'auctions_list',

		'CommissionProductAdmin'    => 'comission',		
		'CommissionProductsAdmin'   => 'comission',		

		'LotsAdmin'    				=> 'lots',	
		'LotAdmin'  			    => 'lots',	

		'StartAdmin'  			    => 'auction_start',	

		'DealsAdmin'  			    => 'deals',	
		'DealAdmin'  			    => 'deals',	

		'DealsLabelsAdmin'  			=> 'deals',	
		'DealLabelsAdmin'  			    => 'deals',	

		'CategoriesAdmin'     => 'products',
		'CategoryAdmin'       => 'products',
		'FeaturesAdmin'       => 'products',
		'FeatureAdmin'        => 'products',
		'OrdersAdmin'         => 'products',
		'OrderAdmin'          => 'products',
		'OrdersLabelsAdmin'   => 'products',
		'OrdersLabelAdmin'    => 'products',
		'UsersAdmin'          => 'users',
		'UserAdmin'           => 'users',
		'ExportUsersAdmin'    => 'users',
		'PagesAdmin'          => 'pages',
		'PageAdmin'           => 'pages',
		'BlogAdmin'           => 'pages',
		'PostAdmin'           => 'pages',
		'CommentsAdmin'       => 'comments',
		'FeedbacksAdmin'      => 'feedbacks',
		'ImportAdmin'         => 'import',
		'ExportAdmin'         => 'export',
		'BackupAdmin'         => 'backup',
		'StatsAdmin'          => 'stats',
		'ThemeAdmin'          => 'design',
		'StylesAdmin'         => 'design',
		'TemplatesAdmin'      => 'design',
		'ImagesAdmin'         => 'design',
		'SettingsAdmin'       => 'settings',
		'DeliveriesAdmin'     => 'delivery',
		'DeliveryAdmin'       => 'delivery',
		'PaymentMethodAdmin'  => 'payment',
		'PaymentMethodsAdmin' => 'payment',
		'ManagersAdmin'       => 'managers',
		'ManagerAdmin'        => 'managers'
	);

	// Конструктор
	public function __construct()
	{
	    // Вызываем конструктор базового класса
		parent::__construct();
		
		$this->design->set_templates_dir('simpla/design/html');
		$this->design->set_compiled_dir('simpla/design/compiled');
		
		$this->design->assign('settings',	$this->settings);
		$this->design->assign('config',	$this->config);
		
	}

	function fetch()
	{
//echo "<Pre>";print_r($_SESSION);print_r($_POST);echo "</Pre>";

		$test_perms = array();

		// Выход
		if(isset($_GET['auth_action']))
		{
			if ($_GET['auth_action']=='logout')
				{			
					unset($_SESSION['manager']);
					header('Location: '.$this->config->root_url.'/simpla');
				}
				else
				{
					unset($_SESSION['manager']);
					header('Location: '.$this->config->root_url);					
				}
		}


		// Проверка на ограничение доступа в связи с частыми попытками
		if (isset($_SESSION['access_denied']))
		{
			if ((intval(time()) - intval($_SESSION['access_denied_time'])) > 300) 
			{
				unset($_SESSION['access_denied']);
				unset($_SESSION['password_try_count']);
				unset($_SESSION['access_denied_time']);				
			}
			return $this->body = $this->design->fetch('login.tpl');
		}

		
		if (!isset($_SESSION['manager']))
		{	
			if (isset($_POST['login']) && isset($_POST['password']))
			{
				$login = $this->request->post('login', 'string');
				$password = $this->request->post('password', 'string');
				
				if($manager_id = $this->managers->check_password($login, $password))		
				{										
					$_SESSION['manager'] = $this->managers->get_manager($manager_id);
					$_SESSION['manager']->permissions = unserialize($_SESSION['manager']->permissions);
					$this->manager = $_SESSION['manager'];
					$this->design->assign('manager', $this->manager);
					$this->managers->update_manager($this->manager->id, array('last_login'=>'NOW()'));
					unset($_SESSION['password_try_count']);
					header('Location: '.$this->config->root_url.'/simpla');
				}
				else
				{
					$this->design->assign('incorrect', '1');
					$this->design->assign('login', $login);

					if (!isset($_SESSION['password_try_count'])) 
						$_SESSION['password_try_count'] = 1;
					else 
						$_SESSION['password_try_count']++;

					if (intval($_SESSION['password_try_count']) > 10) 
					{
						$_SESSION['access_denied'] = true;
						$_SESSION['access_denied_time'] = time();
						unset($_SESSION['password_try_count']);
					}

					return $this->body = $this->design->fetch('login.tpl');
				}
			}
			else
			{

				return $this->body = $this->design->fetch('login.tpl');				
			}

		}
		else
		{
			$this->manager = $_SESSION['manager'];
			$this->design->assign('manager', $this->manager);	
		}

		if (!isset($_SESSION['manager'])) die();

 		// Берем название модуля из get-запроса
		$module = $this->request->get('module', 'string');
		$module = preg_replace("/[^A-Za-z0-9]+/", "", $module);
		

		if(empty($module))
			$module = 'PagesAdmin';

		// Подключаем файл с необходимым модулем
		require_once('simpla/'.$module.'.php');  
		
		// Создаем соответствующий модуль
		if(class_exists($module))
			$this->module = new $module();
		else
			die("Error creating $module class");		
		
		// Проверка прав доступа к модулю
		if(isset($this->modules_permissions[get_class($this->module)]) && $this->managers->access($this->modules_permissions[get_class($this->module)]))
		{
			$content = $this->module->fetch();
			$this->design->assign("content", $content);
		}
		else
		{
			$this->design->assign("content", "Нет доступа к модулю");
		}

		// Счетчики для верхнего меню
		$new_orders_counter = $this->orders->count_orders(array('status'=>0));
		$this->design->assign("new_orders_counter", $new_orders_counter);

		$new_deals_counter = $this->deals->count_orders(array('status'=>0));
		$this->design->assign("new_deals_counter", $new_deals_counter);		
		
		$new_comments_counter = $this->comments->count_comments(array('approved'=>0));
		$this->design->assign("new_comments_counter", $new_comments_counter);
		
		// Создаем текущую обертку сайта (обычно index.tpl)
		$wrapper = $this->design->smarty->getTemplateVars('wrapper');
		if(is_null($wrapper))
			$wrapper = 'index.tpl';
			
		if(!empty($wrapper))
			return $this->body = $this->design->fetch($wrapper);
		else
			return $this->body = $content;
	}
}