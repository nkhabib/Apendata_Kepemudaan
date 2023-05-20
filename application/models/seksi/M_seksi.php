<?php

class M_seksi extends CI_Model
{
	function get_seksi($perpage,$offset)
	{
		$this->db->join('pemuda','pemuda.id_pemuda = seksi.id_pemuda');
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		return $this->db->get('seksi',$perpage,$offset)->result();
	}

	function ktpseksi($rt)
	{
		$this->db->where('penduduk.id_rt',$rt);
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$data = $this->db->get('pemuda')->result();
		$output = '<option value="" >--Pilih NO KTP--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_pemuda.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function ktpsubmit($rt)
	{
		$this->db->where('penduduk.id_rt',$rt);
		$this->db->join('penduduk','penduduk.id_penduduk =  pemuda.id_penduduk');
		$ktp = $this->db->get('pemuda')->result();
		return $ktp;
	}

	function jsoninput_seksi($ktp)
	{
		$this->db->where('id_pemuda',$ktp);
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$data = $this->db->get('pemuda')->result();
		foreach ($data as $key) 
		{
			$json = array(
				'nama' => $key->nama,
				'jk' => $key->jenis_kelamin,
				'alamat' => $key->alamat,
			);
		}
		return $json;
	}

	function tambah_seksi($post)
	{
		$ktp = $post['ktp'];
		$nama = $post['nama'];
		$jk = $post['jk'];
		$alamat = $post['alamat'];
		$jabatan = $post['jabatan'];

		$data = array(
			'id_pemuda' => $ktp,
			'jabatan' => $jabatan,
		);
		return $this->db->insert('seksi',$data);
	}

	function update($id_seksi,$data)
	{
		return $this->db->update('seksi',$data,['id_seksi'=>$id_seksi]);
	}

}
 ?>