<html>
<head>
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="icon">
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="apple-touch-icon">
<style type="text/css" media="print">
	*{font-family:Arial;}
	table {border:1px solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border:1px solid 1px #000; page-break-inside: avoid;}
	table tr td { padding: 7px 5px; font-size: 12px; border:1px solid black;}
	th {
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
	label, p {font-size: 14px;}
	p{margin: 2px;}
	hr{border: 2px solid black;}
</style>
<style type="text/css" media="screen">
	*{font-family:Arial;}
	body {width: 65%;margin: auto;}
	table {border:1px solid 1px #000; border-collapse: collapse; width: 100%}
	table tr td { padding: 7px 5px; font-size: 12px; border:1px solid black;}
	th {
		color:black;
		font-size: 12px;
		background-color: #999;
		padding: 8px 0;
		border:1px solid black;
	}
	td { padding: 7px 5px;font-size: 12px;vertical-align: top;}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
	label, p {font-size: 14px;}
	p{margin: 2px;}
	hr{border: 2px solid black;}
</style>
<title>Cetak Data Peserta Workshop</title>
</head>

<body onload="window.print()">
<!-- <body> -->
	<table style="border:0px;">
		<tr style="border:0px;">
			<td align="left" width="15%" style="border:0px;">
				<img style="width: 100%;" src="<?php echo base_url('assets/front/images/logo-kemenag.png'); ?>" alt="">
			</td>
			<td align="center" style="border:0px;">
				<h2 style="font-size: 2.5em">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>KANTOR WILAYAH PROVINSI BENGKULU</h2>
				<p>Jl. Basuki Rahmat  No.10, Kota BengkuluTelp (0736) 21097, Fax (0736) 21597</p>
				<p>Website: <a href="">www.bengkulu.kemenag.go.id</a> , email; <a href="">kanwilbengkulu@kemenag.go.id</a></p>
				<p>KOTA BENGKULU</p>
			</td>
		</tr>
	</table>
	<hr>
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

