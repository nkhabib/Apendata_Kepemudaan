<?php
class Lahir extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) 
		{
			redirect('home');
		} else
			{
				$this->load->library('form_validation');
				$this->load->model('lahir/m_lahir');
			}
	}

	function get_lahir($offset=0)
	{
		$lahir = $this->db->get('kelahiran');
		$config['total_rows'] = $lahir->num_rows();
		$config['base_url'] = base_url('lahir/lahir/get_lahir');
		$config['per_page'] = 5;
		//boootstrap
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
		$data['data'] = $this->m_lahir->get_lahir($config['per_page'],$offset);

		$data['judul'] = "Tabel Kelahiran";
		$this->load->view('template/header',$data);
		$this->load->view('lahir/v_lahir',$data);
		$this->load->view('template/footer');
	}

	function tambah()
	{
		$this->form_validation->set_rules('rt','','required|trim|numeric',
			[
				'required' => 'RT harus diisi',
				'numeric' => 'RT hanya berupa angka',
			]);

		$this->form_validation->set_rules('kk','','required|trim|numeric',
			[
				'required' => '* NO KK Harus diisi *',
				'numeric' => '* NO KK Hanya boleh berupa angka *',
			]);

		$this->form_validation->set_rules('nama','','required|trim',
			[
				'required' => '* Nama harus diisi *',
			]);

		$this->form_validation->set_rules('kelamin','','required|trim',
			[
				'required' => '* Jenis kelamin harus diisi *',
			]);

		$this->form_validation->set_rules('tempat','','required|trim',
			[
				'required' => 'Tempat lahir harus diisi',
			]);

		$this->form_validation->set_rules('ttl','','required|trim',
			[
				'required' => '* Tanggal lahir harus diisi *',
			]);

		$this->form_validation->set_rules('ayah','','required|trim',
			[
				'required' => '* Ayah harus diisi *',
			]);

		$this->form_validation->set_rules('ibu','','required|trim',
			[
				'required' => '* Ibu harus diisi *',
			]);

		$this->form_validation->set_rules('kondisi','','required|trim',
			[
				'required' => '* Kondisi harus diisi *',
			]);

		$this->form_validation->set_rules('berat','','required|trim',
			[
				'required' => '* Berat harus diisi *',
			]);

		$this->form_validation->set_rules('panjang','','required|trim',
			[
				'required' => 'Panjang harus diisi',
			]);

		$this->form_validation->set_rules('pelapor','','required',
			[
				'required' => 'Pelapor harus diisi',
			]);



		if ($this->form_validation->run()==false) 
		{
			$data['judul'] = 'Tambah Kelahiran';
			$data['data'] = $this->m_lahir->rt();
			if (isset($_POST['tambah'])) 
			{
				$rt = $this->input->post('rt');
				$kk = $this->input->post('kk');

				$data['kk'] = $this->m_lahir->kk($rt);
				$data['ayah'] = $this->m_lahir->ayah($kk);
				$data['ibu'] = $this->m_lahir->ibu($kk);
			}
			$this->load->view('template/header',$data);
			$this->load->view('lahir/v_input',$data);
			$this->load->view('template/footer');
		} else
			{
				$post = $this->input->post();
				$tambah = $this->m_lahir->tambah($post);
				if ($tambah == TRUE) 
				{
					$this->session->set_flashdata('msg','Data Berhasil Ditambahkan');
					redirect('lahir/lahir/get_lahir');
				} else {
					$this->session->set_flashdata('gagal','Data Gagal Ditambahkan');
					redirect('lahir/lahir/tambah');
				}
			}
	}
////// input kelahiran
	function kklahir() //jquery ajax
	{
		$rt = $this->input->post('rt_lahir');
		if ($rt) 
		{
			echo $this->m_lahir->nokk($rt);
		}
	}

	function ortukk()
	{
		$kk = $this->input->post('nokk_lahir');
		if ($kk) 
		{
			echo $this->m_lahir->ayahkk($kk);
		}
	}

	function ibukk() // jquery
	{
		$kk = $this->input->post('kk');
		if ($kk) 
		{
			echo $this->m_lahir->ibukk($kk);
		}
	}

	///end input kelahiran


	// edit kelahiran
	function nokkedit()
	{
		$rt = $this->input->post('rtedit');
		if ($rt) 
		{
			echo $this->m_lahir->editnokk($rt);
		}
	}
	// end edit kelahiran

	function edit($idlahir)
	{
		$total = count($idlahir);
		$data['judul'] = 'Edit Data Kelahiran';
		$data['total'] = $total;
		$data['edit'] = $this->m_lahir->edit($idlahir);

		$this->load->view('template/header',$data);
		$this->load->view('lahir/v_edit');
		$this->load->view('template/footer');
	}

	function update()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim',
		[
			'required' => 'Nama Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('kelamin','Jenis Kelamin','required|trim',
		[
			'required' => 'Jenis Kelamin Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('tempat','Tempat Lahir','required|trim',
		[
			'required' => 'Tempat Lahir Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('ttl','Tanggal Lahir','required|trim|date',
		[
			'required' => 'Tanggal Lahir Tidak Boleh Kosong',
			'date' => 'Masukan Hanya Berupa Tanggal',
		]);

		$this->form_validation->set_rules('kklahir','No KK','required|trim|numeric',
			[
				'required' => 'No KK Tidak Boleh Kosong',
				'numeric' => 'Masukan Hanya Berupa Angka',
			]);

		$this->form_validation->set_rules('ayah','Nama Ayah','required|trim',
		[
			'required' => 'Nama Ayah Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('ibu','Nama Ibu','required|trim',
		[
			'required' => 'Nama Ibu Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('kondisi','Kondisi','required|trim',
		[
			'required' => 'Kondisi Tidak Boleh Kosong',
		]);

		$this->form_validation->set_rules('berat','Berat','required|trim|numeric',
		[
			'required' => 'Berat Tidak Boleh Kosong',
			'numeric' => 'Masukan Hanya Berupa Angka',
		]);

		$this->form_validation->set_rules('panjang','Panjang','required|trim',
		[
			'required' => 'Panjang Tidak Boleh Kosong',
			'numeric' => 'Masukan Hanya Berupa Angka',
		]);

		$this->form_validation->set_rules('lapor','Pelapor','required|trim',
		[
			'required' => 'Pelapor Tidak Boleh Kosong',
		]);


		$post = $this->input->post();

		if ($this->form_validation->run()==FALSE) 
		{
			$id = $post['id'];
			$rt = $post['rt'];
			$data['kk'] = $this->m_lahir->kkedit($rt);
			$data['judul'] = 'Edit Kelahiran';
			$data['edit'] = $this->db->get_where('kelahiran',array('id_lahir' => $id,))->result();
			$this->load->view('template/header',$data);
			$this->load->view('lahir/v_edit');
			$this->load->view('template/footer');
		} else 
			{
				$update = $this->m_lahir->update($post);
				if ($update) 
				{
					$this->session->set_flashdata('msg','<p>Data Kelahiran Berhasil Update</p>');
					redirect('lahir/lahir/get_lahir');
				} else
					{
						$this->session->set_flashdata('gagal','<p>Data Gagal Diupdate</p>');
						redirect('lahir/lahir/get_lahir');
					}
			}
	}

	function hapusbanyak()
	{
		$id = $this->input->post('id');
		$h = count($id);
		if (!isset($id)) 
		{
			$this->session->set_flashdata('gagal','<p>Tidak Ada Data yang Dipilih</p>');
			redirect('lahir/lahir/get_lahir');
		} else 
			{
				if ($this->session->userdata('masuk')=='kadus') 
				{
					foreach ($id as $key) 
					{
						$this->m_lahir->hapusbanyak($key);
					}

					$this->session->set_flashdata('msg','<p>'.$h.' Data Kelahiran Berhasil Dihapus</p>');
					redirect('lahir/lahir/get_lahir');
				} else {
					$url = base_url();
					redirect($url);
				}
			}
	}

	function hapus($id)
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kadus') 
		{
			$hps = $this->m_lahir->hapus($id);

			if ($hps) 
			{
				$this->session->set_flashdata('msg','<p>Data Dihapus</p>');
				redirect('lahir/lahir/get_lahir');
			} else 
				{
					$this->session->set_flashdata('gagal','<p>Data Gagal Dihapus</p>');
					redirect('lahir/lahir/get_lahir');
				}
		} else
			{
				$url = base_url();
				redirect($url);
			}
	}
}
?>