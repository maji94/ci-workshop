<html>
<head>
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="icon">
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="apple-touch-icon">
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	table tr td { padding: 7px 5px; font-size: 10px; border:1px solid black;}
	th {
		font-family:Arial;
		color:black;
		font-size: 12px;
		background-color:lightgrey;
		border:1px solid black;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
	label, p {font-size: 12px;}
</style>
<style type="text/css" media="screen">
	body {width: 50%;margin: auto;}
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	table tr td { padding: 7px 5px; font-size: 10px; border:1px solid black;}
	th {
		font-family:Arial;
		color:black;
		font-size: 12px;
		background-color: #999;
		padding: 8px 0;
		border:1px solid black;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
	label, p {font-size: 12px;}
</style>
<title>Cetak Data Peserta Workshop</title>
</head>

<body onload="window.print()">
	<center>
		<h3 style="letter-spacing: 2;">KANTOR WILAYAH AGAMA BENGKULU</h3><br><hr>
	</center><br>
	<label>Judul Workshop : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($peserta)) {echo $peserta[0]->nm_kegiatan;} ?></p>
	<label>Lokasi Kegiatan : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($peserta)) {echo $peserta[0]->lokasi;} ?></p>
	<label>Waktu Pelaksanaan : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($peserta)) {
		echo nama_hari(date($peserta[0]->tgl_buka)).', '.tgl_indo(date($peserta[0]->tgl_buka))." s/d ".nama_hari(date($peserta[0]->tgl_tutup)).', '.tgl_indo(date($peserta[0]->tgl_tutup));} ?>
	</p><br>
	<table>
		<thead>
			<tr>
				<th width="2%">No</td>
				<?php 
				if ($nama != "") {
					echo '<th width="">Nama</td>';
				}
				if ($nip != "") {
					echo '<th width="">NIP</td>';
				}
				if ($ktp != "") {
				 	echo '<th width="">KTP</td>';
				}
				if ($ttl != "") {
					echo '<th width="">TTL</td>';
				}
				if ($jns_kelamin != "") {
					echo '<th width="">Jenis Kelamin</td>';
				}
				if ($agama != "") {
					echo '<th width="">Agama</td>';
				}
				if ($pendidikan != "") {
					echo '<th width="">Pendidikan</td>';
				}
				if ($alamat_rm != "") {
					echo '<th width="">Alamat Rumah</td>';
				}
				if ($emailhp != "") {
					echo '<th width="">Email/Hp</td>';
				}
				if ($unker != "") {
					echo '<th width="">Unit Kerja</td>';
				}
				if ($alamat_kt != "") {
					echo '<th width="">Alaamt Kantor</td>';
				}
				if ($jabatan != "") {
					echo '<th width="">Jabatan/ 	Golongan</td>';
				}
				if ($npwp != "") {
					echo '<th width="">NPWP</td>';
				}
				if ($norek != "") {
					echo '<th width="">No. Rekening</td>';
				}
				if ($ttd != "") {
					echo '<th width="20%" colspan="2">Tanda Tangan</td>';
				} ?>
			</tr>
		</thead>
		<tbody>
			<?php 
			if (!empty($peserta)) {
				$no = 0;
				foreach ($peserta as $d) {
					$no++;
			?>
			<tr>
				<td align="center"><?php echo $no; ?></td>
				<?php 
				if ($nama != "") {
					echo '<td align="center">'.$d->nama.'</td>';
				}
				if ($nip != "") {
					echo '<td align="center">'.$d->nip.'</td>';
				}
				if ($ktp != "") {
				 	echo '<td align="center">'.$d->ktp.'</td>';
				}
				if ($ttl != "") {
					echo '<td align="center">'.$d->tmp_lahir.', '.tgl_indo(date($d->tgl_lahir)).'</td>';
				}
				if ($jns_kelamin != "") {
					echo '<td align="center">'.$d->jns_kelamin = "laki" ? "Laki-laki" : "Perempuan	".'</td>';
				}
				if ($agama != "") {
					echo '<td align="center">'.$d->agama.'</td>';
				}
				if ($pendidikan != "") {
					echo '<td align="center">'.$d->pendidikan.'</td>';
				}
				if ($alamat_rm != "") {
					echo '<td align="center">'.$d->alamat_rm.'</td>';
				}
				if ($emailhp != "") {
					echo '<td align="center">'.$d->email.'/<br>'.$d->nohp.'</td>';
				}
				if ($unker != "") {
					echo '<td align="center">'.$d->unker.', '.$d->kab.'</td>';
				}
				if ($alamat_kt != "") {
					echo '<td align="center">'.$d->alamat_kt.'</td>';
				}
				if ($jabatan != "") {
					echo '<td align="center">'.$d->jabatan.'('.$d->golongan.')</td>';
				}
				if ($npwp != "") {
					echo '<td align="center">'.$d->npwp.'</td>';
				}
				if ($norek != "") {
					echo '<td align="center">'.$d->norek.'</td>';
				}
				if ($ttd != "") {
					if ($no%2 == 0) {
						echo '<td align="left"></td>';
						echo '<td align="left">'.$no.'...................</td>';
					}else{
					echo '<td align="left">'.$no.'...................</td>';
					echo '<td align="left"></td>';
					}
				} ?>
				
			</tr>
			<?php } } else {
				$colspan = 1+$nama+$nip+$ktp+$ttl+$agama+$pendidikan+$alamat_rm+$emailhp+$unker+$alamat_kt+$jabatan+$npwp+$norek+$ttd;
				if ($ttd != "") {
				echo "<tr><td style='text-align: center' colspan='".$colspan."'>Tidak ada data</td></tr>";
			}}
			?>
		</tbody>
	</table>
</body>
</html>

