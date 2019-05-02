<!-- First, extends to the CRUDBooster Layout -->
@extends('crudbooster::admin_template')
@section('content')

<?php
 //!is_array()
 //!is_object()
$formal = json_decode($row[0]['formaleducation'], TRUE);
if (!is_array($formal) && !is_object($formal))
{$formal = [];}

$ipk = json_decode($row[0]['gpa'], TRUE);
if (!is_array($ipk) && !is_object($ipk))
{$ipk = [];}

$nonforamal = json_decode($row[0]['nonformaleducation'], TRUE);
if (!is_array($nonforamal) && !is_object($nonforamal))
{$nonforamal = [];}

$psycho = json_decode($row[0]['psychotestdetails'], TRUE);
if (!is_array($psycho) && !is_object($psycho))
{$psycho = [];}

$ptest = json_decode($row[0]['personaltestdetails'], TRUE);
if (!is_array($ptest) && !is_object($ptest))
{$ptest = [];}

$languages = json_decode($row[0]['languages'], TRUE);
if (!is_array($languages) && !is_object($languages))
{$languages = [];}

$experiences = json_decode($row[0]['experiences'], TRUE);
if (!is_array($experiences) &&!is_object($experiences))
{$experiences = [];}

?>

  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>DATA</div>
    <div class='panel-body'>      
		 
		<div class='container col-xs-6'>

		
		<a href="{{ URL::to('/admin/pdf?id=')}}<?php echo $row[0]['id']?>" class="btn btn-default">Export</a>
		<table class="table table-striped table-bordered">
			<tr>
			  <td>Nomor Kandidat</td>
			  <td><?php echo $row[0]['candidateno'];?></td>
			</tr>

			<tr>
			  <td>Tanggal Apply</td>
			  <td><?php $time = strtotime($row[0]['appdate']);
					$newformat = date('d/m/Y',$time);
					echo $newformat;?></td>
			</tr>
			
			<tr>
			  <td>Posisi/Jabatan</td>
			  <td><?php echo $row[0]['position'];?></td>
			</tr>
			
			<tr>
			  <td>Nama Pelamar</td>
			  <td><?php echo $row[0]['personalname'];?></td>
			</tr>
			
			<tr>
			  <td>Untuk Perusahaan</td>
			  <td><?php echo $row[0]['comname'];?></td>
			</tr>
		</table>

		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#menu1">Informasi Pokok</a></li>
				<li><a data-toggle="tab" href="#menu2">Pendidikan</a></li>
				<li><a data-toggle="tab" href="#menu4">Bahasa yang Dikuasai</a></li>
				<li><a data-toggle="tab" href="#menu5">Pengalaman Kerja</a></li>
				<li><a data-toggle="tab" href="#menu3">Hasil Tes</a></li>
			</ul>

			<br>
			<div class="tab-content">
				<div id="menu1" class="tab-pane fade in active">
				<!--POKOK-->
				<div style="border:1px solid black; width:91%;">
					<div class="container">
					<h4><u>Informasi Pokok</u></h4>

					<label>Nama Lengkap</label>: <?php echo $row[0]['personalname'];?>

					<br><label>Tempat/Tanggal Lahir</label>: <?php echo $row[0]['birthlocation'];?>/
					<?php $time = strtotime($row[0]['dob']);
					$newformat = date('d-M-Y',$time);
					echo $newformat;?>

					<br><label>Jenis Kelamin</label>: <?php echo $row[0]['dob'];?>		 

					<br><label>Etnik/Suku</label>: <?php echo $row[0]['ethnic'];?>

					<br><label>Tipe Identitas</label>: <?php echo $row[0]['idtype'];?>

					<br><label>Nomor Identitas</label>: <?php echo $row[0]['idno'];?>

					<br><label>Status Pernikahan</label>: <?php echo $row[0]['marital'];?>

					<br><label>Agama</label>: <?php echo $row[0]['religion'];?><br>
					<!--fotourl:{{$row->photourl}}-->
					</div>
				</div>
				<!--POKOK-->
				</div>
				
				<br>
				<div id="menu2" class="tab-pane fade">
				<!--PENDIDIKAN-->
				<div style="border:1px solid black; width:91%;">
					<div class="container">
					<h4><u>Pendidikan</u></h4>

					<label>Formal</label>:
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Tingkat</th>
							<th>Nama Lembaga</th>
							<th>Jurusan</th>
							<th>Periode Masuk</th>
							<th>Periode Lulus</th>
						</tr>
						<tr>
							<td><?php foreach ($formal as $key => $val) {echo $val['edulevel'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['institutionname'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['major'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['startyear'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['endyear'].'<br>';}?></td>
						</tr>
					</table>					
					
					<label>IPK</label>:
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Tahun</th>
							<th>Tingkat</th>
							<th>Jurusan</th>
							<th>IPK</th>
						</tr>
						<tr>
							<td><?php foreach ($formal as $key => $val) {echo $val['startyear'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['edulevel'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['major'].'<br>';}?></td>
							<td><?php foreach ($formal as $key => $val) {echo $val['gpa'].'<br>';}?></td>
						</tr>
					</table>
					
					<label>Non-Formal</label>:
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Nama Lembaga</th>
							<th>Bidang Studi</th>
							<th>Jurusan</th>
							<th>Periode Masuk</th>
							<th>Periode Lulus</th>
						</tr>
						<tr>
							<td><?php foreach ($nonforamal as $key => $val) {echo $val['institutionname'].'<br>';}?></td>
							<td><?php foreach ($nonforamal as $key => $val) {echo $val['studyfield'].'<br>';}?></td>
							<td><?php foreach ($nonforamal as $key => $val) {echo $val['major'].'<br>';}?></td>
							<td><?php foreach ($nonforamal as $key => $val) {echo $val['startperiod'].'<br>';}?></td>
							<td><?php foreach ($nonforamal as $key => $val) {echo $val['endperiod'].'<br>';}?></td>
						</tr>
					</table>			 

					</div>
				</div>
				<!--PENDIDIKAN-->
				</div>
				
				<br>
				<div id="menu4" class="tab-pane fade">
				<!--BAHASA-->
				<div style="border:1px solid black; width:91%;">
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Bahasa</th>
							<th>Kemampuan</th>
						</tr>
						<tr>
							<td><?php foreach ($languages as $key => $val) {echo $val['langname'].'<br>';}?></td>
							<td><?php foreach ($languages as $key => $val) {echo $val['langlevel'].'<br>';}?></td>
						</tr>
					</table>
				</div>
				<!--BAHASA-->
				</div>
				
				<br>
				<div id="menu5" class="tab-pane fade">
				<!--Pengalaman-->
				<div style="border:1px solid black; width:91%;">
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Nama Tempat</th>
							<th>Lokasi</th>
							<th>Periode Masuk</th>
							<th>Periode Selesai</th>
							<th>Posisi/Jabatan</th>
						</tr>
						<tr>
							<td><?php foreach ($experiences as $key => $val) {echo $val['workplacename'].'<br>';}?></td>
							<td><?php foreach ($experiences as $key => $val) {echo $val['workplaceloc'].'<br>';}?></td>
							<td><?php foreach ($experiences as $key => $val) {echo $val['startperiod'].'<br>';}?></td>
							<td><?php foreach ($experiences as $key => $val) {echo $val['endperiod'].'<br>';}?></td>
							<td><?php foreach ($experiences as $key => $val) {echo $val['jobname'].'<br>';}?></td>
						</tr>
					</table>
				</div>
				<!--Pengalaman-->
				</div>
				
				<br>
				<div id="menu3" class="tab-pane fade">
				<!--TEST-->
					<div style="border:1px solid black; width:91%;">
					<div class="container">
					<h4><u>Hasil Tes Psikologi</u></h4>
					
					<table class="table table-bordered" style="width:84%;">
						<tr>
							<td>Tanggal</td>
							<td><?php echo $row[0]['psychotestdate'];?></td>
						<tr>
						<tr>
							<td>Durasi</td>
							<td><?php echo $row[0]['psychotestduration'];?></td>
						<tr>
						<tr>
							<td>Total Skor</td>
							<td><?php echo $row[0]['psychotesttotalscore'];?></td>
						<tr>
					</table>

					<br><label>Detail</label>: 
						<table class="table table-striped" style="width:84%;">
							<tr>
								<th>Jenis Tes</th>
								<th>Jawaban Benar</th>
								<th>Skor</th>
							</tr>
							<tr>
								<td><?php foreach ($psycho as $key => $val) {echo $val['testtype'].'<br>';}?></td>
								<td><?php foreach ($psycho as $key => $val) {echo $val['correct_answers'].'<br>';}?></td>
								<td><?php foreach ($psycho as $key => $val) {echo $val['score'].'<br>';}?></td>
							</tr>
						</table>
						
					<h4><u>Hasil Tes Personality</u></h4>
					
					<table class="table table-bordered" style="width:84%;">
						<tr>
							<td>Tanggal</td>
							<td><?php echo $row[0]['personaltestdate'];?></td>
						<tr>
						<tr>
							<td>Durasi</td>
							<td><?php echo $row[0]['personaltestduration'];?></td>
						<tr>
						<tr>
							<td>Total Skor</td>
							<td><?php echo $row[0]['personaltesttotalscore'];?></td>
						<tr>
					</table>

					<br><label>Detail</label>: 
						<table class="table table-striped" style="width:84%;">
							<tr>
								<th>Jenis Tes</th>
								<th>Jawaban Benar</th>
								<th>Skor</th>
							</tr>
							<tr>
								<td><?php foreach ($ptest as $key => $val) {echo $val['testtype'].'<br>';}?></td>
								<td><?php foreach ($ptest as $key => $val) {echo $val['correct_answers'].'<br>';}?></td>
								<td><?php foreach ($ptest as $key => $val) {echo $val['score'].'<br>';}?></td>
							</tr>
						</table>
						
					
					<!--fotourl:{{$row->photourl}}-->
					</div>
					</div>
					</div>
				<!--TEST-->
				</div>
				</div>
			</div>

	<div class='container col-xs-6'>
		<br><img src="<?php echo $row[0]['photourl'];?>" class="img-responsive img-thumbnail" width="105">
	</div>
	
</div>
</div>
@endsection