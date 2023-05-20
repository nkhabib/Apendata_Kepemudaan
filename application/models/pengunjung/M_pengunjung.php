<?php 
class M_pengunjung extends CI_Model
{
	function get_pemuda ($perpage,$offset)
	{
		return $this->db->get("pemuda",$perpage,$offset)->result();
	}

	function get_pemudart ($perpage,$offset,$angka)
	{
		return $this->db->get_where("pemuda",array('rt' => $angka, ),$perpage,$offset)->result();
	}

	function caripemuda($berdasarkan,$yangdicari)
	{
		$this->db->from('pemuda');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('tanggal_lahir',$yangdicari);
			$this->db->or_like('jenis_kelamin',$yangdicari);
			$this->db->or_like('umur',$yangdicari);
            $this->dc->or_like('agama',$yangdicari);
			$this->db->or_like('status',$yangdicari);
			$this->db->or_like('alamat',$yangdicari);
			$this->db->or_like('pekerjaan',$yangdicari);
				
				break;

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}

		return $this->db->get();
	}

	function get_penduduk ($perpage,$offset)
	{
		return $this->db->get("penduduk",$perpage,$offset)->result();
	}

	function get_pendudukrt ($perpage,$offset,$angka)
	{
		return $this->db->get_where("penduduk",array('rt' => $angka, ),$perpage,$offset)->result();
	}

	function caripenduduk($berdasarkan,$yangdicari)
	{
		$this->db->from('penduduk');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('tanggal_lahir',$yangdicari);
			$this->db->or_like('jenis_kelamin',$yangdicari);
			$this->db->or_like('umur',$yangdicari);
            $this->dc->or_like('agama',$yangdicari);
			$this->db->or_like('status',$yangdicari);
			$this->db->or_like('alamat',$yangdicari);
			$this->db->or_like('pekerjaan',$yangdicari);
				
				break;

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}

		return $this->db->get();
	}

	function get_kelahiran ($perpage,$offset)
	{
		return $this->db->get("kelahiran",$perpage,$offset)->result();
	}

	function carikelahiran($berdasarkan,$yangdicari)
	{
		$this->db->from('kelahiran');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('tanggal_lahir',$yangdicari);
			$this->db->or_like('tempat_lahir',$yangdicari);
			$this->db->or_like('nama_ayah',$yangdicari);
            $this->dc->or_like('nama_ibu',$yangdicari);
			$this->db->or_like('berat',$yangdicari);
			$this->db->or_like('panjang',$yangdicari);
				
				break;

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}

		return $this->db->get();
	}

	function uang($perpage,$offset)
	{
		return $this->db->get("kas_pemuda",$perpage,$offset)->result();	
	}

	function cari_uang($berdasarkan,$yangdicari)
	{
		$this->db->from('kas_pemuda');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->or_like('tanggal',$yangdicari);
			$this->db->or_like('keterangan',$yangdicari);
			$this->db->or_like('jumlah',$yangdicari);
				
				break;

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}

		return $this->db->get();
	}
}
?>