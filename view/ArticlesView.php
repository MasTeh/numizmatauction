<?PHP

require_once('View.php');


class ArticlesView extends View
{
	function fetch()
	{

		if (isset($_GET['url']))
		{
			$url = $this->request->get('url');
			$page = $this->pages->get_page($url);
			$this->design->assign('page', $page);
			$this->design->assign('meta_title', $page->meta_title);
			$this->design->assign('meta_keywords', $page->meta_keywords);
			$this->design->assign('meta_description', $page->meta_description);
		}
		else
		{
			$this->design->assign('meta_title', 'Статьи - '.$this->settings->site_name);
		}

		$this->design->assign('articles', $this->pages->get_pages(array('menu_id'=>4)));

		return $this->design->fetch('articles.tpl');
	}
}
