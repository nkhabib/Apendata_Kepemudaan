<?php
class M_print extends CI_Model
{
	function penduduk($post)
	{
		$tahun = $post['tahun'];
		$rt = $post['jenis'];

		if ($rt=="penduduk") 
		{
			$this->db->where('tahun',$tahun);
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$d = $this->db->get('penduduk')->result();
			return $d;
		} else
			{
				$this->db->where('tahun',$tahun);	
				$this->db->where('penduduk.id_rt',$rt);
				$this->db->join('rt','rt.id_rt = penduduk.id_rt');
				$d = $this->db->get('penduduk')->result();
				return $d;
			}
	}

	function jmllaki($post)
	{
		$tahun = $post['tahun'];
		$rt = $post['jenis'];
		if ($rt=="penduduk") 
		{
			$this->db->where('tahun',$tahun);
			$this->db->where('jenis_kelamin','Laki-laki');
			
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$laki = $this->db->get('penduduk')->result();
			$itung = count($laki);
			return $itung;
			
		} else
			{
				$this->db->where('tahun',$tahun);
				$this->db->where('jenis_kelamin','Laki-laki');
				$this->db->where('penduduk.id_rt',$rt);
				$this->db->join('rt','rt.id_rt = penduduk.id_rt');
				$laki = $this->db->get('penduduk')->result();
				$itung = count($laki);
				return $itung;
			}
	}

	function jmlcewek($post)
	{
		$tahun = $post['tahun'];
		$rt = $post['jenis'];

		if ($rt=="penduduk") 
		{
			$this->db->where('tahun',$tahun);
			$this->db->where('jenis_kelamin','Perempuan');
			
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$laki = $this->db->get('penduduk')->result();
			$itung = count($laki);
			return $itung;
			
		} else
			{
				$this->db->where('tahun',$tahun);
				$this->db->where('jenis_kelamin','Perempuan');
				$this->db->where('penduduk.id_rt',$rt);
				$this->db->join('rt','rt.id_rt = penduduk.id_rt');
				$laki = $this->db->get('penduduk')->result();
				$itung = count($laki);
				return $itung;
			}
	}

	function jmlkepala($post)
	{
		$tahun = $post['tahun'];
		$rt = $post['jenis'];

		if ($rt=="penduduk") 
		{
			$this->db->where('tahun',$tahun);
			$this->db->where('kepalakk',1);
			
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$laki = $this->db->get('penduduk')->result();
			$itung = count($laki);
			return $itung;
			
		} else
			{
				$this->db->where('tahun',$tahun);
				$this->db->where('kepalakk',1);
				$this->db->where('penduduk.id_rt',$rt);
				$this->db->join('rt','rt.id_rt = penduduk.id_rt');
				$laki = $this->db->get('penduduk')->result();
				$itung = count($laki);
				return $itung;
			}
	}

	function jmlrt($post)
	{
		$tahun = $post['tahun'];
		$jenis = $post['jenis'];

		$this->db->select('id_rt');
		$rt = $this->db->get('penduduk')->result();
		$uniq = array_unique(array_column($rt, 'id_rt'));

		foreach ($uniq as $key) 
		{
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$this->db->where('penduduk.id_rt',$key);
			$this->db->where('tahun',$tahun);
			$namart = $this->db->get('penduduk')->row_array();

			$this->db->where('id_rt',$key);
			$this->db->where('tahun',$tahun);
			$data = $this->db->get('penduduk')->result();
			$jmlrt = "RT ".$namart['rt']." : ".count($data)." Penduduk";
			$allrt[] = $jmlrt;
		}

		return $allrt;
	}

	function list($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$query = $this->db->get('penduduk')->result();
		$output = '<option value="">Pilih No KTP</option>';
		foreach ($query as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function name($ktp)
	{
		$this->db->where('id_penduduk',$ktp);
		$this->db->where('tahun',date('Y'));
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

	function printtrans($ktp)
	{
		$data = $this->db->get_where('penduduk',['id_penduduk' => $ktp])->result();
		return $data;
	}

	function trans($ktp,$tahun)
	{
	
		$this->db->where('transaksi.id_penduduk',$ktp);
		$this->db->where('penduduk.tahun',$tahun);
		$this->db->join('penduduk','penduduk.id_penduduk = transaksi.id_penduduk');
		$data = $this->db->get('transaksi');

		return $data;
	}
}