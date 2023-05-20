<?php
class Admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/m_admin');
		$this->load->library('form_validation');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		}
	}

	function get_admin($offset=0) //pakai
	{
		$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
		$user = $this->db->get("user");

		$config['total_rows'] = $user->num_rows();
		$config['base_url'] = base_url().'admin/admin/get_admin';
		$config['per_page'] = 5;

		////configurasi bootstrap

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative;top:-25px'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href=''>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$rt = $this->db->get('user')->result();

		$data['data'] = $this->m_admin->get_admin($config['per_page'],$offset);
		$isi['judul'] = 'Daftar Admin';
		// $data['rt'] = $this->m_admin->get_rt($rt);

		$this->load->view('template/header', $isi);
		$this->load->view('admin/v_admin',$data);
		$this->load->view('template/footer');
	}

	function get_adminpemuda($offset=0) //pakai
	{	
		$this->db->where('jabatan','Ketua Pemuda')
					->or_where('jabatan','Sekretaris')
					->or_where('jabatan','Bendahara')
					->or_where('jabatan','Wakil Ketua Pemuda');

		$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
		$user = $this->db->get("user");

		$config['total_rows'] = $user->num_rows();
		$config['base_url'] = base_url().'admin/admin/get_adminpemuda';
		$config['per_page'] = 5;

		////configurasi bootstrap

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative;top:-25px'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href=''>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$rt = $this->db->get('user')->result();

		$data['data'] = $this->m_admin->get_adminpemuda($config['per_page'],$offset);
		$isi['judul'] = 'Tabel Admin Pemuda';
		// $data['rt'] = $this->m_admin->get_rt($rt);

		$this->load->view('template/header', $isi);
		$this->load->view('admin/v_admin',$data);
		$this->load->view('template/footer');
	}


	function cari() //pakai
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=$this->input->post('yangdicari');

		$data['user']=$this->m_admin->cariadmin($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah']=count($data["user"]);

		$isi['judul'] = 'Hasil Pencarian';
		$this->load->view("template/header", $isi);
		$this->load->view("admin/v_cari",$data);
		$this->load->view("template/footer");
	}

	function input_admin() //pakai
	{
		if ($this->session->userdata('masuk')=='kadus') 
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('ktp', 'Nomor', 'required|trim|is_unique[user.id_penduduk]',
				[
					'is_unique' => 'No KTP Sudah Digunakan sebagai Admin',
					'required' => 'No KTP Tidak Boleh Kosong'
				]); /* trim berfungsi agar spasi tidak ikut tersimpan di database noktp adalah nama form inputan di view*/
			$this->form_validation->set_rules('kk', 'KK', 'required|trim',
				[
					'required' => 'KK Tidak Boleh Kosong'
				]);
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
				[
					'required' => 'Nama Tidak Boleh Kosong'
				]);
			$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[user.username]|min_length[3]',
				[
					'required' => 'Username Tidak Boleh Kosong',
					'is_unique' => 'Username Sudah ada',
					'min_length' => 'Username Minimal 3 Karakter'
				]);
			$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]',
				[
					'min_length' => 'Password Minimal 3 Karakter'
				]);
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim|is_unique[user.jabatan]',
				[
					'required' => 'Jabatan Tidak Boleh Kosong',
					'is_unique' => 'Jabatan Ini Sudah Ada, Silahkan Hapus Dulu'
				]);

			if ($this->form_validation->run() ==false) 
			{
				$sql = $this->m_admin->rt();
				$rt = $this->input->post('rt');
				$ktp = $this->m_admin->ktp_tombol($rt);
				$data = array(
					'page' => 'Tambah',
					'rt' => $sql,
					'ktp' => $ktp,
				);
				$isi['judul'] = 'Tambah Admin';
				$this->load->view('template/header', $isi);
				$this->load->view('admin/inputadmin', $data);
				$this->load->view('template/footer');
			} else
				{
					$post = $this->input->post();
					$add = $this->m_admin->tambah($post);
					if ($add==TRUE)
					{
						echo $this->session->set_flashdata('msg','<p>Admin Berhasil Ditambahkan</p>');
						redirect('admin/admin/get_admin');
					} else
						{
							echo $this->session->set_flashdata('gagal','<p>Admin Gagal Ditambahkan</p>');
							redirect('admin/admin/get_admin');
						}
				}
		} else
			{
				redirect('home');
			}
	}


	function ktp() // pakai jquery
	{
		$rt = $this->input->post('rtadmin');
		if ($rt) 
		{
			echo $this->m_admin->ktp($rt);
		}
	}

	function ambiljson() // jquery
	{
		$ktpadmin = $this->input->post('ktpadmin');
		$data = $this->m_admin->ambiljson($ktpadmin);
		echo json_encode($data);
	}


	function edit($id_penduduk) // pakai
	{
		$this->db->where('user.id_penduduk',$id_penduduk);
		$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
			$user = $query->result();
			$data = array(
				'page' => 'Edit',
				'data' => $user
			);
			$isi['judul'] = 'Edit Admin';
			$this->load->view('template/header', $isi);
			$this->load->view('admin/v_edit', $data);
			$this->load->view('template/footer');
		} else {
			echo "data tidak ditemukan";
		}

	}

	function update() // pakai
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kadus' || $masuk =='kpemuda') 
		{
			$post = $this->input->post();

			$id_penduduk = $post['id_penduduk'];
			$user = $post['username'];
			$jab = $post['jabatan'];
			$data = array(
				'username' => $user,
				'jabatan' => $jab,
			);

			if ($jab == "RT") 
			{
				$this->db->join('rt','rt.id_rt = penduduk.id_rt');
				$get = $this->db->get_where('penduduk',['id_penduduk' => $id_penduduk])->row_array();
				$jabrtrw = "Ketua RT ".$get['rt'];
			} elseif ($jab == "RW") 
				{
					$jabrtrw = "Ketua RW";
				}
			$rtrw = array(
				'jabatan' => $jabrtrw,
			);

			$update = $this->m_admin->update($data,$rtrw,$id_penduduk);
			if ($update) 
			{
				$this->session->set_flashdata('msg','<p>Admin Diupdate</p>');
				if ($masuk=='kpemuda') 
				{
					redirect('admin/admin/get_adminpemuda');
				}else
					{
						redirect('admin/admin/get_admin');
					}
			}
		} else
			{
				$url = base_url();
				redirect($url);
			}
	}	

	function hapus() //hapus jamak
	{
		$post=$this->input->post('ktp');
		$h=count($post);
		echo $h;
		if ($this->session->userdata('masuk')=='kadus') 
		{
			if (!isset($post)) 
			{
				$this->session->set_flashdata('gagal', 'Tidak Ada Data Yang Dipilih');
				redirect('admin/admin/get_admin');
			} else 
				{
					foreach ($_POST['ktp'] as $id_penduduk) //$_POST['ktp'] adalah nama input pada view sebelum mengarah ke fungso hapus, nama harus sama agar bisa dipanggil
					//as $noktp digunakan untuk menyimpan array yang ada dalam method post 'ktp'
					{
						$this->m_admin->delete($id_penduduk); //$noktp dikirim ke model m_admin function delete
					}
					$this->session->set_flashdata('msg','<p>'.$h.' Data Dihapus</p>' );
					redirect('admin/admin/get_admin');
				}
		} else 
			{
				redirect('home');
			}	
	}

	function remove($id_penduduk) // pakai
	{
		if($this->session->userdata('masuk')=='kadus')
		{
			$this->m_admin->trash($id_penduduk);
			$this->session->set_flashdata('msg', 'Data Dihapus');
			redirect('admin/admin/get_admin');
    	} else
    		{
      			echo "Anda tidak berhak mengakses halaman ini";
    		}
	}

	function atur()
	{
		$username = $this->session->userdata('ses_ktp');
		$data['data'] = $this->m_admin->atur($username);

		$data['judul'] = 'Atur User';
		$this->load->view('template/header',$data);
		$this->load->view('admin/v_atur');
		$this->load->view('template/footer');
	}

	function aturupdate()
	{
		$this->form_validation->set_rules('password1','Password','trim|min_length[4]|max_length[12]',
			[
				'min_length' => 'Password Minimal 4 Karakter',
				'max_length' => 'Password Maksimal 12 Karakter',
			]);
		$this->form_validation->set_rules('password2','Konfirmasi Password','trim|matches[password1]',
			[
				'matches' => 'Password yang anda masukan beda',
			]);

		$post = $this->input->post();
		if ($this->form_validation->run()==FALSE) 
		{
			$this->db->where('no_ktp',$post['ktp']);
			$edit = $this->db->get('user')->result();
			$data['judul'] = 'Atur User';
			$data['data'] = $edit;

			$this->load->view('template/header',$data);
			$this->load->view('admin/v_atur');
			$this->load->view('template/footer');
		} else 
			{
				$update = $this->m_admin->aturupdate($post);
				if ($update) 
				{
					$this->session->set_flashdata('msg','<p>Data Anda Berhasi Diupdate</p>');
					$url = base_url();
					redirect('home');
					redirect($url);
				} else
					{
						$this->session->set_flashdata('gagal','<p>Gagal Diupdate</p>');
						redirect('admin/admin/aturupdate');
					}
			}

	}
}
 ?>