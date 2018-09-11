<?php

/**
 * Simpla CMS
 *
 * @copyright	2011 Denis Pikusov
 * @link		http://simplacms.ru
 * @author		Denis Pikusov
 *
 */
 
require_once('Simpla.php');

class Managers extends Simpla
{	
	public $permissions_list = array('products', 'categories', 'brands', 'features', 'orders', 'labels',
		'users', 'groups', 'coupons', 'pages', 'blog', 'comments', 'feedbacks', 'import', 'export',
		'backup', 'stats', 'design', 'settings', 'currency', 'delivery', 'payment', 'managers', 'license',
		'auctions','lots');
		
	public $passwd_file = "simpla/.passwd";

	private $salt = 'num4gfg5k2312kgfh54hfdg4hrtfgnret4654';	

	public function __construct()
	{
		
	}


	function get_manager($id)
	{
		$this->db->query("SELECT * FROM __managers WHERE id=?", intval($id));
		return $this->db->result();
	}

	function get_manager_by_login($login)
	{
		$this->db->query("SELECT * FROM __managers WHERE login=?", $login);
		return $this->db->result();
	}	

	public function add_manager($manager)
	{
		$manager = (array)$manager;
		$manager['password'] = $this->encpassword($manager['password']);
		$query = $this->db->placehold("INSERT INTO __managers SET ?%", $manager);		
		$this->db->query($query);
	}

	public function encpassword($pass)
	{
		return md5($this->salt.$pass.md5($pass));
	}

	public function check_password($login, $password)
	{
		$encpassword = $this->encpassword($password);
		$query = $this->db->placehold("SELECT id FROM __managers WHERE login=? AND password=? LIMIT 1", $login, $encpassword);
		$this->db->query($query);
		if($id = $this->db->result('id'))
			return $id;
		return false;
	}	

	public function get_managers()
	{
		$this->db->query("SELECT id, login, permissions FROM __managers");
		$managers = $this->db->results();
		foreach ($managers as $m) {
			$m->permissions = unserialize($m->permissions);
		}
		return $managers;
	}
		
	public function count_managers($filter = array())
	{
		return count($this->get_managers());
	}
		
	public function update_manager($id, $manager)
	{
		$manager = (array)$manager;
		if(isset($manager['password']))
			$manager['password'] = md5($this->salt.$manager['password'].md5($manager['password']));
		$query = $this->db->placehold("UPDATE __managers SET ?% WHERE id=? LIMIT 1", $manager, intval($id));
		$this->db->query($query);
		return $id;
	}

	public function update_manager_by_login($login, $manager)
	{
		$manager = (array)$manager;
		if(isset($manager['password']))
			$manager['password'] = md5($this->salt.$manager['password'].md5($manager['password']));
		$query = $this->db->placehold("UPDATE __managers SET ?% WHERE login=? LIMIT 1", $manager, $login);
		$this->db->query($query);
		return $login;
	}	
	
	public function delete_manager($login)
	{
		$this->db->query("DELETE FROM __managers WHERE login=?", $login);
	}
	
	private function crypt_apr1_md5($plainpasswd) {
		$salt = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
		$len = strlen($plainpasswd);
		$text = $plainpasswd.'$apr1$'.$salt;
		$bin = pack("H32", md5($plainpasswd.$salt.$plainpasswd));
		for($i = $len; $i > 0; $i -= 16) { $text .= substr($bin, 0, min(16, $i)); }
		for($i = $len; $i > 0; $i >>= 1) { $text .= ($i & 1) ? chr(0) : $plainpasswd{0}; }
		$bin = pack("H32", md5($text));
		for($i = 0; $i < 1000; $i++) {
			$new = ($i & 1) ? $plainpasswd : $bin;
			if ($i % 3) $new .= $salt;
			if ($i % 7) $new .= $plainpasswd;
			$new .= ($i & 1) ? $bin : $plainpasswd;
			$bin = pack("H32", md5($new));
		}
		$tmp = '';
		for ($i = 0; $i < 5; $i++) {
			$k = $i + 6;
			$j = $i + 12;
			if ($j == 16) $j = 5;
			$tmp = $bin[$i].$bin[$k].$bin[$j].$tmp;
		}
		$tmp = chr(0).chr(0).$bin[11].$tmp;
		$tmp = strtr(strrev(substr(base64_encode($tmp), 2)),
		"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",
		"./0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
		return "$"."apr1"."$".$salt."$".$tmp;
	}

	public function access($module)
	{
		$manager = $_SESSION['manager'];
		if(is_array($manager->permissions))
			return in_array($module, $manager->permissions);
		else
			return false;
	}
}