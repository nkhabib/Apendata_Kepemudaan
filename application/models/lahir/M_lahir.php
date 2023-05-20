<?php
class M_lahir extends CI_Model
{
	function get_lahir($perpage,$offset)
	{
		return $this->db->get('kelahiran',$perpage,$offset)->result();
	}

	function rt()
	{
		$this->db->order_by('rt','ASC');
		$data = $this->db->get('rt')->result();
		return $data;
	}

	function nokk($rt) // jquery ajax
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$data = $this->db->get('penduduk')->result();
		$uniq = array_unique(array_column($data, 'no_kk'));
		$output .= '<option value="">--Pilih--</option>';
		foreach ($uniq as $key) 
		{
			$output .= '<option value="'.$key.'">'.$key.'</option>';
		}
		return $output;
	}

	function editnokk($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$data = $this->db->get('penduduk')->result();
		$uniq = array_unique(array_column($data, 'no_kk'));
		$output .= '<option value="">--Pilih--</option>';
		foreach ($uniq as $key) 
		{
			$output .= '<option value="'.$key.'">'.$key.'</option>';
		}
		return $output;	
	}

	function kk($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$data = $this->db->get('penduduk')->result();
		$uniq = array_unique(array_column($data, 'no_kk'));
		return $uniq;
	}

	function ayah($kk)
	{
		return $this->db->get_where('penduduk',['no_kk'=>$kk,'jenis_kelamin'=>'Laki-laki','tahun'=>date('Y')])->result();
	}

	function ibu($kk)
	{
		$this->db->where('no_kk',$kk);
		$this->db->where('jenis_kelamin','Perempuan');
		$this->db->where('tahun',date('Y'));
		return $this->db->get('penduduk')->result();
	}

	function ayahkk($kk) /// jquery
	{
		$this->db->where('no_kk',$kk);
		$this->db->where('tahun',date('Y'));
		$this->db->where('jenis_kelamin','Laki-laki');
		$data = $this->db->get('penduduk')->result();
		$output .= '<option value="">--Pilih--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->nama.'">'.$key->nama.'</option>';
		}
		$output .= '<option value="Belum Diketahui">--Belum Diketahui--</option>';
		return $output;
	}

	function ibukk($kk) //jquery
	{
		$this->db->where('no_kk',$kk);
		$this->db->where('tahun',date('Y'));
		$this->db->where('jenis_kelamin','Perempuan');
		$data = $this->db->get('penduduk')->result();
		$output .= '<option value="">--Pilih--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->nama.'">'.$key->nama.'</option>';
		}
		$output .= '<option value="Belum Diketahui">--Belum Diketahui--</option>';
		return $output;
	}


	function tambah($post)
	{
		$nama = $post['nama'];
		$kelamin = $post['kelamin'];
		$tempat = $post['tempat'];
		$ttl = $post['ttl'];
		$rt = $post['rt'];
		$kk = $post['kk'];
		$ayah = $post['ayah'];
		$ibu = $post['ibu'];
		$kondisi = $post['kondisi'];
		$berat = $post['berat'];
		$panjang = $post['panjang'];
		$pelapor = $post['pelapor'];

		$data = array(
			'nama' => $nama,
			'jenis_kelamin' => $kelamin,
			'tempat_lahir' => $tempat,
			'tanggal_lahir' => $ttl,
			'no_kk' => $kk,
			'nama_ayah' => $ayah,
			'nama_ibu' => $ibu,
			'kondisi' => $kondisi,
			'berat' => $berat,
			'panjang' => $panjang,
			'pelapor' => $pelapor,
		);

		return $this->db->insert('kelahiran',$data);
	}

	function edit($id)
	{
		$this->db->where('id_lahir',$id);
		return $this->db->get('kelahiran')->result();
	}

	function update($post)
	{
		$id = $post['id'];
		$kk = $post['kklahir'];
		$nama = $post['nama'];
		$kelamin = $post['kelamin'];
		$tempat = $post['tempat'];
		$ttl = $post['ttl'];
		$ayah = $post['ayah'];
		$ibu = $post['ibu'];
		$kondisi = $post['kondisi'];
		$berat = $post['berat'];
		$panjang = $post['panjang'];
		$lapor = $post['lapor'];

		$data = array(
			'no_kk' => $kk,
			'nama' => $nama,
			'jenis_kelamin' => $kelamin,
			'tempat_lahir' => $tempat,
			'tanggal_lahir' => $ttl,
			'nama_ayah' => $ayah,
			'nama_ibu' => $ibu,
			'kondisi' => $kondisi,
			'berat' => $berat,
			'panjang' => $panjang,
			'pelapor' => $lapor,
		);

		$this->db->where('id_lahir',$id);
		return $this->db->update('kelahiran',$data);


	}

	function hapusbanyak($id)
	{
		$this->db->where('id_lahir',$id);
		return $this->db->delete('kelahiran');
	}

	function hapus($id)
	{
		$this->db->where('id_lahir',$id);
		return $this->db->delete('kelahiran');
	}

	function kkedit($rt)
	{
		$this->db->where('id_rt',$rt);
		$data = $this->db->get('penduduk')->result();
		return $uniq = array_unique(array_column($data, 'no_kk'));
	}

}
?>