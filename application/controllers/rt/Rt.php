<?php
class Rt extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rt/m_rt');
		$this->load->model('penduduk/m_penduduk');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		}
	}
	

	function get_rt($id_rt,$offset=0)
	{
		$this->db->where('id_rt',$id_rt);
		$this->db->where('status !=','Meninggal');
		$this->db->where('tahun',date('Y'));
		// $this->db->from('penduduk');
		// $this->db->join('rt','rt.id_rt = penduduk.id_rt');
		$rt = $this->db->get("penduduk");

		$config['total_rows'] = $rt->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt/'.$id_rt;
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

		$data['data'] = $this->m_rt->get_rt($id_rt,$config['per_page'],$offset);
		$data['rt'] = $this->m_penduduk->rt();
		$name = $this->db->get_where('rt',['id_rt' => $id_rt])->row_array();
		$isi['judul'] = "RT ".$name['rt'];
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt1($offset=0)
	{
		$rt1 = $this->db->get("rt1");

		$config['total_rows'] = $rt1->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt1';
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

		$data['data'] = $this->m_rt->get_rt1($config['per_page'],$offset);
		$isi['judul'] = 'RT 1';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt2($offset=0)
	{
		$rt2 = $this->db->get("rt2");

		$config['total_rows'] = $rt2->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt2';
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

		$data['data'] = $this->m_rt->get_rt2($config['per_page'],$offset);
		$isi['judul'] = ' RT 2';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt3($offset=0)
	{
		$rt3 = $this->db->get("rt3");

		$config['total_rows'] = $rt3->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt3';
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

		$data['data'] = $this->m_rt->get_rt3($config['per_page'],$offset);
		$isi['judul'] = ' RT 3';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt4($offset=0)
	{
		$rt4 = $this->db->get("rt4");

		$config['total_rows'] = $rt4->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt4';
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

		$data['data'] = $this->m_rt->get_rt4($config['per_page'],$offset);
		$isi['judul'] = ' RT 4';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt5($offset=0)
	{
		$rt5 = $this->db->get("rt5");

		$config['total_rows'] = $rt5->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt5';
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

		$data['data'] = $this->m_rt->get_rt5($config['per_page'],$offset);
		$isi['judul'] = ' RT 5';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

	function get_rt6($offset=0)
	{
		$rt6 = $this->db->get("rt6");

		$config['total_rows'] = $rt6->num_rows();
		$config['base_url'] = base_url().'rt/rt/get_rt6';
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

		$data['data'] = $this->m_rt->get_rt6($config['per_page'],$offset);
		$isi['judul'] = ' RT 6';
		$this->load->view('template/header', $isi);
		$this->load->view('penduduk/v_penduduk',$data);
		$this->load->view('template/footer');
	}

}