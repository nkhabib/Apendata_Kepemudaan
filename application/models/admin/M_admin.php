<?php 
class M_admin extends CI_Model
{

	function get_admin($perpage,$offset) // pakai
	{
		$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
		return $this->db->get("user",$perpage,$offset)->result();
	}

	function get_adminpemuda($perpage,$offset) // pakai
	{
		$this->db->where('jabatan','Ketua Pemuda')
			->or_where('jabatan','Sekretaris')
			->or_where('jabatan','Bendahara')
			->or_where('jabatan','Wakil Ketua Pemuda');
		$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
		return $this->db->get("user",$perpage,$offset)->result();
	}

	// function get_rt($rt)
	// {
	// 	foreach ($rt as $key) 
	// 	{
	// 		$ktp = $key->no_ktp;
	// 		$rt = $this->db->get_where('penduduk',array('no_ktp' => $ktp))->result();

	// 		foreach ($rt as $r) 
	// 		{
	// 			$rrt = $r->rt;
	// 		}
	// 	}
	// 	return $rrt;

	// }

	function rt() // pakai
	{
		$this->db->order_by('rt','ASC');
		return $this->db->get('rt')->result();
	}

	function ktp($rt) // jquery
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		$data = $this->db->get('penduduk')->result();
		$output = '<option value="">Pilih No KTP</option>';
		foreach ($data as $key) 
		{
			$output .= '<option value="'.$key->id_penduduk.'">'.$key->no_ktp.' '.$key->nama.'</option>';
		}
		return $output;
	}

	function ktp_tombol($rt)
	{
		$this->db->where('id_rt',$rt);
		$this->db->where('tahun',date('Y'));
		return $this->db->get('penduduk')->result();
	}

	function ambiljson($ktpadmin) // jquery json
	{
		$this->db->where('id_penduduk',$ktpadmin);
		$this->db->where('tahun',date('Y'));
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

	function tambah($post) // pakai
	{
		$ktp = $post['ktp'];
		// $kk = $post['kk'];
		// $nama = $post['nama'];
		$username = $post['username'];
		$password = $post['password'];
		$jabatan = $post['jabatan'];
		// $id = $this->db->get_where('penduduk',['no_ktp' => $ktp,'tahun' => date('Y')])->row_array();
		//'jabatan => empty($post['jabatan']) ? null : $post['jabatan']',
		//artinya jika form jabatan kosong maka akan menambah kosong didatabase tapi jika ada isinya maka akan mengisi sesuai isi form

		$data = array(
			'id_penduduk' => $ktp,
			'username' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),/// nah disinilah enkripsi password dialakukan 
			//password hash adlah fungsi dari php untk enkripsi dan password defauld adalah agar php yng memilihkan enkripsi apa yang akan dilakukan
			'jabatan' => $jabatan,
		);

		return $this->db->insert('user',$data);
	}

	function update($data,$rtrw,$id_penduduk)
	{
		$this->db->update('rt_rw',$rtrw,['id_penduduk'=>$id_penduduk]);
		return $this->db->update('user',$data,['id_penduduk'=>$id_penduduk]);
	}


	function cariadmin($berdasarkan,$yangdicari) //pakai
	{
		$this->db->from('penduduk');
		$this->db->join('user','user.id_penduduk = penduduk.id_penduduk');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->like('no_ktp',$yangdicari);
			$this->db->like('no_kk',$yangdicari);
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('username',$yangdicari);
			$this->db->or_like('jabatan',$yangdicari);
				
				break;

				case 'no_ktp':
				$this->db->where($berdasarkan,$yangdicari);

				case 'no_kk':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}

		return $this->db->get();
	}
	
	function delete($id_penduduk) //untuk menghapus banyak
	//$noktp yang dikrm dari controller admin diterima dengan $ktp
	{
		$this->db->where('id_penduduk', $id_penduduk);
		$this->db->delete('user');
	}

	function trash ($id_penduduk)
	{
		$this->db->where('id_penduduk',$id_penduduk);
		$this->db->delete('user');
	}

	function atur($username)
	{
		$this->db->where('no_ktp',$username);
		return $this->db->get('user')->result();
	}

	function aturupdate($post)
	{
		$ktp = $post['ktp'];
		$kk = $post['kk'];
		$nama = $post['nama'];
		$user = $post['username'];
		$pas = $post['password2'];
		$jab = $post['jabatan'];

		if ($pas == '') 
		{
			$data = array(
				'no_ktp' => $ktp,
				'no_kk' => $kk,
				'nama' => $nama,
				'username' => $user,
				'jabatan' => $jab,
			);

			$this->db->where('no_ktp',$ktp);
			return $this->db->update('user',$data);
		} else
			{
				$data = array(
					'no_ktp' => $ktp,
					'no_kk' => $kk,
					'nama' => $nama,
					'username' => $user,
					'password' => password_hash($pas, PASSWORD_DEFAULT),
					'jabatan' => $jab,
				);

				$this->db->where('no_ktp',$ktp);
				return $this->db->update('user',$data);
			}
	}

}
?>