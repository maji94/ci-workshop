<html>
<head>
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="icon">
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="apple-touch-icon">
<style type="text/css" media="print">
	*{font-family:Arial;}
	table {border:0px solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border:0px solid 1px #000; page-break-inside: avoid;}
	table tr td { padding: 7px 5px; font-size: 12px; border:0px solid black;}
	th {
		color:black;
		font-size: 12px;
		background-color:lightgrey;
		border:0px solid black;
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
	table {border:0px solid 1px #000; border-collapse: collapse; width: 100%}
	table tr td { padding: 7px 5px; font-size: 12px; border:0px solid black;}
	th {
		color:black;
		font-size: 12px;
		background-color: #999;
		padding: 8px 0;
		border:0px solid black;
	}
	td { padding: 7px 5px;font-size: 12px;vertical-align: top;}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
	label, p {font-size: 14px;}
	p{margin: 2px;}
	hr{border: 2px solid black;}
</style>
<title>Cetak Biodata Peserta Workshop</title>
</head>

<body onload="window.print()">
<!-- <body> -->
	<table>
		<tr>
			<td align="left" width="15%">
				<img style="width: 95px;" src="<?php echo base_url('assets/front/images/logo-kemenag.png'); ?>" alt="">
			</td>
			<td align="center">
				<h2 style="font-size: 2em">KEMENTERIAN AGAMA REPUBLIK INDONESIA<br>KANTOR WILAYAH PROVINSI BENGKULU</h2>
				<p>Jl. Basuki Rahmat  No.10, Kota BengkuluTelp (0736) 21097, Fax (0736) 21597</p>
				<p>Website: <a href="">www.bengkulu.kemenag.go.id</a> , email; <a href="">kanwilbengkulu@kemenag.go.id</a></p>
				<p>KOTA BENGKULU</p>
			</td>
		</tr>
	</table>
	<hr>
	<center>
		<h3 style="text-transform: uppercase;">Kegiatan <?php if (!empty($peserta)) {echo $peserta[0]->nm_kegiatan;} ?></h3><br>
		<h3 style="text-transform: uppercase;">Biodata / Daftar Riwayat Hidup Peserta</h3>
	</center><br><br>
	<table>
		<tbody>
			<?php 
			if (!empty($peserta)) {
				$no = 0;
				foreach ($peserta as $d) {
					$no++;
			?>
			<tr>
				<td width="12%"></td>
				<td align="left">Nama</td>
				<td width="2%">:</td>
				<td align="left" style="text-transform: capitalize;"><?php echo $d->nama; ?></td>
				<td rowspan="8" width="30%" align="center" style="vertical-align: top;"><img src="<?php echo base_url('assets/back/images/peserta/'.str_replace('.', '_thumb.', $d->foto)); ?>" alt="img" style="display:block;margin:0;border:3px solid grey;width: 160px;height: 180px"></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">NIP</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->nip; ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Nomor KTP</td>
				<td width="2%">:</td>
			 	<td align="left"><?php echo $d->ktp; ?></td>
			 </tr>
			 <tr>
			 	<td width="12%"></td>
			 	<td align="left">Tempat Tanggal Lahir</td>
			 	<td width="2%">:</td>
				<td align="left"><?php echo $d->tmp_lahir.', '.tgl_indo(date($d->tgl_lahir)); ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Jenis Kelamin</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->jns_kelamin = "laki" ? "Laki-laki" : "Perempuan"; ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Agama</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->agama; ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Pendidikan</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->pendidikan; ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left" style="vertical-align: top;">Alamat Rumah</td>
				<td width="2%" style="vertical-align: top;">:</td>
				<td align="left"><?php echo $d->alamat_rm; ?></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left" style="vertical-align: top;">Email/No. Hp</td>
				<td width="2%" style="vertical-align: top;">:</td>
				<td align="left"><?php echo $d->email.'/<br>'.$d->nohp; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left" style="vertical-align: top;">Unit Kerja</td>
				<td width="2%" style="vertical-align: top;">:</td>
				<td align="left"><?php echo $d->unker.', '.$d->kab; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left" style="vertical-align: top;">Alamat Kantor</td>
				<td width="2%" style="vertical-align: top;">:</td>
				<td align="left"><?php echo $d->alamat_kt; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left" style="vertical-align: top;">Jabatan</td>
				<td width="2%" style="vertical-align: top;">:</td>
				<td align="left"><?php echo $d->jabatan; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Pangkat/Golongan</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->golongan; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">NPWP</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->npwp; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left">Nomor Rekening</td>
				<td width="2%">:</td>
				<td align="left"><?php echo $d->norek; ?></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left"></td>
				<td width="2%"></td>
				<td align="left"></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left"></td>
				<td width="2%"></td>
				<td align="left"></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left"></td>
				<td width="2%"></td>
				<td align="left"></td>
				<td></td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left"></td>
				<td width="2%"></td>
				<td align="left"></td>
				<td align="center" style="height: 90px;vertical-align: top;">Bengkulu, ....................... </td>
			</tr>
			<tr>
				<td width="12%"></td>
				<td align="left"></td>
				<td width="2%"></td>
				<td align="left"></td>
				<td align="center"><?php echo strtoupper($d->nama); ?></td>
			</tr>
			<?php } } else {
				$colspan = $nama+$nip+$ktp+$ttl+$agama+$pendidikan+$alamat_rm+$emailhp+$unker+$alamat_kt+$jabatan+$npwp+$norek+$ttd;
				if ($ttd != "") {
				echo "<tr><td style='text-align: center' colspan='".$colspan."'>Tidak ada data</td></tr>";
			}}
			?>
		</tbody>
	</table>
</body>
</html>

