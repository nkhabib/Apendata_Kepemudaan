<?php

class M_rtrw extends CI_Model
{
	function get_rtrw()
	{
		$this->db->from('rt_rw');
		$this->db->join('penduduk','penduduk.id_penduduk = rt_rw.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		// $this->db->order_by('id_penduduk','ASC');
		// ASC dari a-z 1-10,
		//DESC dari z-a 10-1,
		return $this->db->get('')->result();
	}

	function rt()
	{
		$this->db->order_by('rt','ASC');
		return $this->db->get('rt')->result();
	}

	function ktp_tombol($rt)
	{
		$data = $this->db->get_where('penduduk',['id_rt' => $rt,'tahun' => date('Y')])->result();
		return $data;
	}

	function ktp($rt) //jquery
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$ktp_rtrw = $this->db->get('penduduk')->result();
		$output = '<option value="">--Pilih--</option>';

		foreach ($ktp_rtrw as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}

		return $output;
	}

	function json_rtrw($ktp) // jquery json
	{
		$this->db->where('id_penduduk',$ktp);
		$this->db->where('tahun',date('Y'));
		$this->db->from('penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$data = $this->db->get('')->result();
		foreach ($data as $key) 
		{
			$json = array(
				'kk' => $key->no_kk,
				'nama' => $key->nama,
				'ttl' => $key->tanggal_lahir,
				'jk' => $key->jenis_kelamin,
				'umur' => $key->umur,
				'agama' => $key->agama,
				'status' => $key->status,
				'alamat' => $key->alamat,
				'pekerjaan' => $key->pekerjaan,
				'rt' => $key->rt,
			);
		}

		return $json;
	}

	function jabatanrt($ktp) // jquery
	{
		$this->db->where('id_penduduk',$ktp);
		$this->db->where('tahun',date('Y'));
		$output = '<option value="">--Pilih jabatan</option>';
		$this->db->from('penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$data = $this->db->get('')->result();

		foreach ($data as $key) 
		{
			$output .= 	'<option value ="Ketua RT '.$key->rt.'">Ketua RT '.$key->rt.'</option>'.
						'<option value="Ketua RW">Ketua RW</option>';
		}

		return $output;
	}

	function tambah($post)
	{
		$ktp = $post['ktp_rtrw'];
		$kk = $post['kk_rtrw'];
		$nama = $post['nama_rtrw'];
		$ttl = $post['ttl_rtrw'];
		$kelamin = $post['kelamin_rtrw'];
		$umur = $post['umur_rtrw'];
		$agama = $post['agama_rtrw'];
		$status = $post['status_rtrw'];
		$alamat = $post['alamat_rtrw'];
		$pekerjaan = $post['pekerjaan_rtrw'];
		$rt = $post['rt_rw'];
		$jabatan = $post['jabatan_rtrw'];
		$tahun = date('y');
		$username = $post['username_rtrw'];
		$pass = $post['password_rtrw'];

		$id = $this->db->get_where('penduduk',['no_ktp' => $ktp,'tahun' => date('Y')])->row_array();

		if ($jabatan !== "Ketua RW") 
		{
			$jab = "RT";
		} else 
			{
				$jab = "RW";
			}

		$data = array(
			'id_penduduk' => $ktp,
			'jabatan' => $jabatan,
		);

		$user = array(
			'id_penduduk' => $ktp,
			'username' => $username,
			'password' => password_hash($pass, PASSWORD_DEFAULT),
			'jabatan' => $jab,
		);

		$this->db->insert('user',$user);

		return $this->db->insert('rt_rw',$data);
	}

	function carirtrw($berdasarkan,$yangdicari)
	{
		$this->db->select('jabatan');
		$rtrw = $this->db->get('rt_rw')->result();

		foreach ($rtrw as $jab) 
		{
			$this->db->where('jabatan',$jab->jabatan);
		}
		$this->db->where('tahun',date('Y'));
		$this->db->where('status !=','Meninggal');
		$this->db->from('rt_rw');
		$this->db->join('penduduk','penduduk.id_penduduk = rt_rw.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->like('no_ktp',$yangdicari);
			$this->db->like('no_kk',$yangdicari);
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('tanggal_lahir',$yangdicari);
			$this->db->or_like('jenis_kelamin',$yangdicari);
			$this->db->or_like('umur',$yangdicari);
            $this->db->or_like('agama',$yangdicari);
			$this->db->or_like('status',$yangdicari);
			$this->db->or_like('alamat',$yangdicari);
			$this->db->or_like('pekerjaan',$yangdicari);
			$this->db->like('rt',$yangdicari);
				
				break;

				case 'no_ktp':
				$this->db->where($berdasarkan,$yangdicari);

				case 'no_kk':
				$this->db->where($berdasarkan,$yangdicari);

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}
		return $this->db->get();
	}

	function edit($id)
	{
		$this->db->from('penduduk');
		$this->db->join('rt_rw','rt_rw.id_penduduk = penduduk.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$this->db->where('rt_rw.id_penduduk',$id);
		return $this->db->get('')->result();
	}

	function update($post,$id)
	{
		$jabatan = $post['jabatan'];
		if ($jabatan=="Ketua RW") 
		{
			$jab = "RW";
		} else
			{
				$jab = "RT";
			}

		$data = array('jabatan' => $jabatan,);

		$user = array(
			'jabatan' => $jab,
		);

		// $pnddk = array(
		// 	'no_kk' => $post['kk'],
		// 	'nama' => $post['nama'],
		// 	'tanggal_lahir' => $post['tanggal'],
		// 	'umur' => $post['umur'],
		// 	'agama' => $post['agama'],
		// 	'pekerjaan' => $post['kerja'],
		// 	'tahun' => date('Y'),
		// );

		// $this->db->where('id_penduduk',$id);
		// $this->db->update('penduduk',$pnddk);

		$this->db->where('id_penduduk',$id);
		$this->db->update('user',$user);

		$this->db->where('id_penduduk',$id);
		return $this->db->update('rt_rw',$data);
	}

	function hapus($id_penduduk)
	{
		$this->db->where('id_penduduk',$id_penduduk);
		$this->db->delete('rt_rw');

		$this->db->where('id_penduduk',$id_penduduk);
		return $this->db->delete('user');
	}

	function hapusbanyak($id)
	{
		$this->db->where('id_penduduk',$id);
		$this->db->delete('rt_rw');

		$this->db->where('id_penduduk',$id);
		$this->db->delete('user');
	}

}
?>