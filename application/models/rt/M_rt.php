<?php 
class M_rt extends CI_Model
{
	function get_rt($id_rt,$perpage,$offset)
	{
		$this->db->where('id_rt',$id_rt);
		$this->db->where('status !=','Meninggal');
		$this->db->where('tahun',date('Y'));
		// $this->db->from('penduduk',$perpage,$offset);
		// $this->db->join('rt','rt.id_rt = penduduk.id_rt');
		return $this->db->get("penduduk",$perpage,$offset)->result();
	}
	function get_rt1($perpage,$offset)
	{
		return $this->db->get("rt1",$perpage,$offset)->result();
	}

	function get_rt2($perpage,$offset)
	{
		return $this->db->get("rt2",$perpage,$offset)->result();
	}

	function get_rt3($perpage,$offset)
	{
		return $this->db->get("rt3",$perpage,$offset)->result();
	}

	function get_rt4($perpage,$offset)
	{
		return $this->db->get("rt4",$perpage,$offset)->result();
	}

	function get_rt5($perpage,$offset)
	{
		return $this->db->get("rt5",$perpage,$offset)->result();
	}

	function get_rt6($perpage,$offset)
	{
		return $this->db->get("rt6",$perpage,$offset)->result();
	}
}