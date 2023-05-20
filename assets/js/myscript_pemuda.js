//========>>>>> isi otomatis form input pemuda <<<<<<<<<<===========
$('#hiden_ktp_pemuda').hide();
$('#hiden_pemuda').hide();
$('#rt_pemuda').change(function(){
	$('#hiden_pemuda').hide();
	var rt = $('#rt_pemuda').val();
	if (rt == "") {
		$('#hiden_ktp_pemuda').hide();
		$('#hiden_pemuda').hide();
	} else {
		$('#hiden_ktp_pemuda').show();
		$('#show_pemuda').hide();
		$.ajax({
			cache:false,
			url:"ktp",
			type:"POST",
			data:{rt:rt},
			success:function(data){
				$('#ktp_pemuda').html(data);
			},
		});
	}
});

$('#ktp_pemuda').change(function(){
	var ktp = $('#ktp_pemuda').val();
	if (ktp == "") {
		$('#hiden_pemuda').hide();
		$('#show_pemuda').hide()
	} else {
		$('#hiden_pemuda').show();
		$('#show_pemuda').show();
		$.ajax({
			cache:false,
			url:"jsoninput",
			type:"POST",
			data:{ktp:ktp},
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#kk_pemuda').val(data.kk);
					$('#nama_pemuda').val(data.nama);
					$('#ttl_pemuda').val(data.ttl);
					$('#kelamin_pemuda').val(data.kelamin);
					$('#umur_pemuda').val(data.umur);
					$('#agama_pemuda').val(data.agama);
					$('#status_pemuda').val(data.status);
					$('#statuskeluarga_pemuda').val(data.sttsklg);
					$('#statuskk_pemuda').val(data.kepalakk);
					$('#alamat_pemuda').val(data.alamat);
					$('#pekerjaan_pemuda').val(data.kerja);
				});
			},
		});
	}
});
//=====>>>>> end isi otomatis form input pemuda <<<<<<<<<<==========


// ========>>>>>>form input admin pemuda<<<<<<===========
$('#hiden_admin_pemuda').hide();
$('#rt_admin_pemuda').change(function(){
	var rtadmin = $('#rt_admin_pemuda').val();
	if (rtadmin == "") {
		$('#hiden_admin_pemuda').hide();
		$('#btn_hide_admin_pemuda').hide();
	} else {
		$('#hiden_admin_pemuda').show();
		$('#hiden_ktp_admin_pemuda').hide();
		$.ajax({
			cache:false,
			url:"ktpadmin",
			type:"POST",
			data:{rtadmin:rtadmin},
			success:function(data){
				$('#ktp_admin_pemuda').html(data);
			},
		});
	}
});


$('#ktp_admin_pemuda').change(function(){
	var ktp_admin = $('#ktp_admin_pemuda').val();
	if (ktp_admin == "") {
		$('#hiden_ktp_admin_pemuda').hide();
	} else {
		$('#hiden_ktp_admin_pemuda').show();
		$.ajax({
			cache:false,
			url:"jsoninput_admin",
			type:"POST",
			data:{ktp_admin:ktp_admin},
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#kkadmin').val(data.kk);
					$('#namaadmin').val(data.nama);
				});
			},
		});
	}
});
//=========>>>>>end form input admin pemuda<<<<<<<<===========

// ========>>>>>>form input seksi pemuda<<<<<<===========
$('#hiden_seksi_pemuda').hide();
// $('#btn_hide_seksi_pemuda').hide();
$('#rt_seksi_pemuda').change(function(){
	var rt_seksi = $('#rt_seksi_pemuda').val();
	if (rt_seksi =="") {
		$('#hiden_seksi_pemuda').hide();
	} else {
		$('#hiden_seksi_pemuda').show();
		// $('#btn_hide_seksi_pemuda').show();
		$.ajax({
			cache:false,
			url:"ktpseksi",
			type:"POST",
			data:{rt_seksi:rt_seksi},
			success:function(data){
				$('#ktp_seksi_pemuda').html(data);
			},
		});
	}
});

$('#ktp_seksi_pemuda').change(function(){
	var ktp_seksi = $('#ktp_seksi_pemuda').val();
	if (ktp_seksi!=="") {
		$.ajax({
			cache:false,
			url:"jsoninput_seksi",
			type:"POST",
			data:{ktp_seksi:ktp_seksi},
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#nama_seksi').val(data.nama);
					$('#jk_seksi').val(data.jk);
					$('#alamat_seksi').val(data.alamat);
				});
			},
		});
	}
});
// ========>>>>>>end form input seksi pemuda<<<<<<===========


