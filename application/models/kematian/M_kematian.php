<?php 
class M_kematian extends CI_Model
{
	function get_kematian($perpage,$offset)
	{
		$this->db->from('kematian');
		$this->db->join('penduduk','penduduk.id_penduduk = kematian.id_penduduk');
		return $this->db->get("",$perpage,$offset)->result();
	}

	function edit($id_penduduk)
	{
		$this->db->from('kematian');
		$this->db->where('kematian.id_penduduk',$id_penduduk);
		$this->db->join('penduduk','penduduk.id_penduduk = kematian.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$q=$this->db->get('');

		return $q;
	}

	function update($post,$id)
	{
		$alamatmati = $this->db->get_where('rt',['id_rt' => $post['rt']])->row_array();
		$alamat = "RT.".$alamatmati['rt']." / RW.05, Basongan, Kalisalak";

		$kkmati = $this->db->get_where('penduduk',['id_penduduk'=>$id])->row_array();

		$kk = $this->db->get_where('penduduk',['no_kk'=>$kkmati['no_kk'],'tahun'=>date('Y')])->result();

		if ($post['status']!="Meninggal") 
		{
			if ($post['kelamin']=="Perempuan" && $post['status']=="Menikah") 
			{
				$statuskeluarga = "Istri";
			} elseif ($post['kelamin']=="Laki-laki" && $post['status']=="Menikah") 
				{
					$statuskeluarga = "Suami";
				} elseif($post['status']=="Lajang")
					{
						$statuskeluarga = "Anak";
					} elseif ($post['status']=="Janda") 
						{
							$statuskeluarga = "Nenek";
						} elseif($post['status']=="Duda")
							{
								$statuskeluarga = "Kakek";
							}

				$data = array(
					'nama' => $post['nama'],
					'tempat_lahir' => $post['tempat'],
					'tanggal_lahir' => $post['ttl'],
					'umur' => $post['umur'],
					'jenis_kelamin' => $post['kelamin'],
					'agama' => $post['agama'],
					'status' => $post['status'],
					'statuskeluarga' => $statuskeluarga,
					'id_rt' => $post['rt'],
					'alamat' => $alamat,
					'tahun' => date('Y'),
				);
				$this->db->update('penduduk',$data,['id_penduduk'=>$id]);

				foreach ($kk as $hidup) 
				{
					if ($hidup->status=="Janda"&&$post['status']=="Menikah"&&$post['kelamin']=="Laki-laki") 
					{
						$data = array(
						'status' => $post['status'],
						'statuskeluarga' => "Istri",
						'tahun' => date('Y'),
						);
						$this->db->update('penduduk',$data,['id_penduduk'=>$hidup->id_penduduk]);
						
					} elseif($hidup->status=="Duda"&&$post['status']=="Menikah"&&$post['kelamin']=="Perempuan")
						{
							$data = array(
							'status' => $post['status'],
							'statuskeluarga' => "Suami",
							'tahun' => date('Y'),
							);
							$this->db->update('penduduk',$data,['id_penduduk'=>$hidup->id_penduduk]);
						}
				}

				$this->db->delete('kematian',['id_penduduk'=>$id]);
		} else
			{
				$data = array(
					'nama' => $post['nama'],
					'tempat_lahir' => $post['tempat'],
					'tanggal_lahir' => $post['ttl'],
					'umur' => $post['umur'],
					'jenis_kelamin' => $post['kelamin'],
					'agama' => $post['agama'],
					'status' => $post['status'],
					'id_rt' => $post['rt'],
					'alamat' => $alamat,
					'tahun' => date('Y'),
				);
				$this->db->update('penduduk',$data,['id_penduduk'=>$id]);

				$mati = array(
					'tanggal_kematian' => $post['tkm'],
				);
				$this->db->update('kematian',$mati,['id_penduduk'=>$id]);
			}
	}


	function surat()
	{
		// $this->db->select('penduduk.id_rt');
		$this->db->where('status','Meninggal');
		// $this->db->join('penduduk','penduduk.id_penduduk = kematian.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		return $data = $this->db->get('penduduk')->result();

		// $uniq = array_unique(array_column($data, 'id_rt'));
		// return $uniq;

	}

	// jquery

	function ktp($rtmati)
	{
		$data = $this->db->get_where('penduduk',['status'=>'Meninggal','id_rt'=>$rtmati])->result();
		$output = '<option value="">--Pilih No KTP--</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}

		return $output;
	}

	function json_ktp($ktpkematian)
	{
		$this->db->where('penduduk.id_penduduk',$ktpkematian);
		$this->db->join('kematian','kematian.id_penduduk = penduduk.id_penduduk');
		$data = $this->db->get('penduduk')->result();
		foreach ($data as $key) 
		{
			$json = array(
				'nama' => $key->nama,
				'jk' => $key->jenis_kelamin,
				'ttl' => $key->tanggal_lahir,
				'umur' => $key->umur,
				'tgl_mati' => $key->tanggal_kematian,
				'alamat' => $key->alamat,
				'agama' => $key->agama,
			);
		}
		return $json;
	}

	// surat kematian
	function list_pemohon($rt)
	{
		$data = $this->db->get_where('penduduk',['id_rt' => $rt,'tahun' => date('Y')])->result();
		$output = '<option value="">Pilih No KTP</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function namapemohon($ktppemohon)
	{
		$this->db->where('id_penduduk',$ktppemohon);
		$query = $this->db->get('penduduk')->result();
		foreach ($query as $key) 
		{
			$data = array(
				'nama' => $key->nama,
			);
		}
		return $data;
	}
	// end surat kematian

	//end jquery

	function admin($idadmin)
	{
		$this->db->where('id_penduduk',$idadmin);
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$result = $this->db->get('penduduk')->result();
		return $result;
	}

	function hapus_banyak($key)
	{
		$this->db->where('no_ktp',$key);
		$this->db->delete('kematian');
	}

	function hapus($id_penduduk)
	{
		$this->db->where('id_penduduk',$id_penduduk);
		return $this->db->delete('kematian');
	}
}
?>