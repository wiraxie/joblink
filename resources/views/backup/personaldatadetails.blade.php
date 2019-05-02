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

$uploads = json_decode($row[0]['uploads'], TRUE);
if (!is_array($uploads) && !is_object($uploads))
{$uploads = [];}

?>

  <!-- Your html goes here -->
  <div class='panel panel-default'>
    <div class='panel-heading'>DATA</div>
    <div class='panel-body'>      
		 
		<div class='container col-xs-6'>

		<table class="table table-striped table-bordered">
			<tr>
			  <td>Nama Lengkap</td>
			  <td><?php echo $row[0]['personalname'];?></td>
			</tr>

			<tr>
			  <td>Tanggal Daftar</td>
			  <td><?php echo $row[0]['created_at'];?></td>
			</tr>
			
			<tr>
			  <td>Tempat Lahir</td>
			  <td><?php echo $row[0]['birthlocation'];?></td>
			</tr>
			
			<tr>
			  <td>Tanggal Lahir</td>
			  <td><?php echo $row[0]['dob'];?></td>
			</tr>
			
			<tr>
			  <td>Jenis Kelamin</td>
			  <td><?php echo $row[0]['gender'];?></td>
			</tr>
			
			<tr>
			  <td>Tipe Identitas</td>
			  <td><?php echo $row[0]['idtype'];?></td>
			</tr>
			
			<tr>
			  <td>No Identitas</td>
			  <td><?php echo $row[0]['idno'];?></td>
			</tr>
			
			<tr>
			  <td>Status Pernikahan</td>
			  <td><?php echo $row[0]['marital'];?></td>
			</tr>
			
			<tr>
			  <td>Agama</td>
			  <td><?php echo $row[0]['religion'];?></td>
			</tr>
		</table>

		<div class="container">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#menu2">Pendidikan</a></li>
				<li><a data-toggle="tab" href="#menu4">Bahasa yang Dikuasai</a></li>
				<li><a data-toggle="tab" href="#menu5">Pengalaman Kerja</a></li>
				<li><a data-toggle="tab" href="#menu3">Hasil Tes</a></li>
				<li><a data-toggle="tab" href="#menu6">Berkas</a></li>
			</ul>

			<br>
			<div class="tab-content">
				<br>
				<div id="menu2" class="tab-pane fade in active">
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
				
				<div id="menu6" class="tab-pane fade">
				<!--BERKAS-->
				<div style="border:1px solid black; width:91%;">
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Berkas Foto</th>
						</tr>
						<tr>
							<td>
								<?php 
									foreach($uploads as $key=>$val)
									{
										echo '<a target="_blank" href="'.$val['photourl'].'"><img width="105px" height="auto" src="'.$val['photourl'].'"><br></a>';
									}								
								?>
							</td>
						</tr>
					</table>
				</div>
				<!--BERKAS-->
				</div>
				
				
				</div>
				</div>
			</div>

	<div class='container col-xs-6'>
		<br><img src="<?php echo $row[0]['photourl'];?>" class="img-responsive img-thumbnail" width="105">
	</div>
	
</div>
</div>
@endsection