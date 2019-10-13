<html>
<head>
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
<title>Cetak Daftar Hadir Peserta Workshop</title>
</head>

<body onload="window.print()">
	<center>
		<h3 style="letter-spacing: 2;">KANTOR WILAYAH AGAMA BENGKULU</h3><br>
	Daftar Hadir Worshop<br><hr>
	</center><br>
	<label>Judul Workshop : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($peserta)) {echo $peserta[0]->nm_kegiatan;} ?></p>
	<label>Narasumber : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($narasumber)) {echo $narasumber[0]->nama;} ?></p>
	<label>Waktu Pelaksanaan : </label>
	<p style="margin: 0px;font-weight: bold;"><?php if (!empty($peserta)) {
		echo nama_hari(date($peserta[0]->tgl_buka)).', '.tgl_indo(date($peserta[0]->tgl_buka))." s/d ".nama_hari(date($peserta[0]->tgl_tutup)).', '.tgl_indo(date($peserta[0]->tgl_tutup));} ?>
	</p><br>
	<table>
		<thead>
			<tr>
				<th width="">No</td>
				<th width="25%">Nama</td>
				<th width="">NIP</td>
				<th width="">Asal Instansi</td>
				<th width="20%" colspan="2">Tanda Tangan</td>
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
				<td align="center"><?php echo $d->nama; ?></td>
				<td align="center"><?php echo $d->nip; ?></td>
				<td align="center"><?php echo $d->unker.', '.$d->kab; ?></td>
				<?php if ($no%2 == 0) { ?>
					<td align="left"><?php echo $no.'...................'; ?></td>
					<td align="left"></td>
				<?php }else{ ?>
					<td align="left"></td>
					<td align="left"><?php echo $no.'...................'; ?></td>
				<?php } ?>
			</tr>
			<?php } } else {
				echo "<tr><td style='text-align: center' colspan='6'>Tidak ada data</td></tr>";
			}
			?>
		</tbody>
	</table>
</body>
</html>

