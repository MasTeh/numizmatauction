<?PHP

require_once('View.php');

class WordsView extends View
{
	function fetch()
	{

		$symbol = $this->request->get('symbol', 'string');

		if (!empty($symbol))
		{
			$pages = $this->pages->get_pages_by_symbol($symbol);
			$this->design->assign('meta_title', 'Слова на '.$symbol.' - '.$this->settings->site_name);
			$this->design->assign('symbol', $symbol);
			$this->design->assign('word_pages', $pages);
			return $this->design->fetch('words_list.tpl');
		}
		else
		{		
			$this->design->assign('meta_title', 'Словарь - '.$this->settings->site_name);
			return $this->design->fetch('words.tpl');
		}
						
	}
}