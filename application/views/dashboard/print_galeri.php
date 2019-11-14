<html>
<head>
<?php 
	if (!empty($data)) {
		$konten = unserialize($data[0]->konten);
	} 

	?>
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="icon">
<link href="<?php echo base_url('assets/front/') ?>images/print.png" rel="apple-touch-icon">
<style type="text/css" media="print">
	*{font-family:Arial;}
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
	.foto { width: 46%;margin: 10px;vertical-align: top;border: 2px solid black; }
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
	.foto { width: 47%;margin: 10px;vertical-align: top;border: 2px solid black; }
</style>
<title>Cetak Foto Kegiatan Workshop</title>
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
		<h3 style="text-transform: uppercase;">Kegiatan <?php if (!empty($data)) {echo $data[0]->judul;} ?></h3>
		<h3 style="text-transform: capitalize;"><?php if (!empty($data)) {echo nama_hari(date($data[0]->tanggal)).', '.tgl_indo(date($data[0]->tanggal));} ?></h3>
	</center><br><br>
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
					<img class="foto" src="<?php echo base_url('assets/back/images/galeri/'.str_replace('.', '_thumb.', $d)) ?>" alt="">

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

