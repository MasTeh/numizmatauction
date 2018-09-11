<?PHP

require_once('View.php');

class AuctionsView extends View
{

	function fetch()
	{
		
		$auctions = $this->auctions->get_auctions(array('no_lots'=>1));
		
		foreach ($auctions as $a) {
			$this->db->query("SELECT count(id) as count FROM __lots WHERE auction_id=".$a->id);
			$a->count = $this->db->result()->count;
		}

		foreach ($auctions as $a) {
			$a->date_start = date('d.m.Y H:i:s', strtotime($a->date_start));


			if ($this->auctions->is_early($a->date_closing))
			{
				$a->date_closing = date('Закрыт d.m.Y', strtotime($a->date_closing));				
			}
			else
			{
				$a->date_closing = date('d.m.Y H:i:s', strtotime($a->date_closing));
			}
		}

		$this->design->assign('auctions', $auctions);
		
		return $this->design->fetch('auctions.tpl');
	}
}