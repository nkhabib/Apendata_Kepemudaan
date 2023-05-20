<?php
class M_pemuda extends CI_Model
{
	function get_pemuda ($perpage,$offset)
	{
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		return $this->db->get("pemuda",$perpage,$offset)->result();
	}

	function rt() // jquery
	{
		return $this->db->get('rt')->result();
	}

	function ktp($rt) // jquery
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('umur >=',13);
		$this->db->where('umur <=',30);
		$this->db->where('tahun',date('Y'));
		$data = $this->db->get('penduduk')->result();
		$output = '<option value="">--Pilih No KTP--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function jsoninput($ktp)
	{
		$this->db->where('id_penduduk',$ktp);
		$data = $this->db->get('penduduk')->result();
		foreach ($data as $key) 
		{
			$kepalakk = $key->kepalakk;
			if ($kepalakk == 1) 
			{
				$hasil = "Ya";
			} else 
				{
					$hasil = "Tidak";
				}
			$json = array(
				'kk' => $key->no_kk,
				'nama' => $key->nama,
				'ttl' => $key->tanggal_lahir,
				'kelamin' => $key->jenis_kelamin,
				'umur' => $key->umur,
				'agama' => $key->agama,
				'status' => $key->status,
				'sttsklg' => $key->statuskeluarga,
				'kepalakk' => $hasil,
				'alamat' => $key->alamat,
				'kerja' => $key->pekerjaan,
			);
		}
		return $json;
	}

	function ktpadmin($rtadmin)
	{
		$this->db->where('id_rt',$rtadmin);
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$data = $this->db->get('pemuda')->result();
		$output = '<option value="">--Pilih No KTP--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function jsoninput_admin($ktp)
	{
		$this->db->where('id_penduduk',$ktp);
		$data = $this->db->get('penduduk')->result();
		foreach ($data as $key) 
		{
			$json = array(
				'kk' => $key->no_kk,
				'nama' => $key->nama,
			);
		}
		return $json;
	}

	function tambah_admin($post)
	{
		$ktp = $post['ktp'];
		$username = $post['username'];
		$password = $post['password'];
		$jabatan = $post['jabatan'];

		$data = array(
			'id_penduduk' => $ktp,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'jabatan' => $jabatan,
		);
		return $this->db->insert('user',$data);
	}

	function update($id_penduduk,$data)
	{
		return $this->db->update('penduduk',$data,['id_penduduk' => $id_penduduk]);
	}

	function ktp_rt($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('umur >=',13);
		$this->db->where('umur <=',30);
		$ktp = $this->db->get('penduduk')->result();
		return $ktp;
	}

	function ktpsubmit($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('umur >=', 15);
		$this->db->where('umur <=', 30);
		$this->db->where('tahun',date('Y'));
		$ktp = $this->db->get('penduduk')->result();
		return $ktp;
	}

	function tambah($post)
	{
		$data = array(
			'id_penduduk' => $post['ktp']
		);
		return $this->db->insert('pemuda',$data);
	}

	function trash($id_pemuda)
	{
		$this->db->where('id_pemuda',$id_pemuda);
		return $this->db->delete('pemuda'); //agar pesan isinya benar data dihapus harus diberi return
	}
}
?>