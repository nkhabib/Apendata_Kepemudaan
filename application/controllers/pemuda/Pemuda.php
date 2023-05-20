<?php
class Pemuda extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('pemuda/m_pemuda');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function get_pemuda($offset=0)
	{
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$pemuda = $this->db->get("pemuda");
		$config['total_rows'] = $pemuda->num_rows();
		$config['base_url'] = base_url().'pemuda/pemuda/get_pemuda';
		$config['per_page'] = 5;

		/////config bootstrap
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

		$data['data'] = $this->m_pemuda->get_pemuda($config['per_page'],$offset);
		$isi['judul'] = 'Daftar Pemuda';
		$this->load->view('template/header', $isi);
		$this->load->view('pemuda/v_pemuda',$data);
		$this->load->view('template/footer');
	}

	function input_pemuda()
	{
		$this->form_validation->set_rules('rt', 'RT', 'required|trim|numeric',
			[
				'required' => 'RT harus dipilih',
				'numeric' => 'Masukan hanya berupa angka',
			]);
		$this->form_validation->set_rules('ktp', 'KTP', 'required|trim|is_unique[pemuda.id_penduduk]|numeric',
			[
				'is_unique' => "NO KTP Sudah Ada",
				'required' => 'NO KTP harus dipilih',
				'numeric' => 'NO KTP hanya berupa angka',
			]);
		$this->form_validation->set_rules('kk', 'KK', 'required|trim|numeric|min_length[16]|max_length[16]',
			[
				'required' => 'NO KK harus diisi',
				'numeric' => 'NO KK hanya berupa angka',
				'min_length' => 'NO KK harus 16 karakter',
				'max_length' => 'NO KK harus 16 karakter',
			]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
			[
				'required' => 'Nama harus diisi',
			]);
		$this->form_validation->set_rules('ttl', 'Tanggal lahir', 'required|trim|date',
			[
				'required' => 'Tanggal lahir harus diisi',
				'date' => 'Tanggal lahir hanya format tanggal',
			]);
		$this->form_validation->set_rules('kelamin', 'Jenis  kelamin', 'required|trim',
			[
				'required' => 'Jenis kelamin harus diisi',
			]);
		$this->form_validation->set_rules('umur', 'Umur', 'required|trim|numeric',
			[
				'required' => 'Umur harus diisi',
				'numeric' => 'Umur hanya berupa angka',
			]);
		$this->form_validation->set_rules('agama', 'Agama', 'required|trim',
			[
				'required' => 'Agama harus diisi',
			]);
		$this->form_validation->set_rules('status','Status', 'required|trim',
			[
				'required' => 'Status harus diisi',
			]);
		$this->form_validation->set_rules('statuskeluarga', 'Status keluarga', 'required|trim',
			[
				'required' => 'Status Keluarga harus diisi',
			]);
		$this->form_validation->set_rules('statuskk', 'Kepala keluarga', 'required|trim',
			[
				'required' => 'Kepala keluarga harus diisi',
			]);
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
			[
				'required' => 'Alamat harus diisi',
			]);
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',
			[
				'required' => 'Pekerjaan harus diisi',
			]);
		if ($this->form_validation->run() ==false) 
		{
			$rt = $this->m_pemuda->rt();
			
			$angkart = $this->input->post('rt');
			$ktpsubmit = $this->m_pemuda->ktpsubmit($angkart);
			
			$judul = 'Tambah Pemuda';
			$data = array(
				'judul' => $judul,
				'rt' => $rt,
				'ktp' => $ktpsubmit,
			 );
			$this->load->view('template/header',$data);
			$this->load->view('pemuda/v_input',$data);
			$this->load->view('template/footer');
		} 
		else
			{
				$post = $this->input->post();
				$add = $this->m_pemuda->tambah($post);
				if ($add == TRUE) 
				{
					$this->session->set_flashdata('msg', '<p>Pemuda berhasil ditambahkan</p>');
					redirect('pemuda/pemuda/get_pemuda');
				} else
					{
						$this->session->set_flashdata('gagal', '<p>Data gagal ditambahkan</p>');
					}
			}
	}

	function input_admin()
	{
		$this->form_validation->set_rules('rt','RT', 'required|trim|numeric',
			[
				'required' => 'RT Harus Dipilih',
				'numeric' => 'RT Hanya Berupa Angka'
			]);

		$this->form_validation->set_rules('ktp','No KTP', 'required|trim|numeric|is_unique[user.id_penduduk]',
			[
				'required' => 'Nomor KTP Tidak Boleh Kosong',
				'numeric' => 'Masukan Hanya Berupa Angka',
				'is_unique' => 'Nomor KTP Sudah Digunakan Untuk Admin, Pilih No KTP Lain',
			]);
		$this->form_validation->set_rules('kk','No KK', 'required|trim|numeric|min_length[16]',
			[
				'required' => 'Nomor KK Tidak Boleh Kosong',
				'numeric' => 'Masukan Hanya Berupa Angka',
				'min_length' => 'Nomor KK Minimal 16 Digit'
			]);
		$this->form_validation->set_rules('nama','Nama','required|trim',
			[
				'required' => 'Nama Tidak Boleh Kosong'
			]);
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]|min_length[3]',
			[
				'required' => 'Username Tidak Boleh Kosong',
				'is_unique' => 'Username Sudah Digunakan',
				'min_length' => 'Username Minimal 3 Karakter'
			]);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[4]',
			[
				'required' => 'Password Tidak Boleh Kosong',
				'min_length' => 'Password Minimal 4 Karakter'
			]);
		$this->form_validation->set_rules('jabatan','Jabatan','required|trim',
			[
				'required' => 'Jabatan Tidak Boleh Kosong'
			]);
		if ($this->form_validation->run()==false) 
		{
			$rt = $this->input->post('rt');
			$data['ktp'] = $this->m_pemuda->ktp_rt($rt);
			$data['rt'] = $this->m_pemuda->rt();
			$data['judul'] = 'Tambah Admin';
			$this->load->view('template/header',$data);
			$this->load->view('pemuda/v_inputadmin',$data);
			$this->load->view('template/footer');
		} else {
			$post = $this->input->post();
			$add = $this->m_pemuda->tambah_admin($post);
			if ($add == TRUE) 
			{
				$this->session->set_flashdata('msg', '<p>Admin/Operator Pemuda berhasil ditambahkan</p>');
				redirect('admin/admin/get_adminpemuda');
			} else
				{
					$this->session->set_flashdata('gagal', '<p>Data gagal ditambahkan</p>');
				}
		}
	}

	function ktp() // jquery
	{
		$rt = $this->input->post('rt');
		if ($rt) 
		{
			echo $this->m_pemuda->ktp($rt);
		}
	}

	function jsoninput() // jquery json
	{
		$ktp = $this->input->post('ktp');
		$data = $this->m_pemuda->jsoninput($ktp);
		echo json_encode($data);
	}

	function ktpadmin() // jquery
	{
		$rtadmin = $this->input->post('rtadmin');
		if ($rtadmin) 
		{
			echo $this->m_pemuda->ktpadmin($rtadmin);
		}
	}

	function jsoninput_admin()
	{
		$ktp = $this->input->post('ktp_admin');
		$data = $this->m_pemuda->jsoninput_admin($ktp);
		echo json_encode($data);
	}

	function edit($ktp)
	{
		if ($this->session->userdata('masuk')=='kpemuda')
		{
			$this->db->where('pemuda.id_penduduk', $ktp);
			$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$query = $this->db->get('pemuda', $ktp);
			if ($query->num_rows() > 0) 
			{
				$pemuda = $query->result();
				$data = array(
					'page' => 'Edit',
					'data' => $pemuda,
					'rt' => $this->m_pemuda->rt(),
					 );
				$isi['judul'] = 'Edit Data Pemuda';
				$this->load->view('template/header', $isi);
				$this->load->view('pemuda/v_edit', $data);
				$this->load->view('template/footer');
			} else {
				echo "Data tidak ditemukan";
			}
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
			$url = base_url();
			redirect($url);
		}
	}

	function update()
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kpemuda') 
		{
			$rt = $this->db->get_where('rt',['id_rt'=>$_POST['rt']])->row_array();
			$alamat = "RT.".$rt['rt']." / RW.05, Basongan, Kalisalak";
			$id_penduduk = $_POST['id_penduduk'];
			$data = array(
				'nama' => $_POST['nama'],
				'tempat_lahir' => $_POST['tempat'],
				'agama' => $_POST['agama'],
				'pekerjaan' => $_POST['kerja'],
				'id_rt' => $_POST['rt'],
				'alamat' => $alamat,
			);

			$update = $this->m_pemuda->update($id_penduduk,$data);
			if ($update) 
			{
				$this->session->set_flashdata('msg','<p>Data Pemuda Diupdate</p>');
				redirect('pemuda/pemuda/get_pemuda');
			} else
				{
					$this->session->set_flashdata('gagal','<p>Data Pemuda Gagal Diupdate</p>');
					redirect('pemuda/pemuda/get_pemuda');
				}
		} else
			{
				$url = base_url();
				redirect($url);
			}
	}

	function remove($id_pemuda)
	{
		if ($this->session->userdata('masuk')=='kpemuda') 
		{
			$pemuda = $this->db->get_where('pemuda',['id_pemuda'=>$id_pemuda])->row_array();
			$this->db->where('id_penduduk',$pemuda['id_penduduk']);
			$ada = $this->db->get('user')->num_rows();
			if ($ada) 
			{
				$this->session->set_flashdata('gagal','<p>Gagal Dihapus, Karena Data Digunakan Oleh Tabel Admin</p>');
				redirect('pemuda/pemuda/get_pemuda');
			} else
				{
					$hapus = $this->m_pemuda->trash($id_pemuda);
					if ($hapus ==TRUE) 
					{
						$this->session->set_flashdata('msg','Data Dihapus');

					} else {
						$this->session->set_flashdata('gagal','Data Gagal Dihapus');
					} redirect('pemuda/pemuda/get_pemuda');
					
				}
		} else {
			echo "Anda tidak berhak mengakses halaman ini";
			$url = base_url();
			redirect($url);
		}
	}
}
?>