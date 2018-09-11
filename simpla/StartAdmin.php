<?PHP
require_once('api/Simpla.php');

class StartAdmin extends Simpla
{		
	
	public function fetch()
	{	

//unset($_SESSION['auction_started']);
		$managers = $this->managers->get_managers();
		$this->design->assign('managers', $managers);
 
 		if($this->request->method('POST'))
		{

		}

		$this->design->assign('auctions', $this->auctions->get_auctions(array('in_future'=>1)));
 	  	
 	  	return $this->design->fetch('start.tpl');
	}
	
}

