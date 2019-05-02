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

$intview = json_decode($row[0]['interviewdetails'], TRUE);
if (!is_array($intview) &&!is_object($intview))
{$intview = [];}

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
			  <td>Alamat</td>
			  <td><?php echo $row[0]['address'];?></td>
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
				<li><a data-toggle="tab" href="#menu7">Hasil Interview</a></li>
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
						<?php foreach ($formal as $key => $val) {?>
						<tr>
							<td><?php echo $val['edulevel'];?></td>
							<td><?php echo $val['institutionname'];?></td>
							<td><?php echo $val['major'];?></td>
							<td><?php echo $val['startyear'];?></td>
							<td><?php echo $val['endyear'];?></td>
						</tr>
						<?php }?>
					</table>					
					
					<label>IPK</label>:
					<table class="table table-striped" style="width:84%;">
						<tr>
							<th>Tahun</th>
							<th>Tingkat</th>
							<th>Jurusan</th>
							<th>IPK</th>
						</tr>
						<?php foreach ($formal as $key => $val) {?>
						<tr>
							<td><?php echo $val['startyear'];?></td>
							<td><?php echo $val['edulevel'];?></td>
							<td><?php echo $val['major'];?></td>
							<td><?php echo $val['gpa'];?></td>
						</tr>
						<?php }?>
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
						<?php foreach ($nonforamal as $key => $val) {?>
						<tr>
							<td><?php echo $val['institutionname'];?></td>
							<td><?php echo $val['studyfield'];?></td>
							<td><?php echo $val['major'];?></td>
							<td><?php echo $val['startperiod'];?></td>
							<td><?php echo $val['endperiod'];?></td>
						</tr>
						<?php }?>
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
						<?php foreach ($languages as $key => $val) {?>
						<tr>
							<td><?php echo $val['langname'];?></td>
							<td><?php echo $val['langlevel'];?></td>
						</tr>
						<?php }?>
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
						<?php foreach ($experiences as $key => $val) {?>
						<tr>
							<td><?php echo $val['workplacename'];?></td>
							<td><?php echo $val['workplaceloc'];?></td>
							<td><?php echo $val['startperiod'];?></td>
							<td><?php echo $val['endperiod'];?></td>
							<td><?php echo $val['jobname'];?></td>
						</tr>
						<?php }?>
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
						<!--<tr>
							<td>Durasi</td>
							<td><?php echo $row[0]['psychotestduration'];?></td>
						<tr>-->
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
							<?php foreach ($psycho as $key => $val) {?>
							<tr>
								<td><?php echo $val['testtype'];?></td>
								<td><?php echo $val['correct_answers'];?></td>
								<td><?php echo $val['score'];?></td>
							</tr>
							<?php }?>
						</table>
						
					<h4><u>Hasil Tes Personality</u></h4>
					
					<table class="table table-bordered" style="width:84%;">
						<tr>
							<td>Tanggal</td>
							<td><?php echo $row[0]['personaltestdate'];?></td>
						<tr>
						<!--<tr>
							<td>Durasi</td>
							<td><?php echo $row[0]['personaltestduration'];?></td>
						<tr>-->
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
							<?php foreach ($ptest as $key => $val) {?>
							<tr>
								<td><?php echo $val['testtype'];?></td>
								<td><?php echo $val['correct_answers'];?></td>
								<td><?php echo $val['score'];?></td>
							</tr>
							<?php }?>
						</table>
						
					
					<!--fotourl:{{$row->photourl}}-->
					</div>
					</div>
					</div>
				<!--TEST-->
				
				<div id="menu7" class="tab-pane fade">
				<!--INTERVIEW-->
				<div style="border:1px solid black; width:91%;">
					<table class="table table-striped" style="width:84%;">
						<tr>
							<td><strong>Interview Code</strong></td>
							<td><?php echo $intview[0]['intcode'];?></td>
						</tr>
						<tr>
							<td><strong>Tanggal Interview</strong></td>
							<td><?php echo $intview[0]['intdate'];?></td>
						</tr>
						<tr>
							<td><strong>Sikap Duduk</strong></td>
							<td><?php echo $intview[0]['duduk'];?></td>
						</tr>
						<tr>
							<td><strong>Sikap Berbicara</strong></td>
							<td><?php echo $intview[0]['bicara'];?></td>
						</tr>
						<tr>
							<td><strong>Cara Pandang Pekerjaan</strong></td>
							<td><?php echo $intview[0]['pandang'];?></td>
						</tr>
						<tr>
							<td><strong>Pengetahuan</strong></td>
							<td><?php echo $intview[0]['pengetahuan'];?></td>
						</tr>
						<tr>
							<td><strong>Pemahaman Tentang Pekerjaan</strong></td>
							<td><?php echo $intview[0]['pemahaman'];?></td>
						</tr>
						<tr>
							<td><strong>Loyalitas</strong></td>
							<td><?php echo $intview[0]['loyal'];?></td>
						</tr>
						<tr>
							<td><strong>Lainnya</strong></td>
							<td><?php echo $intview[0]['other'];?></td>
						</tr>
						<tr>
							<td><strong>Catatan</strong></td>
							<td><?php echo $intview[0]['note'];?></td>
						</tr>
					</table>
				</div>
				<!--INTERVIEW-->
				</div>
				
				<div id="menu6" class="tab-pane fade">
				<!--BERKAS-->
				<div style="border:1px solid black; width:91%;">
					<table class="table table-striped table-bordered" style="width:84%;">
						<tr>
							<th>Jenis Berkas</th>
							<th>Foto</th>
						</tr>
						<?php foreach($uploads as $key=>$val) {?>
						<tr>
							<td><?php echo $val['title'];?></td>
							<td>
								<a target="_blank" href="<?php echo $val['photourl'];?>">
									<img width="105px" height="auto" src="<?php echo $val['photourl'];?>">
								</a>
							</td>
						</tr>
						<?php }?>
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