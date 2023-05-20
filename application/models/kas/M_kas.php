<?php

class M_kas extends CI_Model
{

	function get_kas()
	{
		return $this->db->get("kas_pemuda")->result();
	}

	function tambah($data)
	{
		return $this->db->insert('kas_pemuda',$data);
	}

	function hapus($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('kas_pemuda');
	}

	function cetak($tahun)
	{
		if ($tahun !== 'semua') 
		{
			$this->db->or_like('tanggal',$tahun);
			return $data = $this->db->get('kas_pemuda')->result();
		} else {
			return $this->db->get('kas_pemuda')->result();
		}
	}


	function update($post)
	{
		$id = $post['id'];
		$makel = $post['makel'];
		$tgl = $post['tgl'];
		$ket = $post['ket'];
		$jum = $post['jum'];

		$data = array(
			'tanggal' => $tgl,
			'makel' => $makel,
			'keterangan' => $ket,
			'jumlah' => $jum,
		);

		$this->db->where('id',$id);
		return $this->db->update('kas_pemuda',$data);
	}
}
?>