<?PHP

require_once('api/Simpla.php');

############################################
# Class Properties displays a list of product parameters
############################################
class UsersAdmin extends Simpla
{
	function fetch()
	{	

		if($this->request->method('post'))
		{
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
			    case 'disable':
			    {
			    	foreach($ids as $id)
						$this->users->update_user($id, array('group_id'=>3));    
					break;
			    }
			    case 'enable':
			    {
			    	foreach($ids as $id)
						$this->users->update_user($id, array('group_id'=>2));    
			        break;
			    }
			    case 'delete':
			    {
			    	foreach($ids as $id)
						$this->users->delete_user($id);    
			        break;
			    }
			}		
		}  

		foreach($this->users->get_groups() as $g)
			$groups[$g->id] = $g;
		
		
		$group = null;
		$filter = array();
		$filter['page'] = max(1, $this->request->get('page', 'integer')); 		
		$filter['limit'] = 20;

		$group_id = $this->request->get('group_id', 'integer');
		if($group_id)
		{
			$group = $this->users->get_group($group_id);
			$filter['group_id'] = $group->id;
		}

		$user_type = $this->request->get('user_type', 'integer');
		if ($user_type)
		{
			if ($user_type==1) $filter['seller'] = 1;
			if ($user_type==2) $filter['buyer'] = 1;
			$this->design->assign('user_type',$user_type);
		}		
		
		// Поиск
		$keyword = $this->request->get('keyword', 'string');
		if(!empty($keyword))
		{
			$filter['keyword'] = $keyword;
			$this->design->assign('keyword', $keyword);
		}		
		
		// Сортировка пользователей, сохраняем в сессии, чтобы текущая сортировка не сбрасывалась
		if($sort = $this->request->get('sort', 'string'))
			$_SESSION['users_admin_sort'] = $sort;		
		if (!empty($_SESSION['users_admin_sort']))
			$filter['sort'] = $_SESSION['users_admin_sort'];			
		else
			$filter['sort'] = 'name';			
		$this->design->assign('sort', $filter['sort']);
		
		$users_count = $this->users->count_users($filter);
		// Показать все страницы сразу
		if($this->request->get('page') == 'all')
			$filter['limit'] = $users_count;	

		$users = $this->users->get_users($filter);
		foreach ($users as $user)
		{
			$user->buys_count = $this->deals->get_user_buys_count(intval($user->id));
			$user->sells_count = $this->deals->get_user_sells_count(intval($user->id));
			$user->deals_count = (int)$user->buys_count + (int)$user->sells_count;
		}
		$this->design->assign('pages_count', ceil($users_count/$filter['limit']));
		$this->design->assign('current_page', $filter['page']);
		$this->design->assign('groups', $groups);		
		$this->design->assign('group', $group);
		$this->design->assign('users', $users);
		$this->design->assign('users_count', $users_count);
		return $this->body = $this->design->fetch('users.tpl');
	}
}
