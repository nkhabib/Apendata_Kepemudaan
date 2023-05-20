<?php
class Pengunjung extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('pengunjung/m_pengunjung');
	}

	function sejarah ()
	{
		$data['judul'] = "Sejarah Dusun Basongan";
		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_sejarahdusun');
		$this->load->view('pengunjung/template/footer');

	}

	function visimisi ()
	{
		$data['judul'] = "Visi Misi Dusun Basongan";
		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_visimisi');
		$this->load->view('pengunjung/template/footer');

	}

	function pemerintah ()
	{
		$data['judul'] = "Pemerintahan Dusun Basongan";
		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_pemerintah');
		$this->load->view('pengunjung/template/footer');

	}

	function get_penduduk($offset=0)
	{
		$penduduk = $this->db->get("penduduk");
		$config['total_rows'] = $penduduk->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/get_penduduk';
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

		$data['data'] = $this->m_pengunjung->get_penduduk($config['per_page'],$offset);
		$data['judul'] = 'Daftar Penduduk';

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_penduduk',$data);
		$this->load->view('pengunjung/template/footer');	
	}

	function get_pendudukrt($offset=0)
	{
		$angka = $this->input->get('angka');
		
		$penduduk = $this->db->get_where("penduduk",array('rt' =>$angka));
		$config['total_rows'] = $penduduk->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/get_pendudukrt';
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

		$data['data'] = $this->m_pengunjung->get_pendudukrt($config['per_page'],$offset,$angka);
		$data['judul'] = 'Daftar Penduduk RT'.$angka;

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_penduduk',$data);
		$this->load->view('pengunjung/template/footer');
	}

	function cari_penduduk()
	{
		$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
		$data['yangdicari'] = $this->input->post('yangdicari');
		$data['penduduk'] = $this->m_pengunjung->caripenduduk($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah'] = count($data['penduduk']);

		$isi['judul'] = 'Hasil Pencarian Penduduk';
		$this->load->view('pengunjung/template/header',$isi);
		$this->load->view('pengunjung/v_caripenduduk',$data);
		$this->load->view('pengunjung/template/footer');
	}



	function get_pemuda($offset=0)
	{
		$pemuda = $this->db->get("pemuda");
		$config['total_rows'] = $pemuda->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/get_pemuda';
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

		$data['data'] = $this->m_pengunjung->get_pemuda($config['per_page'],$offset);
		$data['judul'] = 'Daftar penduduk';

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_pemuda',$data);
		$this->load->view('pengunjung/template/footer');
	}


	function get_pemudart($offset=0)
	{
		$angka = $this->input->get('angka');
		
		$pemuda = $this->db->get_where("pemuda",array('rt' =>$angka));
		$config['total_rows'] = $pemuda->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/get_pemudart';
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

		$data['data'] = $this->m_pengunjung->get_pemudart($config['per_page'],$offset,$angka);
		$data['judul'] = 'Daftar Pemuda RT'.$angka;

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_pemuda',$data);
		$this->load->view('pengunjung/template/footer');
	}

	function cari_pemuda()
	{
		$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
		$data['yangdicari'] = $this->input->post('yangdicari');
		$data['pemuda'] = $this->m_pengunjung->caripemuda($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah'] = count($data['pemuda']);

		$isi['judul'] = 'Hasil Pencarian Pemuda';
		$this->load->view('pengunjung/template/header',$isi);
		$this->load->view('pengunjung/v_caripemuda',$data);
		$this->load->view('pengunjung/template/footer');
	}

	function get_kelahiran($offset=0)
	{
		$kelahiran = $this->db->get("kelahiran");
		$config['total_rows'] = $kelahiran->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/get_kelahiran';
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

		$data['data'] = $this->m_pengunjung->get_kelahiran($config['per_page'],$offset);
		$data['judul'] = 'Daftar Kelahiran';

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_kelahiran',$data);
		$this->load->view('pengunjung/template/footer');
	}

	function cari_kelahiran()
	{
		$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
		$data['yangdicari'] = $this->input->post('yangdicari');
		$data['kelahiran'] = $this->m_pengunjung->carikelahiran($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah'] = count($data['kelahiran']);

		$isi['judul'] = 'Hasil Pencarian Kelahiran';
		$this->load->view('pengunjung/template/header',$isi);
		$this->load->view('pengunjung/v_carikelahiran',$data);
		$this->load->view('pengunjung/template/footer');
	}

	function uang($offset=0)
	{
		$uang = $this->db->get("kas_pemuda");
		$config['total_rows'] = $uang->num_rows();
		$config['base_url'] = base_url().'pengunjung/pengunjung/uang';
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

		$data['data'] = $this->m_pengunjung->uang($config['per_page'],$offset);
		$data['judul'] = 'Daftar Keuangan Karang Taruna';

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_uang');
		$this->load->view('pengunjung/template/footer');
	}


	function cari_uang()
	{
		$data['cariberdasarkan'] = $this->input->post('cariberdasarkan');
		$data['yangdicari'] = $this->input->post('yangdicari');
		$data['uang'] = $this->m_pengunjung->cari_uang($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah'] = count($data['uang']);

		$data['judul'] = 'Hasil Pencarian Kelahiran';

		$this->load->view('pengunjung/template/header',$data);
		$this->load->view('pengunjung/v_cariuang');
		$this->load->view('pengunjung/template/footer');
	}
}
?>