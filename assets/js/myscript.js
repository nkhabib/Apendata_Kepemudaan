//sweet alert success
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
  type: 'success',
  title: '' + flashData,
  showConfirmButton: false,
  timer: 1500
})
}

//sweet alert gagal
const flashdatagagal = $('.flashdatagagal').data('flashdata');
if (flashdatagagal) {
	Swal.fire({
  type: 'error',
  title: '' + flashdatagagal
})
}

// cek all
$('#pilih-semua').on('click', function(){
	if (this.checked) {
		$('.tercek').each(function(){
			this.checked = true;
		});
	} else {
		$('.tercek').each(function(){
			this.checked = false;
		});
	}
});

$('.tercek').on('click', function(){
		if ($('.tercek:checked').length == $('.tercek').length) {
			$('#pilih-semua').prop('checked',true);
		} else {
			$('#pilih-semua').prop('checked',false);
		}
});
// end cek all

//tombol hapus banyak
$('.hapus').on('click', function (e) //$adalah tanda jquery tanda ". "menandakan kelas, on clik
//adalah ketika diklik, e adalah parameter untuk menerima link haref dari tag <a> atau formaction dari tag <button>
{
	e.preventDefault(); // artinya aksi default dalam kasus ini adalah link dari class hapus-banyak akan dihentikan
	const linktombol = $(this).attr('href');
	Swal.fire({
		  title: 'Apakah Anda Yakin?',
		  text: "Data Akan Dihapus",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya Hapus'
		}).then((result) => {
		  if (result.value) 
		  {
		  	document.location.href = linktombol;
		  }
		})
});

//dinamic select dari database untuk surat pengantar
$(document).ready(function(){
	//untuk rt
	$('#btn-hide').hide();
	$('#hiden').hide();
	$('#rtdinamis').change(function(){ // artinya ketika id rtdinamis ada isinya atau ketika berubah
		var id_rtdinamis = $('#rtdinamis').val();// membuat variabel yang isinya value dari id rtdinamis
		if (id_rtdinamis !='') {
			$.ajax({
				cache:false,
				url:"list",
				type:"POST",
				data:{id_rtdinamis:id_rtdinamis}, // id_rtdinamis adalah type post yang dikrim ke controller dengan ajax jquery
				//id_rtdinamis yang pertama adalah nama dan yang kedua adalah isinya yang diambl dari variabel yang sudah dibuat
				// dataType:"JSON",
				success:function(data){
					$('#hiden').show();
					$('#ktpdinamis').html(data);
				},
			});
		}
	});

	//untuk ktp
	$('#namahiden').hide();
	$('#ktpdinamis').change(function(){
		var ktpdinamis = $('#ktpdinamis').val();
		$('#namahiden').show();
		$('#pengantar').attr('required',true);
		$('#jenis').attr('required',true);
		if (ktpdinamis !='') {
			$('#btn-hide').show();
			$.ajax({
				cache:false,
				url:"name",
				type:"POST",
				data:{ktpdinamis:ktpdinamis},
				dataType:"json",
				success:function(data) {
					$.each(data,function(){
						$('#namadinamis').val(data.nama);
						$('#kelamindinamis').val(data.kelamin);
						$('#umurdinamis').val(data.umur);
						$('#agamadinamis').val(data.agama);
						$('#ttldinamis').val(data.ttl);
						$('#kerjadinamis').val(data.kerja);
						$('#kawindinamis').val(data.kawin);
						$('#alamatdinamis').val(data.alamat);
					});
				},
			});
		}
	});

//untuk rt jika memilih pilih rt maka akan hiden
	$('#rtdinamis').change(function(){
		$.ajax({
			cache:false,
		});

		$('#btn-hide').hide();
		$('#hiden').hide();
		$('#namahiden').hide();
		// $('#hiden').hide();
		// $('#namahiden').hide();
	});
// end untuk rt

//untuk ktp jika memilih pilih ktp maka akan hiden
	$('#ktpdinamis').change(function(){
		$('#jenis').val('');
		$('#lain').val('');
		$.ajax({
			cache:false,
		});

		var ktpdinamis = $('#ktpdinamis').val();
		if (ktpdinamis == '') {
			$('#namahiden').hide();
			$('#btn-hide').hide();
		}
	});

// end untuk ktp
});

// validasi jenis dan keterangan surat pengantar
$('#jenis').change(function(){
	var jenis = $('#jenis').val();
	if (jenis !='') {
		$('#label').hide();
		$('#pengantar').hide();
		$('#pengantar').removeAttr('required',true);
	} else if (jenis =='') {
		$('#label').show();
		$('#pengantar').show();
		$('#jenis').removeAttr('required',true);
		$('#pengantar').attr("required",true);
	}
});

///
$('#pengantar').keyup(function(){
	var antar = $('#pengantar').val();
	$('#jenis').removeAttr('required',true);
	if (antar !='') {
		$('#jenis-hide').hide();
	} else if (antar == '') {
		$('#jenis-hide').show();
	}
});

$('#jenis').change(function(){
	$('#lain').val('');
});


// jika surat pindah
$('#pindah').hide();
$('#lahir').hide();
$('#jenis').change(function(){
	var jenis = $('#jenis').val();
	if (jenis == 'Pengantar Pindah Penduduk') {
		$('#pindah').show();
		$('#desa').attr('required',true);
		$('#kec').attr('required',true);
		$('#kab').attr('required',true);
		$('#prov').attr('required',true);
		$('#alasan').attr('required',true);
		$('#jumlah').attr('required',true);
	} else {
		$('#pindah').hide();
		$('#desa').removeAttr('required',true);
		$('#kec').removeAttr('required',true);
		$('#kab').removeAttr('required',true);
		$('#prov').removeAttr('required',true);
		$('#alasan').removeAttr('required',true);
		$('#jumlah').removeAttr('required',true);
	}

	if (jenis == 'Pengantar Akta Kelahiran') {
		$('#lahir').show();
		$('#anak').attr('required',true);
		$('#ttlanak').attr('required',true);
	} else {
		$('#lahir').hide();
		$('#anak').removeAttr('required',true);
		$('#ttlanak').removeAttr('required',true);
	}
});
//end surat pindah
//end untuk surat pengantar

// dinamic select untuk input admin
$('#btn-admin').hide();
$('#hide-ktp-admin').hide();
$('#hide-admin').hide();
$('#rtadmin').change(function(){
	var rtadmin = $('#rtadmin').val();
	if (rtadmin !='') {
		$('#hide-ktp-admin').show();
		$.ajax({
			cache:false,
			url:"ktp",
			type:"POST",
			data:{rtadmin:rtadmin},
			success:function(data){
				$('#ktpadmin').html(data);
			},
		});
	} else if (rtadmin =='') {
		$('#hide-ktp-admin').hide();
		$('#show-ktp-admin').hide();
		$('#hide-admin').hide();
	}
});

$('#ktpadmin').change(function(){
	var ktpadmin = $('#ktpadmin').val();
	if (ktpadmin !='') {
		$('#hide-admin').show();
		$('#btn-admin').show();
		$.ajax({
			cache:false,
			url:"ambiljson",
			type:"POST",
			data:{ktpadmin:ktpadmin},
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#kkadmin').val(data.kk);
					$('#namaadmin').val(data.nama);
				});
			},
		});
	} else if (ktpadmin == '') {
		$('#hide-admin').hide();
		// $('#show-admin').hide();
	}
});

$('#rtadmin').change(function(){
	$('#hide-admin').hide();
	$('#kkadmin').val('');
	$('#namaadmin').val('');
	
	// $('#show-admin').hide();
});
// end untuk input admin


// dynamic untuk surat kematian
$('#btn-kematian-hide').hide();
$('#hiden-ktp-kematian').hide();
$('#hidenkematian').hide();
$('#rtkematian').change(function(){
	var rtkematian = $('#rtkematian').val();
	if (rtkematian =='') {
		$('#hiden-ktp-kematian').hide();
		$('#hidenkematian').hide();
	} else if (rtkematian != '') {
		$('#hiden-ktp-kematian').show();
		$.ajax({
			cache:false,
			url:"ktpmati",
			type:"POST",
			data:{rtkematian:rtkematian},
			success:function(data){
				$('#ktpkematian').html(data);
			},
		});
	}
});

$('#ktpkematian').change(function(){
	var ktpkematian = $('#ktpkematian').val();
	if (ktpkematian !='') {
		$('#hidenkematian').show();
		$('#btn-kematian-hide').show();
		$.ajax({
			cache:false,
			url:"json_ktp",
			data:{ktpkematian:ktpkematian},
			type:"POST",
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#namakematian').val(data.nama);
					$('#kelaminkematian').val(data.jk);
					$('#tanggalkematian').val(data.tgl_mati);
					$('#umurkematian').val(data.umur);
					$('#alamatkematian').val(data.alamat);
					$('#ttlkematian').val(data.ttl);
					$('#agamakematian').val(data.agama);
				});
			},
		});
	} else if (ktpkematian == '') {
		$('#hidenkematian').hide();
	}
});
//end untuk surat kematian

//dinamic untuk input rt rw
$('#hide-ktp-rtrw').hide();
$('#hide-rtrw').hide();
$('#btn-rtrw').hide();
$('#rt_rw').change(function(){
	$('#hide-rtrw').hide();
	var rt_rw = $('#rt_rw').val();
	if (rt_rw != '') {
		$.ajax({
			cache:false,
			url:"ktp_rtrw",
			data:{rt_rw:rt_rw},
			type:"POST",
			success:function(data){
				$('#ktp_rtrw').html(data);
			},
		});

		$('#hide-ktp-rtrw').show();
	} else {
		$('#hide-ktp-rtrw').hide();
		$('#hide-rtrw').hide();
	}
});

$('#ktp_rtrw').change(function(){
	var ktp_rtrw = $('#ktp_rtrw').val();
	if (ktp_rtrw != '') {
		$.ajax({
			cache:false,
			url:"json_rtrw",
			data:{ktp_rtrw:ktp_rtrw},
			type:"POST",
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#kk_rtrw').val(data.kk);
					$('#nama_rtrw').val(data.nama);
					$('#ttl_rtrw').val(data.ttl);
					$('#kelamin_rtrw').val(data.jk);
					$('#umur_rtrw').val(data.umur);
					$('#agama_rtrw').val(data.agama);
					$('#status_rtrw').val(data.status);
					$('#alamat_rtrw').val(data.alamat);
					$('#pekerjaan_rtrw').val(data.pekerjaan);
				});
			},
		});

		$.ajax({
			cache:false,
			url:"jabatanrt",
			data:{ktp_rtrw:ktp_rtrw},
			type:"POST",
			success:function(data){
				$('#jabatan_rtrw').html(data);
			},
		});

		$('#hide-rtrw').show();
		$('#btn-rtrw').show();
	} else {
		$('#hide-rtrw').hide();
		$('#btn-rtrw').hide();
	}
});

// validasi form edit rtrw
$('#pesan_kk').hide();
$('.validasi').submit(function(){
	var kk = $('#min_kk').val().length;
	if (kk < 17) {
		$('#pesan_kk').val("Masukan minimal 16 karakter");
		$('#pesan_kk').show();
		return false;
	}
});
// end validaso form edit rtrw
//end input dinamic rt rw

//edit rt/rw
//end edit rt/rw

// untuk input kelahiran
$('#kk_lahir').hide();
$('#hiden_lahir').hide();
$('#ibulahir').hide();
$('#rt_lahir').change(function(){
	var rt_lahir = $('#rt_lahir').val();
	if (rt_lahir != '') {
		$.ajax({
			cache:false,
			url:"kklahir",
			data:{rt_lahir:rt_lahir},
			type:"POST",
			success:function(data){
				$('#nokk_lahir').html(data);
			},
		});
		$('#kk_lahir').show();
		$('#hiden_lahir').hide();
		$('#show_lahirnama').hide();
	} else {
		$('#kk_lahir').hide();
		$('#hiden_lahir').hide();
	}
});

$('#nokk_lahir').change(function(){
	var nokk_lahir = $('#nokk_lahir').val();
	if (nokk_lahir != '') {
		$.ajax({
			cache:false,
			url:"ortukk",
			data:{nokk_lahir:nokk_lahir},
			type:"POST",
			success:function(data){
				$('#ayah_lahir').html(data);
			},
		});
		$('#show_lahirnama').show();
		$('#hiden_lahir').show();
		$('#ibulahir').hide();
		$('#ibulahir_show').hide();
	} else {
		$('#hiden_lahir').hide();
		$('#show_lahirnama').hide();
		$('#ibulahir').hide();
		$('#ibulahir_show').hide();
	}
});

$('#ayah_lahir').change(function(){
	var ayah_lahir = $('#ayah_lahir').val();
	var kk = $('#nokk_lahir').val();
	if (ayah_lahir != '') {
		$.ajax({
			cache:false,
			url:"ibukk",
			data:{kk:kk},
			type:"POST",
			success:function(data){
				$('#ibu_lahir').html(data);
			},
		});
		$('#ibulahir').show();
		$('#ibulahir_show').show();
	} else {
		$('#ibulahir').hide();
		$('#ibulahir_show').hide();
	}
});
// end untuk input kelahiran

// form edit kelahiran sebelum pencet tombol
// no_kk

$('#rteditlahir').change(function(){
	$('#ayaheditlahir').val("----");
	$('#ibueditlahir').val("----");
	var rtedit = $('#rteditlahir').val();
	if (rtedit != '') {
		$.ajax({
			cache:false,
			url:"../nokkedit",
			data:{rtedit:rtedit},
			type:"POST",
			success:function(data){
				$('#nokkeditlahir').html(data);
			},
		});
	} else {
		$('#nokkeditlahir').val("");
	}
});
// no_kk

// nama ayah
$('#nokkeditlahir').change(function(){
	var nokk_lahir = $('#nokkeditlahir').val();
	if (nokk_lahir != '') {
		$.ajax({
			cache:false,
			url:"../ortukk",
			data:{nokk_lahir:nokk_lahir},
			type:"POST",
			success:function(data){
				$('#ayaheditlahir').html(data);
			},
		});
	} else {
		$('#ayaheditlahir').val("--");
	}
});
// end nama ayah

//nama ibu

$('#ayaheditlahir').change(function(){
	var ayah_lahir = $('#ayaheditlahir').val();
	var kk = $('#nokkeditlahir').val();
	if (ayah_lahir != '') {
		$.ajax({
			cache:false,
			url:"../ibukk",
			data:{kk:kk},
			type:"POST",
			success:function(data){
				$('#ibueditlahir').html(data);
			},
		});
	} else {
		$('#ibueditlahir').val("");
	}
});

//end nama ibu
// end form edit kelahiran


// form edit kelahiran setelah pencet tombol
// no_kk setelah pencet update

$('#rteditlahirupdate').change(function(){
	$('#ayaheditlahirupdate').val("----");
	$('#ibueditlahirupdate').val("----");
	var rtedit = $('#rteditlahirupdate').val();
	if (rtedit != '') {
		$.ajax({
			cache:false,
			url:"./nokkedit",
			data:{rtedit:rtedit},
			type:"POST",
			success:function(data){
				$('#nokkeditlahirupdate').html(data);
			},
		});
	} else {
		$('#nokkeditlahirupdate').val("");
	}
});
// no_kk

// nama ayah setelah pencet tombol
$('#nokkeditlahirupdate').change(function(){
	var nokk_lahir = $('#nokkeditlahirupdate').val();
	if (nokk_lahir != '') {
		$.ajax({
			cache:false,
			url:"./ortukk",
			data:{nokk_lahir:nokk_lahir},
			type:"POST",
			success:function(data){
				$('#ayaheditlahirupdate').html(data);
			},
		});
	} else {
		$('#ayaheditlahirupdate').val("--");
	}
});
// end nama ayah

//nama ibu

$('#ayaheditlahirupdate').change(function(){
	var ayah_lahir = $('#ayaheditlahirupdate').val();
	var kk = $('#nokkeditlahirupdate').val();
	if (ayah_lahir != '') {
		$.ajax({
			cache:false,
			url:"./ibukk",
			data:{kk:kk},
			type:"POST",
			success:function(data){
				$('#ibueditlahirupdate').html(data);
			},
		});
	} else {
		$('#ibueditlahirupdate').val("");
	}
});

//end nama ibu
// end form edit kelahiran

//------input penduduk-----//
//jika jenis kelamin
$('#kelamin').change(function(){
	var gender = $('#kelamin').val();
	$('#statuskeluarga').html(
		"<option></option>"
		);
	$('#kepala_kk').html(
		"<option></option>"
		);
	if (gender == 'Laki-laki') {
		$('#status').html(
			"<option value=''>--Pilih--</option><option>Lajang</option><option>Menikah</option><option>Duda</option><option>Meninggal</option>"
			);
	} else if (gender == 'Perempuan') {
		$('#status').html(
			"<option value=''>--Pilih--</option><option>Lajang</option><option>Menikah</option><option>Janda</option><option>Meninggal</option>"
			);
	}
});

//status
$('#status').change(function(){
	var gender = $('#kelamin').val();
	var status = $('#status').val();
	if (gender == 'Laki-laki' && status == 'Menikah') {
		$('#statuskeluarga').html(
			"<option>Suami</option>"
			);
		$('#kepala_kk').html(
			"<option value='1'>Ya</option>"
			);
	} else if (gender == 'Perempuan' && status == 'Menikah') {
		$('#statuskeluarga').html(
			"<option>Istri</option>"
			);
		$('#kepala_kk').html(
			"<option value='0'>Tidak</option>"
			);
	} else if (status == 'Lajang') {
		$('#statuskeluarga').html(
			"<option>Anak<option>"
			);
		$('#kepala_kk').html(
			"<option value='0'>Tidak</option>"
			);
	} else if (status == 'Janda') {
		$('#statuskeluarga').html(
			"<option>Janda</option>"
			);
		$('#kepala_kk').html(
			"<option value='0'>Tidak</option>"
			);
	} else if (status == 'Duda') {
		$('#statuskeluarga').html(
			"<option value=''>--Pilih--</option><option>Duda</option><option>Kakek</option>"
			);
		$('#statuskeluarga').removeAttr('readonly',true);
		$('#kepala_kk').html(
			"<option value=''>--Pilih--</option><option value='1'>Ya</option><option value='0'>Tidak</option>"
			);
	} else if (status == 'Meninggal') {
		$('#statuskeluarga').html(
			"<option>Meninggal</option>"
			);
		$('#kepala_kk').html(
			"<option value='0'>Tidak</option>"
			);
	}
});
//end status

// end jenis kelamin

//-----end input penduduk ---- //


//=======>>> transaksi <<<<<========
	//untuk rt
	$('#btn-hide').hide();
	$('#hidentransaksi').hide();
	$('#rttrans').change(function(){ // artinya ketika id rtdinamis ada isinya atau ketika berubah
		var rttrans = $('#rttrans').val();// membuat variabel yang isinya value dari id rtdinamis
		if (rttrans !='') {
			$.ajax({
				cache:false,
				url:"list",
				type:"POST",
				data:{rttrans:rttrans}, // id_rtdinamis adalah type post yang dikrim ke controller dengan ajax jquery
				//id_rtdinamis yang pertama adalah nama dan yang kedua adalah isinya yang diambl dari variabel yang sudah dibuat
				// dataType:"JSON",
				success:function(data){
					$('#hidentransaksi').show();
					$('#ktptransaksi').html(data);
				},
			});
		}
	});

	//untuk ktp
	$('#namatransaksi').hide();
	$('#ktptransaksi').change(function(){
		var ktptransaksi = $('#ktptransaksi').val();
		$('#namatransaksi').show();
		if (ktptransaksi !='') {
			$('#btn-hide').show();
			$.ajax({
				cache:false,
				url:"name",
				type:"POST",
				data:{ktptransaksi:ktptransaksi},
				dataType:"json",
				success:function(data) {
					$.each(data,function(){
						$('#namatrans').val(data.nama);
						$('#kelamintrans').val(data.kelamin);
						$('#umurtrans').val(data.umur);
						$('#agamatrans').val(data.agama);
						$('#ttltrans').val(data.ttl);
						$('#kerjatrans').val(data.kerja);
						$('#kawintrans').val(data.kawin);
						$('#alamattrans').val(data.alamat);
					});
				},
			});
		} else {
			$('#namatransaksi').hide();
		}
	});

//untuk rt jika memilih pilih rt maka akan hiden
	$('#rttrans').change(function(){
		$.ajax({
			cache:false,
		});

		$('#btn-hide').hide();
		$('#hidentransaksi').hide();
		$('#namatransaksi').hide();
		// $('#hiden').hide();
		// $('#namahiden').hide();
	});
// end untuk rt

//untuk ktp jika memilih pilih ktp maka akan hiden
	$('#ktptransaksi').change(function(){
		var ktpdinamis = $('#ktpdinamis').val();
		if (ktpdinamis == '') {
			$('#namatransaksi').hide();
			$('#btn-hide').hide();
		}
	});

// end untuk ktp

// ======>>>> end transaksi <<<<========

// surat kematian

//rt
$('#ktppemohon').attr('readonly',true);
$('#rtpemohon').change(function(){
	var rtpemohon = $('#rtpemohon').val();
	if (rtpemohon == '') {
		$('#ktppemohon').attr('readonly',true);
		$.ajax({
			cache:false,
			url:"pemohon",
			type:"POST",
			data:{rtpemohon:rtpemohon},
			success:function(data){
				$('#ktppemohon').html(data);
			},
		});
	} else{
		$('#ktppemohon').removeAttr('readonly',true);
		$.ajax({
			cache:false,
			url:"pemohon",
			type:"POST",
			data:{rtpemohon:rtpemohon},
			success:function(data){
				$('#ktppemohon').html(data);
			},
		});
	} 
});

//endrt

// no ktp
$('#ktppemohon').change(function(){
	var ktppemohon = $('#ktppemohon').val();
	if (ktppemohon == '') {
		$('#pemohon').val('');
	} else {
		$.ajax({
			cache:false,
			url:"namapemohon",
			type:"POST",
			data:{ktppemohon:ktppemohon},
			dataType:"json",
			success:function(data){
				$.each(data,function(){
					$('#pemohon').val(data.nama);
				});
			},
		});
	}
});
// end no ktp
// end surat kematian

//----------Umur-----
$('#ttl').change(function(){
	var ttl = new Date($('#ttl').val());
	var today = new Date();
	var umur = Math.floor((today-ttl) / (365.25 * 24 * 60 * 60 *1000));
	$('#umur').val(umur);
});
//------- end umur----


// =====================>>>>>>>>>>>>>>> Untuk view Pemuda <<<<<<<<<<<<<<==========================================================

// =====================>>>>>>>>>>>>>>> End Untuk view Pemuda <<<<<<<<<<<<<<======================================================


// =========================== untuk pktp ================================
$('#pktpHide').hide();
$('#pktpHideForm').hide();
$('#pktpPrint').attr('disabled',true);
$('#selectPktp').change(function(){
	var idRt = $('#selectPktp').val();
	if (idRt == '') {
		$('#pktpHide').hide();
		$('#pktpHideForm').hide();
		$('#pktpPrint').attr('disabled',true);
	} else {
		$.ajax({
			cache:false,
			url:"pktpList",
			type:"POST",
			data:{idRt:idRt}, // id_rtdinamis adalah type post yang dikrim ke controller dengan ajax jquery
			//id_rtdinamis yang pertama adalah nama dan yang kedua adalah isinya yang diambl dari variabel yang sudah dibuat
			// dataType:"JSON",
			success:function(data){
				$('#pktpHide').show();
				$('#kkDinamis').html(data);
			},
		});
	}
});

$('#kkDinamis').change(function(){
	var kkDinamis = $('#kkDinamis').val();
	if (kkDinamis == '') {
		$('#pktpHideForm').hide();
		$('#pktpPrint').attr('disabled',true);
	} else {
		$('#pktpHideForm').show();
		$('#pktpPrint').attr('disabled',false);
	}
});
//  ========================== end pktp ===================