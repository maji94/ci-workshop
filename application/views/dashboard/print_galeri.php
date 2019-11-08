<html>
<head>
<?php 
	if (!empty($data)) {
		$konten = unserialize($data[0]->konten);
	} 

	?>
<style type="text/css" media="print">
	table {border:0solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border:0solid 1px #000; page-break-inside: avoid;}
	table tr td { padding: 7px 5px; font-size: 12px; border:0px solid black;}
	th {
		font-family:Arial;
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
	label, p {font-size: 12px;}
	img { width: 47%;margin: 10px;vertical-align: top;border: 2px solid black; }
</style>
<style type="text/css" media="screen">
	body {width: 50%;margin: auto;}
	table {border:0solid 1px #000; border-collapse: collapse; width: 100%}
	table tr td { padding: 7px 5px; font-size: 12px; border:0px solid black;}
	th {
		font-family:Arial;
		color:black;
		font-size: 12px;
		background-color: #999;
		padding: 8px 0;
		border:0px solid black;
	}
	td { padding: 7px 5px;font-size: 12px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
	label, p {font-size: 12px;}
	img { width: 47%;margin: 10px;vertical-align: top;border: 2px solid black; }
</style>
<title>Cetak Foto Kegiatan Workshop</title>
</head>

<body onload="window.print()">
<!-- <body> -->
	<center>
		<h3 style="text-transform: uppercase;">Kegiatan <?php if (!empty($data)) {echo $data[0]->judul;} ?></h3>
		<h3 style="text-transform: capitalize;"><?php if (!empty($data)) {echo nama_hari(date($data[0]->tanggal)).', '.tgl_indo(date($data[0]->tanggal));} ?></h3>
	</center><br><br><hr>
	<table>
		<tbody>
			<tr>
				<td align="left">
				<?php 
				if (!empty($data)) {
					$no = 0;
					foreach ($konten as $d) {
						$no++;
				?>
					<img src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $d)) ?>" alt="">

						<?php if ($no%2 == 0) {echo "<br><br>";}
					} 
				} else {
					echo "<td style='text-align: center' colspan='2'>Tidak ada data</td>";}
				?>
				</td>
			</tr>
		</tbody>
	</table>
</body>
</html>

