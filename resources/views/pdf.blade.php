<!DOCTYPE html>
<html lang="en">
<head>

<?php
 //!is_array()
 //!is_object()
$formal = json_decode($res[0]['formaleducation'], TRUE);
if (!is_array($formal) && !is_object($formal))
{$formal = [];}

$ipk = json_decode($res[0]['gpa'], TRUE);
if (!is_array($ipk) && !is_object($ipk))
{$ipk = [];}

$nonforamal = json_decode($res[0]['nonformaleducation'], TRUE);
if (!is_array($nonforamal) && !is_object($nonforamal))
{$nonforamal = [];}

$psycho = json_decode($res[0]['psychotestdetails'], TRUE);
if (!is_array($psycho) && !is_object($psycho))
{$psycho = [];}

$ptest = json_decode($res[0]['personaltestdetails'], TRUE);
if (!is_array($ptest) && !is_object($ptest))
{$ptest = [];}

$languages = json_decode($res[0]['languages'], TRUE);
if (!is_array($languages) && !is_object($languages))
{$languages = [];}

$experiences = json_decode($res[0]['experiences'], TRUE);
if (!is_array($experiences) &&!is_object($experiences))
{$experiences = [];}

$intview = json_decode($res[0]['interviewdetails'], TRUE);
if (!is_array($intview) &&!is_object($intview))
{$intview = [];}

?>

<style>

body
{
    font-family: 'Helvetica';
	font-size: 10pt;
	font-weight: 400;
}

table
{
    border-collapse: collapse;
    border-spacing: 0;
    border: 2px solid #ddd;
	width: 98%;
	border-collapse:separate;
}

table.pokok
{
	width: 70%;
}

td
{
	padding: 4px;
}

th, td.atas
{
    text-align: left;
    padding: 7px;
}

.w3-display-topright
{
	position:absolute;right:0;top:0
}

.w3-padding
{
	padding:8px 16px!important
}

.solid {border-style: none;}

.profilepic
{
	margin-top: 105px;
}

.graycolor
{
	background-color: #f0f0f0;
}
tr>th
{
	background-color: #f0f0f0;
}

.page_break
{
		page-break-before: always;
}

.periode
{
	text-align: center;
}

h3
{
	font-size: 14pt;
}

.mytotal 
{
      text-align:right;
}

.floating-box 
{
  float: left;
  width: 21px;
  height: 21px;
  border: 3px solid;  
}

.accstatus
{
 margin-left:35px;
}

</style>

</head>
<body>

	<div>
		<img src="https://i.imgur.com/Q03Esps.jpg" align="center" width="210px" height="auto">
	<div>

	<div class='col-xs-6'>
		<br><img src="<?php echo $res[0]['photourl'] ?>" class="w3-display-topright w3-padding profilepic" width="105">
	</div>

	<div class="col-xs-6">
		<table class="table table-striped table-bordered pokok">
			<tr class="graycolor">
			  <td class="atas">Nomor Kandidat</td>
			  <td class="atas"><?php echo $res[0]['candidateno']?></td>
			</tr>

			<tr>
			  <td class="atas">Tanggal Apply</td>
			  <td><?php $time = strtotime($res[0]['appdate']);
					$newformat = date('d-m-Y',$time);
					echo $newformat;?></td>
			</tr>

			<tr class="graycolor">
			  <td class="atas">Posisi/Jabatan</td>
			  <td class="atas"><?php echo $res[0]['position']?></td>
			</tr>

			<tr>
			  <td class="atas">Nama Pelamar</td>
			  <td class="atas"><?php echo $res[0]['personalname']?></td>
			</tr>

			<tr class="graycolor">
			  <td class="atas">Untuk Perusahaan</td>
			  <td class="atas"><?php echo $res[0]['comname'];?></td>
			</tr>
		</table>
	</div>

	<br>
	<div>
		<div class="solid">
		<h3 align="center">INFORMASI POKOK</h3>

		<table class="table table-striped table-bordered">
			<tr class="graycolor">
				<td class="atas">Nama Lengkap</td>
				<td class="atas"><?php echo $res[0]['personalname']?></td>
			</tr>
			<tr>
				<td class="atas">Tempat/Tanggal Lahir</td>
				<td class="atas"><?php echo $res[0]['birthlocation']?>, <?php $time = strtotime($res[0]['dob']);
				$newformat = date('d-m-Y',$time);
				echo $newformat;?></td>
			</tr>
			<tr class="graycolor">
				<td class="atas">Jenis Kelamin</td>
				<td class="atas"><?php echo $res[0]['gender']?></td>
			</tr>
			<tr class="graycolor">
				<td class="atas">Alamat</td>
				<td class="atas"><?php echo $res[0]['address']?></td>
			</tr>
			<tr>
				<td class="atas">Etnik</td>
				<td class="atas"><?php echo $res[0]['ethnic']?></td>
			</tr>
			<tr class="graycolor">
				<td class="atas">Tipe Identitas</td>
				<td class="atas"><?php echo $res[0]['idtype']?></td>
			</tr>
			<tr>
				<td class="atas">Nomor Identitas</td>
				<td class="atas"><?php echo $res[0]['idno']?></td>
			</tr>
			<tr class="graycolor">
				<td class="atas">Status Pernikahan</td>
				<td class="atas"><?php echo $res[0]['marital']?></td>
			</tr>
			<tr>
				<td class="atas">Agama</td>
				<td class="atas"><?php echo $res[0]['religion']?></td>
			</tr>
		</table><br>
		</div>
	</div>

	<div class="page_break"></div>
	
	<div>
		<div class="solid">
		<h3 align="center">PENDIDIKAN</h3>

		<div style="padding-bottom: 5px;"><label >Formal:</label></div>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Tingkat</th>
				<th>Nama Lembaga</th>
				<th>Jurusan</th>
				<th class="periode">Periode Masuk</th>
				<th class="periode">Periode Lulus</th>
			</tr>
			<?php foreach ($formal as $key => $val) {?>
			<tr>
				<td><?php echo $val['edulevel'];?></td>
				<td><?php echo $val['institutionname'];?></td>
				<td><?php echo $val['major'];?></td>
				<td class="periode"><?php echo $val['startyear'];?></td>
				<td class="periode"><?php echo $val['endyear'];?></td>
			</tr>
			<?php }?>
		</table>

		<br>
		<div style="padding-bottom: 5px;"><label >IPK:</label></div>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Tahun</th>
				<th>Tingkat</th>
				<th>Jurusan</th>
				<th class="periode">IPK</th>
			</tr>
			<?php foreach ($formal as $key => $val) {?>
			<tr>
				<td><?php echo $val['startyear'];?></td>
				<td><?php echo $val['edulevel'];?></td>
				<td><?php echo $val['major'];?></td>
				<td class="periode"><?php echo $val['gpa'];?></td>
			</tr>
			<?php }?>
		</table>

		<br>
		<div style="padding-bottom: 5px;"><label >Non-Formal:</label></div>
		<table class="table table-striped table-bordered">
			<tr>
				<th>Nama Lembaga</th>
				<th>Bidang Studi</th>
				<th>Jurusan</th>
				<th class="periode">Periode Masuk</th>
				<th class="periode">Periode Lulus</th>
			</tr>
			<?php foreach ($nonforamal as $key => $val) {?>
			<tr>
				<td><?php echo $val['institutionname'];?></td>
				<td><?php echo $val['studyfield'];?></td>
				<td><?php echo $val['major'];?></td>
				<td class="periode"><?php echo $val['startperiod'];?></td>
				<td class="periode"><?php echo $val['endperiod'];?></td>
			</tr>
			<?php }?>
		</table>
		</div>
	</div>

	<br>
	<div>
		<div class="solid">
			<h3 align="center">BAHASA YANG DIKUASAI</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th>Bahasa</th>
					<th>Kemampuan</th>
				</tr>
				<?php foreach ($languages as $key => $val) {?>
				<tr>
					<td><?php echo $val['langname'];?></th>
					<td><?php echo $val['langlevel'];?></th>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>

	<br>
	<div>
		<div class="solid">
			<h3 align="center">PENGALAMAN KERJA</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<th>Nama Tempat</th>
					<th>Lokasi</th>
					<th class="periode">Periode Masuk</th>
					<th class="periode">Periode Selesai</th>
					<th>Posisi/Jabatan</th>
				</tr>
				<?php foreach ($experiences as $key => $val) {?>
				<tr>
					<td><?php echo $val['workplacename'];?></th>
					<td><?php echo $val['workplaceloc'];?></th>
					<td class="periode"><?php echo $val['startperiod'];?></th>
					<td class="periode"><?php echo $val['endperiod'];?></th>
					<td><?php echo $val['jobname'];?></th>
				</tr>
				<?php }?>
			</table>
		</div>
	</div>

	<div class="page_break"></div>
	
	<div>
		<div class="solid">
			<h3 align="center">HASIL TES</h3>

			<div style="padding-bottom: 5px;"><label>Analytic, Carefulness,Quantitative Logic,Variation Picture Test:</label></div>
			<!--<table class="table table-striped table-bordered pokok">
				<tr>
					<td>Tanggal</td>
					<td><?php echo $res[0]['psychotestdate'];?></td>
				<tr>
				<tr>
					<td>Durasi</td>
					<td><?php echo $res[0]['psychotestduration'];?></td>
				<tr>
				<tr>
					<td>Total Skor</td>
					<td><?php echo $res[0]['psychotesttotalscore'];?></td>
				<tr>
			</table>
			<br><label>Detail</label>: -->
				<table class="table table-striped table-bordered tabletests">
					<tr>
						<th>Jenis Tes</th>
						<th align="center">Jawaban Benar</th>
						<!--<th style="border:0; background-color:white;"></th>-->
						<th style="border-left: 2px solid #ddd; text-align:center;">A</th>
						<th>B</th>
						<th>C</th>
						<th>D</th>
						<th>E</th>
						<th>F</th>
						<th style="border-left: 2px solid #ddd; text-align:center;">Skor</th>
					</tr>
					<?php foreach ($psycho as $key => $val) {?>
					<tr>
						<td><?php echo $val['testtype'];?></th>
						<td align="center"><?php echo $val['correct_answers'];?></th>
						<!--<th style="border:0; background-color:white;"></th>-->
						<td style="border-left: 2px solid #ddd; text-align:center;">100</td>
						<td>90</td>
						<td>80</td>
						<td>70</td>
						<td>60</td>
						<td>50</td>
						<td style="border-left: 2px solid #ddd; text-align:center;"><?php echo $val['score'];?></th>
					</tr>
					<?php }?>
					<tr>
						<td style="border-top: 2px solid #ddd;" class="mytotal" colspan="2"><strong>Total</strong></td>
						<td style="border-top: 2px solid #ddd; border-left: 2px solid #ddd; text-align:center;"><strong>400</strong></td>
						<td style="border-top: 2px solid #ddd; text-align:left;"><strong>360</strong></td>
						<td style="border-top: 2px solid #ddd; text-align:left;"><strong>320</strong></td>
						<td style="border-top: 2px solid #ddd; text-align:left;"><strong>280</strong></td>
						<td style="border-top: 2px solid #ddd; text-align:left;"><strong>240</strong></td>
						<td style="border-top: 2px solid #ddd; text-align:left;"><strong>200</strong></td>
						<td style="border-top: 2px solid #ddd; border-left: 2px solid #ddd; text-align:center;"><strong><?php echo $res[0]['psychotesttotalscore'];?></strong></td>
					</tr>
				</table>

			<br>
			<div style="padding-bottom: 5px;"><label >Personality Test:</label></div>
					<!--<table cclass="table table-striped table-bordered pokok">
						<tr>
							<td>Tanggal</td>
							<td><?php echo $res[0]['personaltestdate'];?></td>
						<tr>
						<tr>
							<td>Durasi</td>
							<td><?php echo $res[0]['personaltestduration'];?></td>
						<tr>
						<tr>
							<td>Total Skor</td>
							<td><?php echo $res[0]['personaltesttotalscore'];?></td>
						<tr>
					</table>
					<br><label>Detail</label>: !-->
						<table class="table table-striped table-bordered tabletests">
							<tr>
								<th>Jenis Tes</th>
								<th align="center">Jawaban Benar</th>
								<!--<th style="border:0; background-color:white;"></th>-->
								<th style="border-left: 2px solid #ddd; text-align:center;">A</th>
								<th>B</th>
								<th>C</th>
								<th>D</th>
								<th>E</th>
								<th>F</th>
								<th style="border-left: 2px solid #ddd; text-align:center;">Skor</th>
							</tr>
							<?php foreach ($ptest as $key => $val) {?>
							<tr>
								<td><?php echo $val['testtype'].'<br>';?></th>
								<td align="center"><?php echo $val['correct_answers'];?></th>
								<!--<th style="border:0; background-color:white;"></th>-->
								<td style="border-left: 2px solid #ddd; text-align:center;">100</td>
								<td>90</td>
								<td>80</td>
								<td>70</td>
								<td>60</td>
								<td>50</td>
								<td style="border-left: 2px solid #ddd; text-align:center;"><?php echo $val['score'];?></th>
							</tr>
							<?php }?>
							<tr>
								<td style="border-top: 2px solid #ddd;" class="mytotal" colspan="2"><strong>Total</strong></td>
								<td style="border-top: 2px solid #ddd; border-left: 2px solid #ddd; text-align:center;"><strong>400</strong></td>
								<td style="border-top: 2px solid #ddd; text-align:left;"><strong>360</strong></td>
								<td style="border-top: 2px solid #ddd; text-align:left;"><strong>320</strong></td>
								<td style="border-top: 2px solid #ddd; text-align:left;"><strong>280</strong></td>
								<td style="border-top: 2px solid #ddd; text-align:left;"><strong>240</strong></td>
								<td style="border-top: 2px solid #ddd; text-align:left;"><strong>200</strong></td>
								<td style="border-top: 2px solid #ddd; border-left: 2px solid #ddd; text-align:center;"><strong><?php echo $res[0]['personaltesttotalscore'];?></strong></td>
							</tr>
						</table>
			</ul>
		</div>
	</div>
	
	<div class="page_break"></div>
	<div>
		<div class="solid">
			<h3 align="center">HASIL INTERVIEW</h3>
			<table>
				<tr>
					<td>Interview Code</td>
					<td><?php echo $intview[0]['intcode'];?></td>
				</tr>
				<tr>
					<td>Tanggal Interview</td>
					<td><?php $time = strtotime($intview[0]['intdate']);
					$newformat = date('d-m-Y',$time);
					echo $newformat;?></td>
				</tr>
				<tr>
					<td>Catatan</td>
					<td><?php echo $intview[0]['note'];?></td>
				</tr>
			</table>
			<table class="table table-striped table-bordered">
				<tr class="graycolor">
					<td><strong>Uraian</strong></td>
					<td><strong>Nilai</strong></td>
				</tr>
				<tr>
					<td class="atas">Sikap Duduk</td>
					<td><?php echo $intview[0]['duduk'];?></td>
				</tr>
				<tr class="graycolor">
					<td class="atas">Sikap Berbicara</td>
					<td><?php echo $intview[0]['bicara'];?></td>
				</tr>
				<tr>
					<td class="atas">Cara Pandang Pekerjaan</td>
					<td><?php echo $intview[0]['pandang'];?></td>
				</tr>
				<tr class="graycolor">
					<td class="atas">Pengetahuan</td>
					<td><?php echo $intview[0]['pengetahuan'];?></td>
				</tr>
				<tr>
					<td class="atas">Pemahaman Tentang Pekerjaan</td>
					<td><?php echo $intview[0]['pemahaman'];?></td>
				</tr>
				<tr class="graycolor">
					<td class="atas">Loyalitas</td>
					<td><?php echo $intview[0]['loyal'];?></td>
				</tr>
				<tr>
					<td class="atas">Lainnya</td>
					<td><?php echo $intview[0]['other'];?></td>
				</tr>
			</table>
			<br>
			Keterangan Nilai Interview:
			<br>
			<table class="table table-striped table-bordered">
				<tr class="graycolor">
					<td class="atas">A</td>
					<td>Sangat Baik</td>
				</tr>
				<tr>
					<td class="atas">B</td>
					<td>Baik</td>
				</tr>
				<tr class="graycolor">
					<td class="atas">C</td>
					<td>Cukup</td>
				</tr>
				<tr>
					<td class="atas">D</td>
					<td>Kurang</td>
				</tr>
			</table>
		</div>
	</div>

	<div class="page_break"></div>
	<div>
		<h3 align="center">KESIMPULAN PENILAIAN DARI JOBLINK</h3>
		<p>Checklist yang dianggap perlu</p>
		<div class="floating-box"></div><p class="accstatus">Diajukan</p>
		<div class="floating-box"></div><p class="accstatus">Dipertimbangkan</p>
		<div class="floating-box"></div><p class="accstatus">Ditunda</p>
		<p>Disarankan untuk posisi:</p>
		<p><i>Keterangan : Penilaian diatas merupakan analisa dan merupakan gambaran singkat dari hasil tes.</i></p>
	</div>
	
</body>
</html>
