<?PHP
require_once('api/Simpla.php');

class UserAdmin extends Simpla
{	
	public function fetch()
	{
		$user = new stdClass;
		if(!empty($_POST['user_info']))
		{
			$new_user = false;

			if ($_POST['id'])
				$user->id = $this->request->post('id', 'integer');
			else
				$new_user = true;

			$user->enabled = $this->request->post('enabled');
			$user->login = $this->request->post('login');
			$user->name = $this->request->post('name');
			$user->fam = $this->request->post('fam');
			$user->otch = $this->request->post('otch');
			$user->email = $this->request->post('email');
			$user->group_id = $this->request->post('group_id');

			$user->area = $this->request->post('area');
			$user->postcode = $this->request->post('postcode');
			$user->city = $this->request->post('city');
			$user->region = $this->request->post('region');
			$user->street = $this->request->post('street');
			$user->number = $this->request->post('number');
			$user->housing = $this->request->post('housing');
			$user->office = $this->request->post('office');
			$user->phone = $this->request->post('phone');			

			$user->commission = $this->request->post('commission');	

			if ($this->request->post('seller')=='on')
				$user->seller = 1;
			else
				$user->seller = 0;

			if ($this->request->post('buyer')=='on')
				$user->buyer = 1;
			else
				$user->buyer = 0;

			//echo "<pre>"; print_r($user); die();

			## Не допустить одинаковые email пользователей.
			if(empty($user->name))
			{			
				$this->design->assign('message_error', 'empty_name');
			}
			elseif(empty($user->email))
			{			
				$this->design->assign('message_error', 'empty_email');
			}
			elseif(($u = $this->users->get_user($user->email)) && $u->id!=$user->id)
			{			
				$this->design->assign('message_error', 'login_existed');
			}
			else
			{

				if (!empty($_POST['new_password']))
				{
					$user->password = $this->request->post('new_password');
					$this->notify->email_password_change($user, $user->email);
				}

				if ($new_user)
				{
					$user->enabled = 1;
					$user->id = $this->users->add_user($user);	
					if ($user->group_id == 2) $this->notify->email_registration($user, $user->email);
					$this->design->assign('message_success', 'added');
				}
				else
				{
					$user->id = $this->users->update_user($user->id, $user);					
					$this->design->assign('message_success', 'updated');
				}

  				
   	    		$user = $this->users->get_user(intval($user->id));
   	    		$document_file = $this->request->files('document');
   	    		

   	    		if ($this->request->post('del_document')=='1')
   	    		{   	    			
   	    			chmod($this->config->root_dir.$this->config->doc_dir.$user->document, 0777);
   	    			unlink($this->config->root_dir.$this->config->doc_dir.$user->document);
   	    			$this->users->update_user($user->id, array('document'=>''));
   	    		}
   	    		
   	    		if ($document_file['name']!='')
   	    		{ 
   	    			$ext = end(explode('.',$document_file['name']));   	    			
   	    			$image = $this->image->upload_image($document_file['tmp_name'], 'user_'.$user->id.'_doc'.$this->users->rand_str(6).'.'.$ext, true);
					$user->document = $image;
					$this->users->update_user($user->id, array('document'=>$image));
				}

			}
		}
		elseif($this->request->post('check'))
		{ 
			// Действия с выбранными
			$ids = $this->request->post('check');
			if(is_array($ids))
			switch($this->request->post('action'))
			{
				case 'delete':
				{
					foreach($ids as $id)
					{
						$o = $this->orders->get_order(intval($id));
						if($o->status<3)
						{
							$this->orders->update_order($id, array('status'=>3, 'user_id'=>null));
							$this->orders->open($id);							
						}
						else
							$this->orders->delete_order($id);
					}
					break;
				}
			}
 		}
		$id = $this->request->get('id', 'integer');

		if (isset($_GET['action']) && $_GET['action']=='open_print1' && intval($_GET['auction_id']) > 0 )
		{
			$auction_id = intval($_GET['auction_id']);

			$body = $this->pages->get_page('print1');
			$lots = $this->auctions->get_lots_frontend(array('auction_id'=>$auction_id, 'status'=>5, 'user_id'=>$id, 'minimal'=>1, 'no_bets'=>1, 'limit'=>300, 'page'=>1));

			if (count($lots)==0) die('Лотов нет');

			$this->design->assign('lots', $lots);
			$this->design->assign('body', $body->body);
			
			echo $this->design->fetch('print1.tpl');
			die();
		}

		if(!empty($id))
		{
			$user = $this->users->get_user(intval($id));
		}
		else
		{
			$this->design->assign('user_adding', '1');
		}		

		if(!empty($user))
		{
			$this->design->assign('user', $user);
			
			$auction_filter = 0;
			if (isset($_GET['auction_filter']))
			{
				$auction_filter = (int)$_GET['auction_filter'];
			}

			$deals = $this->deals->get_user_deals(intval($user->id), $auction_filter);

			//echo "<pre>"; print_r($deals); die();
			$this->design->assign('deals', $deals);		

			$lots_filter['user_id'] = $user->id;

			if (isset($_GET['auction_filter2']))
			$lots_filter['auction_id'] = (int)$_GET['auction_filter2'];

			$lots_filter['minimal'] = 1;
			$lots_filter['no_bets'] = 1;


	  		$products_count = $this->auctions->count_lots($lots_filter);

			$lots_filter['page'] = max(1, $this->request->get('page', 'integer'));			
			$lots_filter['limit'] = $this->settings->products_num_admin;
		
			if($lots_filter['limit']>0)	  	
		  		$pages_count = ceil($products_count/$lots_filter['limit']);
			else
		  		$pages_count = 0;
	  		$lots_filter['page'] = min($lots_filter['page'], $pages_count);
	 		$this->design->assign('products_count', $products_count);
	 		$this->design->assign('pages_count', $pages_count);
	 		$this->design->assign('current_page', $lots_filter['page']);


			$lots = $this->auctions->get_lots_frontend($lots_filter); //echo "<pre>"; print_r($lots); die();  
			$this->design->assign('lots', $lots);

		}

		
 	  	$groups = $this->users->get_groups();
		$this->design->assign('groups', $groups);

		$this->design->assign('auctions',$this->auctions->get_auctions(array('no_lots'=>1)));
		
 	  	return $this->design->fetch('user.tpl');
	}
	
}

