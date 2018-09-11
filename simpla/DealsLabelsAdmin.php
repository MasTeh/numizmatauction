<?PHP 

require_once('api/Simpla.php');

########################################
class DealsLabelsAdmin extends Simpla
{

  public function fetch()
  {
   	// Обработка действий
	if($this->request->method('post'))
	{
		// Сортировка
		$positions = $this->request->post('positions'); 		
 		$ids = array_keys($positions);
		sort($positions);
		foreach($positions as $i=>$position)
			$this->deals->update_label($ids[$i], array('position'=>$position)); 

		
		// Действия с выбранными
		$ids = $this->request->post('check');
		if(is_array($ids))
		switch($this->request->post('action'))
		{
		    case 'delete':
		    {
			    foreach($ids as $id)
					$this->deals->delete_label($id);    
		        break;
		    }
		}				
 	}

	// Отображение
  	$labels = $this->deals->get_labels();

 	$this->design->assign('labels', $labels);
	return $this->design->fetch('deals_labels.tpl');
  }
}


?>