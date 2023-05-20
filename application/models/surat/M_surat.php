<?php
class M_surat extends CI_Model
{
	function cetaksurat()
	{
		// $this->db->select('no_ktp');
		$data = $this->db->get('penduduk')->result();
		return $data;
	}

	function rt()
	{
		$this->db->order_by('rt');
		return $this->db->get('rt')->result();
	}

	function list($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$this->db->where('status!=','Meninggal');
		$query = $this->db->get('penduduk')->result();
		$output = '<option value="">Pilih No KTP</option>';
		foreach ($query as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function listPktp($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$this->db->where('kepalakk',1);
		$this->db->order_by('nama','ASC');
		$query = $this->db->get('penduduk')->result();
		$output = '<option value="">Pilih No KK</option>';
		foreach ($query as $key) 
		{
			$output .= '<option value="'.$key->no_kk.'">'.$key->no_kk.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function name($ktp)
	{
		$this->db->where('id_penduduk',$ktp);
		$query = $this->db->get('penduduk')->result();
		foreach ($query as $key) 
		{
			$data = array(
				'nama' => $key->nama,
				'kelamin' => $key->jenis_kelamin,
				'ttl' => tgl_indo($key->tanggal_lahir),
				'kerja' => $key->pekerjaan,
				'kawin' => $key->status,
				'alamat' => $key->alamat,
				'umur' => $key->umur,
				'agama' => $key->agama,
			);
		}
		return $data;
	}

	function rtadmin($idadmin)
	{
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$data = $this->db->get_where('penduduk',['penduduk.id_penduduk'=>$idadmin])->result();

		return $data;
	}

	function rw()
	{
		$this->db->where('jabatan','RW');
		return $this->db->get('user')->result();
	}
}