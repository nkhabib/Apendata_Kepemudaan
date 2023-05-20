<?php
class Edaran extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk')!=TRUE)
		{
			$url = base_url();
			redirect($url);
			$this->load->library('form_validation');
		}
	}

	function cetak()
	{
		$this->form_validation->set_rules('kepada','Kepada','required',
			[
				'required' => 'Kepada Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('perihal','Perihal','required',
			[
				'required' => 'Perihal Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('tanggal','Tanggal','required|date',
			[
				'required' => 'Tanggal Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('waktu','Waktu','required',
			[
				'required' => 'Waktu Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('tempat','Tempat','required',
			[
				'required' => 'Tempat Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('acara','Acara','required',
			[
				'required' => 'Acara Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('lampiran','Lampiran','required',
			[
				'required' => 'Lampiran Tidak Boleh Kosong',
			]);
		if ($this->form_validation->run()==FALSE) 
		{
			$isi['judul'] = "Form Surat Edaran";
			$this->load->view('template/header',$isi);
			$this->load->view('edaran/v_cetak');
			$this->load->view('template/footer');
		} else {
			$this->load->library('pdf');
			$post = $this->input->post();
			$data = array(
				'kepada' => $post['kepada'],
				'perihal' => $post['perihal'],
				'tanggal' => $post['tanggal'],
				'waktu' => $post['waktu'],
				'tempat' => $post['tempat'],
				'acara' => $post['acara'],
				'lampiran' => $post['lampiran'],
			);
			$this->load->view('edaran/v_print',$data);
		}
	}
}
?>