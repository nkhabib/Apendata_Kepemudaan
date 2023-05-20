<?php
class Penduduk extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('penduduk/m_penduduk');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		}
	}

	function get_penduduk($offset=0)
	{
		$this->db->order_by('id_rt','ASC');
		$this->db->where('tahun',date('Y'));
		$penduduk = $this->db->get("penduduk");

		$config['total_rows'] = $penduduk->num_rows();
		$config['base_url'] = base_url().'penduduk/penduduk/get_penduduk';
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

		$data['data'] = $this->m_penduduk->get_penduduk($config['per_page'],$offset);
		$data['rt'] = $this->m_penduduk->rt();
		$isi['judul'] = 'Daftar Penduduk';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function tampil($id)
	{
		$this->db->where('id_penduduk', $id);
		$this->db->where('tahun',date('Y'));
		$this->db->from('penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$query = $this->db->get('');
		if ($query->num_rows() > 0) {
			$user = $query->row();
			$data = array(
				'page' => 'Tampil',
				'row' => $user,
				'id' => $id
			);

			$isi['judul'] = 'Lihat Penduduk';
			$this->load->view('template/header', $isi);
			$this->load->view('penduduk/v_tampil', $data);
			$this->load->view('template/footer');
		} else {
			echo "data tidak ditemukan";
		}
	}

	function input_penduduk()
	{
		if ($this->session->userdata('masuk')=='kadus') 
		{
			/* trim berfungsi agar spasi tidak ikut tersimpan di database*/ 
			$this->form_validation->set_rules('ktp', 'Nomor KTP', 'required|trim|numeric|is_unique[penduduk.no_ktp]|min_length[16]|max_length[16]',
				[
					'required' => 'No KTP harus diisi',
					'is_unique' => 'No KTP sudah ada',
					'min_length' => 'No KTP minimal 16 angka',
					'max_length' => 'No KTP maksimal 16 angka',
				]);
			$this->form_validation->set_rules('kk', 'Nomor KK', 'required|trim|numeric|min_length[16]|max_length[16]',
			[
				'min_length' => 'No KK minimal 16 angka',
				'max_length' => 'No KK minimal 16 angka',
				'required' => 'No KK harus diisi',
				'numeric' => 'No KK hanya berupa angka',
			]);
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim',
				[
					'required' => 'Nama harus diisi',
				]);
			$this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required|trim|date',
				[
					'required' => 'Tanggal lahir harus diisi',
					'date' => 'Masukan harus berupa tanggal',
				]);
			$this->form_validation->set_rules('kelamin', 'Kelamin', 'required|trim',
				[
					'required' => 'Jenis kelamin harus diisi',
				]);
			$this->form_validation->set_rules('umur', 'Umur', 'required|trim|numeric|greater_than[16]',
				[
					'greater_than' => 'Umur Paling Tidak 17 Tahun',
					'required' => 'Umur harus diisi',
					'numeric' => 'Masukan hanya berupa angka',
				]);
			$this->form_validation->set_rules('agama', 'Agama', 'required|trim',
				[
					'required' => 'Agama harus diisi',
				]);
			$this->form_validation->set_rules('status', 'Status', 'required|trim',
				[
					'required' => 'Status harus diisi',
				]);
			$this->form_validation->set_rules('statuskeluarga', 'Status Keluarga', 'required|trim',
				[
					'required' => 'Status keluarga harus diisi',
				]);
			$this->form_validation->set_rules('statuskk', 'Status Kepala Keluarga', 'required|trim',
				[
					'required' => 'Status kepala keluarga harus diisi',
				]);
			
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim',
				[
					'required' => 'Pekerjaan tidak boleh kosong',
				]);
			$this->form_validation->set_rules('rt', 'RT', 'required|trim|numeric',
				[
					'required' => 'RT harus diisi',
					'numeric' => 'RT hanya berupa angka',
				]);

			$this->form_validation->set_rules('tempat', 'Tempat', 'required',
				[
					'required' => 'Tempat Lahir harus diisi',
				]);

			if ($this->form_validation->run()==false) 
			{
				$post['post'] = $this->input->post();
				$this->db->order_by('rt','ASC');
				$rt = $this->db->get('rt')->result();
				$isi['rt'] = $rt;
				$isi['judul'] = 'Tambah Penduduk';
				$this->load->view('template/header', $isi);
				$this->load->view('penduduk/v_input',$post);
				$this->load->view('template/footer');
			} else
				{
					if ($_POST['status']=="Meninggal")
					{
						$this->session->set_flashdata('gagal','<p>Status Tidak Boleh Meninggal</p>');
						redirect('penduduk/penduduk/input_penduduk');
					} else
						{
							$post = $this->input->post();
							$this->m_penduduk->add($post);
						}
				}
		} else
				{
					redirect('home');
				}
	}


	function edit($id) //$ktp untuk menangkan kiriman link dari view
	{
		$this->db->where('id_penduduk', $id);
		$this->db->where('tahun',date("Y"));
		$this->db->from('penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$query = $this->db->get('');
		if ($query->num_rows() > 0) {
			$user = $query->result();
			$data = array(
				'page' => 'Edit',
				'data' => $user
			);
			$isi['judul'] = 'Edit Penduduk';
			$this->load->view('template/header', $isi);

			//ada pergantian untuk membuat view sendiri untuk edit
			$this->load->view('penduduk/v_edit', $data);
			$this->load->view('template/footer');
		} else {
			echo "data tidak ditemukan";
		}

	}

	function update()
	{
			$post = $this->input->post();
			$id = $post['id_penduduk'];

			$rt = $this->db->get_where('rt',['id_rt' => $post['rt']])->row_array();
			$now = $this->db->get_where('penduduk',['id_penduduk' => $id])->row_array();
			$tahun = date('Y');

			$alamat = "RT.".$rt['rt']." / RW.05, Basongan, Kalisalak";

			if ($post['status']=="Menikah" && $now['statuskeluarga']=='Anak') 
			{
				$data = array(
				'no_ktp' => $post['ktp'],
				'no_kk' => $post['kk'],
				'nama' => $post['nama'],
				'tempat_lahir' => $post['tempat'],
				'tanggal_lahir' => $post['ttl'],
				'umur' => $post['umur'],
				'jenis_kelamin' => $post['kelamin'],
				'status' => $post['status'],
				'agama' => $post['agama'],
				'statuskeluarga' => "Anak",
				'kepalakk' => $post['statuskk'],
				'id_rt' => $post['rt'],
				'alamat' => $alamat,
				'pekerjaan' => $post['pekerjaan'],

				);
			} else{

					$data = array(
						'no_ktp' => $post['ktp'],
						'no_kk' => $post['kk'],
						'nama' => $post['nama'],
						'tempat_lahir' => $post['tempat'],
						'tanggal_lahir' => $post['ttl'],
						'umur' => $post['umur'],
						'jenis_kelamin' => $post['kelamin'],
						'status' => $post['status'],
						'agama' => $post['agama'],
						'statuskeluarga' => $post['statuskeluarga'],
						'kepalakk' => $post['statuskk'],
						'id_rt' => $post['rt'],
						'alamat' => $alamat,
						'pekerjaan' => $post['pekerjaan'],

						);
					}

					if ($post['status']=="Menikah" && $post['kk']!=$now['no_kk'] && $post['kelamin']=="Perempuan") 
					{
						$data = array(
						'no_ktp' => $post['ktp'],
						'no_kk' => $post['kk'],
						'nama' => $post['nama'],
						'tempat_lahir' => $post['tempat'],
						'tanggal_lahir' => $post['ttl'],
						'umur' => $post['umur'],
						'jenis_kelamin' => $post['kelamin'],
						'status' => $post['status'],
						'agama' => $post['agama'],
						'statuskeluarga' => "Istri",
						'kepalakk' => $post['statuskk'],
						'id_rt' => $post['rt'],
						'alamat' => $alamat,
						'pekerjaan' => $post['pekerjaan'],

						);
					} elseif ($post['status']=="Menikah" && $post['kk']!=$now['no_kk'] && $post['kelamin']=="Laki-laki") 
						{
							$data = array(
							'no_ktp' => $post['ktp'],
							'no_kk' => $post['kk'],
							'nama' => $post['nama'],
							'tempat_lahir' => $post['tempat'],
							'tanggal_lahir' => $post['ttl'],
							'umur' => $post['umur'],
							'jenis_kelamin' => $post['kelamin'],
							'status' => $post['status'],
							'agama' => $post['agama'],
							'statuskeluarga' => "Suami",
							'kepalakk' => $post['statuskk'],
							'id_rt' => $post['rt'],
							'alamat' => $alamat,
							'pekerjaan' => $post['pekerjaan'],

							);
						}

			if ($now['tahun']==$tahun) 
			{
				if ($post['status']=="Meninggal") 
				{
					$kk = $this->db->get_where('penduduk',['id_penduduk'=>$id])->row_array();
					$istri = $this->db->get_where('penduduk',['no_kk'=>$kk['no_kk'],'statuskeluarga'=>"Istri"])->result();
					$suami = $this->db->get_where('penduduk',['no_kk'=>$kk['no_kk'],'statuskeluarga'=>"Suami"])->result();
					foreach ($istri as $bojo) 
					{
						$janda = array(
							'status' => 'Janda',
							'statuskeluarga' => 'Janda',
						);

						$this->db->update('penduduk',$janda,['id_penduduk'=>$bojo->id_penduduk]);
					}
					foreach ($suami as $lanang) 
					{
						$duda = array(
							'status' => 'Duda',
							'statuskeluarga' => 'Duda',
						);

						$this->db->update('penduduk',$duda,['id_penduduk'=>$lanang->id_penduduk]);
					}
				}
				$update = $this->m_penduduk->update($data,$id);
				if ($update) 
				{
					$this->session->set_flashdata('msg', '<p >'.$total_post.' data berhasil di sunting!</p>');
	            	redirect('penduduk/penduduk/get_penduduk');
				} else {
					$this->session->set_flashdata('gagal', '<p >'.$total_post.' data gagal di sunting!</p>');
	            	redirect('penduduk/penduduk/get_penduduk');
				}
			} else
				{
					$data_lama = array(
						'no_ktp' => $post['ktp'],
						'no_kk' => $post['kk'],
						'nama' => $post['nama'],
						'tempat_lahir' => $post['tempat'],
						'tanggal_lahir' => $post['ttl'],
						'umur' => $post['umur'],
						'jenis_kelamin' => $post['kelamin'],
						'status' => $post['status'],
						'agama' => $post['agama'],
						'statuskeluarga' => $post['statuskeluarga'],
						'kepalakk' => $post['statuskk'],
						'id_rt' => $post['rt'],
						'alamat' => $alamat,
						'pekerjaan' => $post['pekerjaan'],
						'tahun' => "2015",
					);
					$add = $this->db->insert('penduduk',$data_lama);

					if ($add) 
					{
						$this->session->set_flashdata('msg', '<p >'.$total_post.' data berhasil di sunting!</p>');
		            	redirect('penduduk/penduduk/get_penduduk');
					} else {
						$this->session->set_flashdata('gagal', '<p >'.$total_post.' data gagal di sunting!</p>');
		            	redirect('penduduk/penduduk/get_penduduk');
					}
				}
	}

	function cari()
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=trim($this->input->post('yangdicari'));

		$data['penduduk']=$this->m_penduduk->caripenduduk($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah']=count($data["penduduk"]);

		$isi['judul'] = 'Hasil Pencarian';
		$this->load->view("template/header", $isi);
		$this->load->view("penduduk/v_cari",$data);
		$this->load->view("template/footer");
	}


	function hapus($id)
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk=='kadus') 
		{
			$pnddk = $this->db->get_where('penduduk',['id_penduduk' => $id])->row_array();
			$user = $this->db->get_where('user',['id_penduduk' => $pnddk['id_penduduk']])->result();

			if ($user) 
			{
				$this->session->set_flashdata('gagal','<p>Gagal Hapus, NO KTP Digunakan Untuk Admin</p>');
				redirect('penduduk/penduduk/get_penduduk');
			} else 
				{
					$hapus = $this->m_penduduk->hapus($id);
					if ($hapus)
					{
						$this->session->set_flashdata('msg','<p>Data Dihapus</p>');
						redirect('penduduk/penduduk/get_penduduk');
					}
				}
		} else
			{
				$url = base_url();
				redirect($url);
			}
	}

	

}