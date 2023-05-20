<?php
	class Login extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('m_login');
			$this->m_login->updateYear();
			// $this->load->library('form_validation');
		}

		function index()
		{
			$data['judul'] = "Home";
			$this->load->view('pengunjung/template/header',$data);
			$this->load->view('pengunjung/rumah');
			$this->load->view('pengunjung/template/footer');
		}

		function halaman()
		{
			$this->load->view('v_login');
		}

		function cek()
		{
			$username=strip_tags($this->input->post('username')); // strip tags berfungsi untuk mencegah html injection, artinya ketika misal user mengeetik <a> ada </a> maka tag <a> tidak akan dijalankan , berguna untuk mencegah pihak tidak bertanggung jawab melakukan kegiatan nakal
			$password=strip_tags($this->input->post('password'));
			// dan untuk htmlspecialchar berguna untuk mengubah tag seperti < dan > menjadi bentuk lain agar tidak bisa dijalankan dalam tag dan juga berguna mencegah html injection

			// $this->form_validation->set_rules('name_form','name_alisas','required|trim',
			// 	[
			// 		'required' => 'your text',
			// 	]);
			$this->form_validation->set_rules('username','Username','required|trim',
				[
					'required' => '* Username Tidak Boleh Kosong',
				]);
			$this->form_validation->set_rules('password','Password','required|trim',
				[
					'required' => '* Password Tidak Boleh Kosong',
				]);
			if ($this->form_validation->run() ==false) 
			{
				$this->load->view('v_login');
			} else
				{
					$this->db->from('user');
					$this->db->join('penduduk','penduduk.id_penduduk = user.id_penduduk');
					$user=$this->db->get_where('',['username' => $username])->row_array(); //row array artinya untuk mengambil 1 saja row
					//perintah diatas artinya mendapat tabel user di kolom username yang isinya sama dengan inputan
					//karena array dan perintah row array maka hasilnya akan dikembalikan atau jika ada username dengan nama yang diketikan maka akan mendapatkan nama password dan jabatan intinya semua isi yang ada di tabel sesuai nama usernamenya 

					if ($user) 
					{
						
							if (password_verify($password, $user['password'])) // adalah untuk verifikasi password yang sudah di enkripsi dengan perintah password_hash, dalam aplikasi ini saat input admin 
							{
								$rt = $this->db->get_where('rt',['id_rt'=>$user['id_rt'],])->row_array();
								$this->session->set_userdata('ses_rt',$rt['rt']);

								$this->session->set_userdata('masuk',TRUE);
								$this->session->set_userdata('ses_idrt',$user['id_rt']);
								$this->session->set_userdata('ses_alamat',$user['alamat']);
								$this->session->set_userdata('ses_user',$user['username']);
								$this->session->set_userdata('ses_name',$user['nama']);
								$this->session->set_userdata('ses_id',$user['id_penduduk']);

								if ($user['jabatan']=='Kadus') 
								{
									$this->session->set_userdata('masuk','kadus');
									redirect('home');
								} elseif ($user['jabatan']=='RT') 
									{
										$this->session->set_userdata('masuk','rt');
										redirect('home');
									} elseif ($user['jabatan']=='RW') 
										{
											$this->session->set_userdata('masuk','rw');
											redirect('home');
										} elseif ($user['jabatan']=='Ketua Pemuda' || $user['jabatan']=='Wakil Ketua Pemuda')
											{
												$this->session->set_userdata('masuk','kpemuda');
												redirect('home');
											} elseif ($user['jabatan']=='Sekretaris') 
												{
													$this->session->set_userdata('masuk','sekretaris');
													redirect('home');
												} elseif ($user['jabatan']=='Bendahara') 
													{
														$this->session->set_userdata('masuk','bendahara');
														redirect('home');
													}
							} else 
								{
									echo $this->session->set_flashdata('msgp','* Password Salah');
									$this->load->view('v_login');
								}
						
					} else 
						{
							echo $this->session->set_flashdata('msg','* Username Tidak Ada');
							$this->load->view('v_login');
						}
				}
		// 	$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		// 	$password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

		// 	$cek_kadus=$this->m_login->auth_kadus($username,$password);

		// 	if ($cek_kadus->num_rows() > 0) 
		// 	{
		// 		$data=$cek_kadus->row_array();
		// 		$this->session->set_userdata('masuk',TRUE);

		// 		if ($data['jabatan']=='Kadus') 
		// 		{
		// 			$this->session->set_userdata('masuk','kadus');
		// 			$this->session->set_userdata('ses_user',$data['username']);
		// 			$this->session->set_userdata('ses_name',$data['nama']);
		// 			redirect('home');
		// 		}
		// 		else
		// 		{
		// 			$cek_kpemuda=$this->m_login->auth_kpemuda($username,$password);
		// 			if ($cek_kpemuda->num_rows() > 0) 
		// 			{
		// 				$data=$cek_kpemuda->row_array();
		// 				$this->session->set_userdata('masuk',TRUE);

		// 				if ($data['jabatan']=='Kpemuda') 
		// 				{
		// 					$this->session->set_userdata('masuk','kpemuda');
		// 					$this->session->set_userdata('ses_user',$data['username']);
		// 					$this->session->set_userdata('ses_name',$data['nama']);
		// 					redirect('home');
		// 				} else 
		// 				{
		// 					$cek_RT=$this->m_login->auth_RT($username,$password);
		// 					if ($cek_RT->num_rows() > 0) 
		// 					{
		// 						$data=$cek_RT->row_array();
		// 						$this->session->set_userdata('masuk',TRUE);

		// 						if ($data['jabatan']=='RT') 
		// 						{
		// 							$this->session->set_userdata('masuk','rt');
		// 							$this->session->set_userdata('ses_user',$data['username']);
		// 							$this->session->set_userdata('ses_name',$data['nama']);
		// 							redirect('home');
		// 						} else
		// 						{
		// 							$cek_RW=$this->m_login->auth_RW($username,$password);
		// 							if ($cek_RW->num_rows() > 0) 
		// 							{
		// 								$data=$cek_RW->row_array();
		// 								$this->session->set_userdata('masuk',TRUE);

		// 								if ($data['jabatan']=='RW') 
		// 								{
		// 									$this->session->set_userdata('masuk','rw');
		// 									$this->session->set_userdata('ses_user',$data['username']);
		// 									$this->session->set_userdata('ses_name',$data['nama']);
		// 									redirect('home');
		// 								} else 
		// 								{
		// 									$cek_sekretaris=$this->m_login->auth_sekretaris($username,$password);
		// 									if ($cek_sekretaris->num_rows() >0 ) 
		// 									{
		// 										$data=$cek_sekretaris->row_array();
		// 										$this->session->set_userdata('masuk',TRUE);

		// 										if ($data['jabatan']=='Sekretaris') 
		// 										{
		// 											$this->session->set_userdata('masuk','sekretsris');
		// 											$this->session->set_userdata('ses_user',$data['username']);
		// 											$this->session->set_userdata('ses_name',$data['nama']);
		// 											redirect('home');
		// 										} else
		// 										{
		// 											$cek_bendahara=$this->m_login->auth_bendahara($username,$password);
		// 											if ($cek_bendahara->num_rows() > 0) 
		// 											{
		// 												$data=$cek_bendahara->row_array();
		// 												$this->session->set_userdata('masuk',TRUE);

		// 												if ($data['jabatan']=='Bendahara') 
		// 												{
		// 													$this->session->set_userdata('masuk','bendahara');
		// 													$this->session->set_userdata('ses_user',$data['username']);
		// 													$this->session->set_userdata('ses_name',$data['nama']);
		// 													redirect('home');
		// 												}
		// 											}
		// 										}
		// 									}
		// 								}
		// 							}
		// 						}
		// 					}
		// 				}
		// 			}
		// 		}
		// 	} else
		// 	{
		// 		$url=base_url('login/index');
		// 		echo $this->session->set_flashdata('msg','Username Atau Password Anda Salah');
		// 	}
		}

		function logout()
		{
			$this->session->sess_destroy();
			$url=base_url('');
			redirect($url);
		}
	}
?>