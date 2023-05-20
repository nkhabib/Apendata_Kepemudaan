<?php
class M_login extends CI_Model
{
	function updateYear()
	{
		// $year = date('Y');
		// $oldYear = date('Y') - 1;
		$condition = array('tahun' => date('Y')-1,'status !=' => 'Meninggal');
		$this->db->where($condition);
		$this->db->set('tahun', date('Y'));
		$this->db->update('penduduk');
	}

	function auth_kadus($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}

	function auth_kpemuda($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}

	function auth_RT($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}

	function auth_RW($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}

	function auth_sekretaris($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}

	function auth_bendahara($username,$password)
	{
		$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1");
		return $query;
	}
}

?>